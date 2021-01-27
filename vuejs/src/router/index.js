import { createRouter, createWebHistory } from 'vue-router'
import $api from '../api/index'
import Home from '../views/Home.vue'
import AdminModule from './admin'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    meta: { title: 'Главная' }
  },
  {
    path: '/login',
    name: 'Login',
    component: () => import('../views/LoginAndRegister.vue')
  },
  AdminModule,
  {
    path: '/portfolio/:id',
    name: 'PortfolioPage',
    component: () => import('../views/PortfolioPage.vue')
  },
  {
    path: '/:pathMatch(.*)*',
    name: '404',
    component: () => import('../views/404.vue')
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes,
  scrollBehavior (to, from, savedPosition) {
    if (to.hash) {
      return {
        el: to.hash
      }
    }
  }
})

router.beforeEach((to, from, next) => {
  const nearestWithTitle = to.matched.slice().reverse().find(r => r.meta && r.meta.title)
  if (nearestWithTitle) document.title = nearestWithTitle.meta.title
  const RAuth = to.matched.slice().reverse().find(r => r.meta && r.meta.require_auth)
  if (RAuth) {
    if (RAuth.meta.require_auth) {
      if (localStorage.getItem('hash00h') && localStorage.getItem('hash01p') && localStorage.getItem('hash02s')) {
        if (from.name === 'Login') next()
        else {
          $api.users.validate_token({
            token: localStorage.getItem('hash00h') + '.' + localStorage.getItem('hash01p') + '.' + localStorage.getItem('hash02s')
          })
            .then(response => {
              if (response.data.state === 'ready') {
                next()
              } else if (response.data.error === 'TIM_L' && localStorage.getItem('hash03h') && localStorage.getItem('hash04p') && localStorage.getItem('hash05s')) {
                // тут обновление токена
                $api.users.get_new_token({
                  token: localStorage.getItem('hash00h') + '.' + localStorage.getItem('hash01p') + '.' + localStorage.getItem('hash02s'),
                  disposable_token: localStorage.getItem('hash03h') + '.' + localStorage.getItem('hash04p') + '.' + localStorage.getItem('hash05s')
                })
                  .then(response => {
                    if (response.data.state === 'ready') {
                      let token = response.data.token.split('.', 3)
                      localStorage.setItem('hash00h', token[0])
                      localStorage.setItem('hash01p', token[1])
                      localStorage.setItem('hash02s', token[2])
                      let disposableToken = response.data.disposable_token.split('.', 3)
                      localStorage.setItem('hash03h', disposableToken[0])
                      localStorage.setItem('hash04p', disposableToken[1])
                      localStorage.setItem('hash05s', disposableToken[2])
                      next()
                    } else {
                      next({ name: 'Login' })
                    }
                  })
              } else if (response.data.error === 'T_N_V') {
                next({ name: 'Login' })
              } else {
                next({ name: 'Login' })
              }
            })
        }
      } else next({ name: 'Login' })
    }
  } else next()
})

export default router
