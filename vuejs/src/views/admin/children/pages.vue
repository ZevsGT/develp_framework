<template>
  <div class="a_l_container mt-3">

    <router-link :to="{name: 'Pages_new'}" class="add_w">
      <i class="fas fa-plus"></i>
    </router-link>

    <card
      v-for="(page, index) in pages" :key="index"
      :id="page.id"
      :title="page.title"
      :url="'pages/edit/'"
      @deletePage="delete_page"
    />

  </div>
  <div v-show="btn_vis" class="text-center mt-4">
    <a class="btn_ btn_admin" href="#" @click.prevent="load_pages">
      <i v-show="btn_loading" class="fas fa-spinner"></i>
      <span v-show="!btn_loading">Показать еще</span>
    </a>
  </div>
  <modal :visibility="visibility" @click="visibility = !visibility">
    <div class="modal_confirm" @click.stop>
      <div class="mb-4">Вы хотите удалить работу?</div>
      <button class="btn_ btn_secondary" ref="btn_cancel">Отмена</button>
      <button class="btn_ btn_admin ml-3" ref="btn_delete">Удалить</button>
    </div>
  </modal>
</template>

<script>
import modal from '@/components/modal.vue'
import card from '@/components/admin/page_card.vue'
export default {
  components: {
    modal,
    card
  },
  data () {
    return {
      visibility: false,
      count: 0,
      btn_vis: true,
      btn_loading: false,
      pages: []
    }
  },
  async mounted () {
    this.load_pages()
  },
  methods: {
    async load_pages () {
      this.btn_loading = true
      await this.$api.pages.getPagesList({ count: this.count })
        .then(response => {
          if (response.data.status === 'ready') {
            if (response.data.data[0].id) this.pages = this.pages.concat(response.data.data)
            if (response.data.data.length < 8) this.btn_vis = false
            this.btn_loading = false
            this.count += response.data.data.length
          }
        })
    },
    delete_page (data) {
      this.visibility = true

      let invisible = () => {
        this.visibility = false
        this.$refs.btn_cancel.removeEventListener('click', invisible)
      }

      let deletePage = () => {
        this.$api.pages.deletePage(data.id)
          .then(response => {
            if (response.data.state === 'ready') {
              this.$refs.btn_delete.removeEventListener('click', deletePage)
              this.pages.splice(data.index, 1)
              this.visibility = false
              this.count--
            }
          })
      }

      this.$refs.btn_delete.addEventListener('click', deletePage)
      this.$refs.btn_cancel.addEventListener('click', invisible)
    }
  }
}
</script>
