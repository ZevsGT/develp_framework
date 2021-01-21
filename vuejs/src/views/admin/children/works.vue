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
  async mounted () {
    let formData = new FormData()
    formData.append('count', this.count)

    await this.$api.portfolio.get_a_portfolio_list(formData)
      .then(response => {
        this.works = response.data
        if (response.data.length < 8) this.btn_vis = false
        this.count += response.data.length
      })
  },
  methods: {
    async load_portfolio () {
      let formData = new FormData()
      formData.append('count', this.count)

      this.btn_loading = true
      await this.$api.portfolio.get_a_portfolio_list(formData)
        .then(response => {
          this.works = this.works.concat(response.data)
          if (response.data.length < 8) this.btn_vis = false
          this.count += response.data.length
          this.btn_loading = false
        })
    },
    delete_portfolio (data) {
      this.visibility = true

      let invisible = () => {
        this.visibility = false
        this.$refs.btn_cancel.removeEventListener('click', invisible)
      }

      let deletePortfolio = () => {
        this.$refs.btn_delete.removeEventListener('click', deletePortfolio)
        let formData = new FormData()
        formData.append('token', 'jdjfewkh')
        this.$api.portfolio.delete_portfolio(data.id, formData)
          .then(response => {
            if (response.data.state === 'ready') {
              this.works.splice(data.index, 1)
              this.visibility = false
            }
          })
      }

      this.$refs.btn_delete.addEventListener('click', deletePortfolio)
      this.$refs.btn_cancel.addEventListener('click', invisible)
    }
  }
}
</script>

<style>
  .add_w {
    border-radius: 1rem;
    min-height: 300px;
    box-shadow: 4px 5px 15px 0px rgba(50, 38, 174, 0.2);
    background-color: #F7F7FF;
    border: 3px #3024A6 dashed;
    color: #3024A6;
    font-size: 5rem;
    opacity: .4;
    text-align: center;
    transition: .2s;
  }
  .add_w:hover {
    color: #3024A6;
    opacity: .7;
  }
  .add_w .fas {
    position: relative;
    top: 50%;
    transform: translateY(-70%);
  }
</style>
