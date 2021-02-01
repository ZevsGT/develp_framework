<template>
  <div class="a_l_container mt-3">

    <router-link :to="{name: 'Pages_new'}" class="add_w">
      <i class="fas fa-plus"></i>
    </router-link>

    <card
      v-for="(page, index) in pages" :key="index"
      :id="page.id"
      :title="page.title"
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
      let formData = new FormData()
      formData.append('count', this.count)
      await this.$api.pages.getPagesList(formData)
        .then(response => {
          if (response.data.status === 'ready') {
            if (response.data.list[0].id) this.pages = this.pages.concat(response.data.list)
            if (response.data.list.length < 8) this.btn_vis = false
            this.count += response.data.list.length
          } else if (response.data.status === 'error' && (response.data.message === 'TIM_L' || response.data.message === 'T_N_V')) {
            this.$api.users.refresh_token('admin/pages')
              .then(response => {
                if (response.data.status === 'ready') {
                  this.$api.token.setToken(response.data.token, response.data.refresh_token)
                  if (response.data.list[0].id) this.pages = this.pages.concat(response.data.list)
                  if (response.data.list.length < 8) this.btn_vis = false
                  this.count += response.data.list.length
                }
              })
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
            }
          })
      }

      this.$refs.btn_delete.addEventListener('click', deletePage)
      this.$refs.btn_cancel.addEventListener('click', invisible)
    }
  }
}
</script>
