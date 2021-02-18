<template>
  <div class="a_l_container mt-3">

    <router-link :to="{name: 'Portfolio_new'}" class="add_w">
      <i class="fas fa-plus"></i>
    </router-link>

    <work-kard
      v-for="(work, index) in works" :key="index"
      :id="work.id"
      :index="index"
      :title="work.title"
      :srcImg="work.src_preview"
      @deletePortfolio="delete_portfolio"
    />
  </div>
  <div v-show="btn_vis" class="text-center mt-4">
    <a class="btn_ btn_admin" href="#" @click.prevent="load_portfolio">
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
import WorkKard from '@/components/admin/work_card.vue'
import modal from '@/components/modal.vue'
export default {
  components: {
    WorkKard,
    modal
  },
  data () {
    return {
      visibility: false,
      count: 0,
      btn_vis: true,
      btn_loading: false,
      works: []
    }
  },
  mounted () {
    this.load_portfolio()
  },
  methods: {
    async load_portfolio () {
      this.btn_loading = true
      await this.$api.portfolio.get_a_portfolio_list({ count: this.count })
        .then(response => {
          if (response.data.status === 'ready') {
            if (response.data.list[0].id) this.works = this.works.concat(response.data.list)
            if (response.data.list.length < 8) this.btn_vis = false
            this.count += response.data.list.length
            this.btn_loading = false
          }
        })
    },
    delete_portfolio (data) {
      this.visibility = true

      let invisible = () => {
        this.visibility = false
        this.$refs.btn_cancel.removeEventListener('click', invisible)
      }

      let deletePortfolio = () => {
        this.$api.portfolio.delete_portfolio(data.id)
          .then(response => {
            if (response.data.state === 'ready') {
              this.$refs.btn_delete.removeEventListener('click', deletePortfolio)
              this.works.splice(data.index, 1)
              this.visibility = false
              this.count--
            } else console.log(response.data)
          })
      }

      this.$refs.btn_delete.addEventListener('click', deletePortfolio)
      this.$refs.btn_cancel.addEventListener('click', invisible)
    }
  }
}
</script>

<style>
</style>
