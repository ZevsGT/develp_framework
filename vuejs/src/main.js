import { createApp } from 'vue'
import App from './App.vue'
import './registerServiceWorker'
import router from './router'
import store from './store'
import ApiPlugin from './plugins/api'
import accelerator from './plugins/accelerator'

createApp(App)
  .use(store)
  .use(router)
  .use(ApiPlugin)
  .use(accelerator)
  .mount('#app')
