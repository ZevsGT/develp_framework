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
        @moreDetails="more_details"
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

  <modal :visibility="visibility" @click="close_more_details">
    <div class="container modal-portfolio" @click.stop>
      <button class="btn_ btn-p-close" @click="close_more_details">
        <i class="fas fa-times"></i>
      </button>
      <div class="modal-portfolio-title mb-3">
        <span>{{work_more_details.title}}</span>
      </div>
      <div class="modal-portfolio-content">
        <component
          v-for="(component, index) in work_more_details.body"
          :key="index"
          :is="component.type_name"
          :Sdata="component.Sdata"
          :visibleTools="false"
        />
      </div>
      <div class="modal-portfolio-review">
      </div>
    </div>
  </modal>
</template>

<script>
import WorksCard from '@/components/app/work_card.vue'
import modal from '@/components/modal.vue'
import ImageSection from '@/components/work/w_image_section.vue'

export default {
  components: {
    WorksCard,
    modal,
    ImageSection
  },
  data () {
    return {
      visibility: false,
      count: 0,
      btn_vis: true,
      btn_loading: false,
      works: [],
      work_more_details: {
        id: null,
        title: null,
        body: []
      }
    }
  },
  async mounted () {
    let formData = new FormData()
    formData.append('count', this.count)
    await this.$api.portfolio.get_portfolio_list(formData)
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
      await this.$api.portfolio.get_portfolio_list(formData)
        .then(response => {
          this.works = this.works.concat(response.data)
          if (response.data.length < 8) this.btn_vis = false
          this.count += response.data.length
          this.btn_loading = false
        })
    },
    more_details (id) {
      this.visibility = true
      this.$api.portfolio.get_data_portfolio_Id(id)
        .then(response => {
          this.work_more_details = response.data
          history.pushState(null, null, '/portfolio/' + id)
        })
    },
    close_more_details () {
      this.visibility = false
      this.work_more_details = {
        id: null,
        title: null,
        body: []
      }
      history.pushState(null, null, this.$route.fullPath)
    }
  }
}
</script>

<style>
  .modal-portfolio {
    padding: 1rem 0;
    background-color: initial;
    border-radius: 1rem;
  }
  .modal-portfolio-title {
    color: #fff;
    font-weight: bold;
    font-size: 1.2rem;
  }
  .modal-portfolio-content {
    border-top-left-radius: 6px;
    border-top-right-radius: 6px;
  }
  .modal-portfolio-content {
    background-color: #e2e2ea;
    color: #2C4D7A;
  }

  .modal-portfolio-review {
    background-color: #f1f1f9;
    color: #2C4D7A;
  }

  .modal-portfolio-review {
    border-bottom-left-radius: 1rem;
    border-bottom-right-radius: 1rem;
  }
  .btn-p-close {
    position: fixed;
    top: 1rem;
    right: 2rem;
    padding: 0;
    display: block;
    background-color: initial;
    color: #fff;
    font-size: 1.2rem;
  }
  .btn-p-close:hover {
    opacity: .7;
  }
</style>
