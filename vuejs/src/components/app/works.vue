<template>
  <div id="portfolio" class="mt_sect">
    <h3 class="H_section text-center mb-3">Портфолио</h3>
    <div class="works_wraper">
      <!--  start  -->

      <works-card
        v-for="(work, index) in works" :key="index"
        :id="work.id"
        :title="work.title"
        :description="work.description"
        :srcImg="work.src_preview"
        :color="work.color"
      />

      <!--  end  -->
    </div>
    <div v-show="btn_vis" class="text-center">
      <a class="btn_ btn_light mt-3" href="#" @click.prevent="load_portfolio">
        <i v-show="btn_loading" class="fas fa-spinner"></i>
        <span v-show="!btn_loading">Показать еще</span>
      </a>
    </div>
  </div>
</template>

<script>
import WorksCard from '@/components/app/work_card.vue'

export default {
  components: {
    WorksCard
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
    await this.$api.portfolio.get_portfolio_list({
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
      await this.$api.portfolio.get_portfolio_list({
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
