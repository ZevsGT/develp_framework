<template>
  <div class="container">
    <header-oomponent>
      <nav-head />
    </header-oomponent>

    <div class="modal-portfolio-title mt-3 mb-3">
      <span>{{portfolio.title}}</span>
    </div>
    <div class="modal-portfolio-content">
      <component
        v-for="(component, index) in portfolio.body"
        :key="index"
        :is="component.type_name"
        :Sdata="component.Sdata"
        :visibleTools="false"
      />
    </div>
    <div class="modal-portfolio-review">
    </div>

    <component-footer/>
  </div>
  <component-bg-animated
    :style="'position: fixed; height: 100vh'"
  />
</template>

<script>
import HeaderComponent from '@/components/app/header.vue'
import NavHead from '@/components/app/nav_head.vue'
import ComponentFooter from '@/components/app/footer.vue'
import ComponentBgFnimated from '@/components/app/bg_animated.vue'
import ImageSection from '@/components/work/w_image_section.vue'

export default {
  components: {
    'header-oomponent': HeaderComponent,
    'nav-head': NavHead,
    'component-footer': ComponentFooter,
    'component-bg-animated': ComponentBgFnimated,
    ImageSection
  },
  data () {
    return {
      portfolio: {
        id: null,
        title: null,
        body: []
      }
    }
  },
  async mounted () {
    this.visibility = true
    await this.$api.portfolio.get_data_portfolio_Id(this.$route.params.id)
      .then(response => {
        console.log(response.data)
        this.portfolio = response.data
      })
  }
}
</script>
