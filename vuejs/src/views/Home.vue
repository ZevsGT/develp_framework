<template>
  <div class="container">
    <component-header/>
    <component-info-box/>
    <component-services/>
    <component-works/>
    <component-feedback/>
    <component-footer/>
  </div>
  <component-bg-animated
  :style="'position: fixed; height: 100vh'"
  />
</template>

<script>
import '@/assets/css/main.css'
// @ is an alias to /src
import ComponentHeader from '@/components/app/home_header.vue'
import ComponentInfoBox from '@/components/app/home_info_box.vue'
import ComponentServices from '@/components/app/home_services.vue'
import ComponentWorks from '@/components/app/works.vue'
import ComponentFeedback from '@/components/app/feedback.vue'
import ComponentFooter from '@/components/app/footer.vue'
import ComponentBgFnimated from '@/components/app/bg_animated.vue'

export default {
  name: 'Home',
  components: {
    'component-header': ComponentHeader,
    'component-info-box': ComponentInfoBox,
    'component-services': ComponentServices,
    'component-works': ComponentWorks,
    'component-feedback': ComponentFeedback,
    'component-footer': ComponentFooter,
    'component-bg-animated': ComponentBgFnimated
  }
}
</script>
