<template>
  <div class="a_l_container mt-3">
    <router-link :to="{ name: 'Services_new' }" class="add_w">
      <i class="fas fa-plus"></i>
    </router-link>
    <card
      v-for="(service, index) in services"
      :key="index"
      :id="service.id"
      :title="service.title"
      :url="'service/edit/'"
      @deletePage="delete_services"
    />
  </div>
  <div v-show="btn_vis" class="text-center mt-4">
    <a class="btn_ btn_admin" href="#" @click.prevent="load_services">
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
      services: []
    }
  },
  mounted () {
    this.load_services()
  },
  methods: {
    async load_services () {
      this.btn_loading = true
      await this.$api.services.get_list_admin({ count: this.count })
        .then(response => {
          if (response.data.status === 'ready') {
            this.btn_loading = false
            this.services = this.services.concat(response.data.list)
            if (response.data.list.length < 8) this.btn_vis = false
            this.count += response.data.list.length
          }
        })
    },
    delete_services (data) {
      this.visibility = true

      let invisible = () => {
        this.visibility = false
        this.$refs.btn_cancel.removeEventListener('click', invisible)
      }

      let deletePage = () => {
        this.$api.services.delete_service({ id: data.id })
          .then(response => {
            console.log(response.data)
            if (response.data.status === 'ready') {
              this.$refs.btn_delete.removeEventListener('click', deletePage)
              this.services.splice(data.index, 1)
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
