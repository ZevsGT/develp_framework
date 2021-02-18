import accelerator from '../accelerator/index'

export default {
  install (Vue) {
    Vue.config.globalProperties.$accelerator = accelerator
  }
}
