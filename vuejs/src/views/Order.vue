<template>
  <div class="container">
    <header-oomponent>
      <nav-head />
    </header-oomponent>
    <div class="order-box mt_sect rounded_box">

      <router-view/>

      <span class="first_rectangle"></span>
      <span class="second_rectangle"></span>
      <span class="second_rectangle duble"></span>
    </div>
    <component-footer />
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

export default {
  components: {
    'header-oomponent': HeaderComponent,
    'nav-head': NavHead,
    'component-footer': ComponentFooter,
    'component-bg-animated': ComponentBgFnimated
  },
  mounted () {
  }
}
</script>

<style scoped>
  .order-box {
    background: linear-gradient(155.21deg, rgba(29, 26, 28, 0.97) 47.93%, #2EB4CF 144.57%);
    position: relative;
    overflow: hidden;
    color: #fff;
    padding: 2rem 0;
  }
  .second_rectangle {
    background: rgba(46, 181, 208, 0.2);
    top: -250px;
    right: -150px;
  }
  .duble {
    height: 300px;
    top: initial;
    right: -200px;
    bottom: -115px;
  }
  .first_rectangle {
    top: -75px;
  }
</style>
