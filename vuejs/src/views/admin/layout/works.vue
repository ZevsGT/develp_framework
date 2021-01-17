<template>
  <div class="a_l_container mt-3">
    <work-kard
      v-for="(work, index) in works" :key="index"
      :id="work.id"
      :title="work.title"
      :srcImg="work.src_preview"
    />
  </div>
</template>

<script>
import WorkKard from '@/components/admin/work_card.vue'
export default {
  components: {
    WorkKard
  },
  data () {
    return {
      count: 0,
      btn_vis: true,
      btn_loading: false,
      works: []
    }
  },
  async mounted () {
    await this.$api.portfolio.get_a_portfolio_list({
      spa_request: true,
      count: this.count
    })
      .then(response => {
        this.works = response.data
        if (response.data.length < 8) this.btn_vis = false
        this.count += response.data.length
      })
  },
  methods: {
    async load_portfolio () {
      this.btn_loading = true
      await this.$api.portfolio.get_a_portfolio_list({
        spa_request: true,
        count: this.count
      })
        .then(response => {
          this.works = this.works.concat(response.data)
          if (response.data.length < 8) this.btn_vis = false
          this.count += response.data.length
          this.btn_loading = false
        })
    }
  }
}
</script>

<style>
</style>
