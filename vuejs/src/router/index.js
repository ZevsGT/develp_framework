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
      $api.users.get_status()
        .then(response => {
          if (response.data.status === 'ready') next()
          else if (response.data.status === 'error' && (response.data.message === 'TIM_L' || response.data.message === 'T_N_V')) {
            $api.users.refresh_token()
              .then(response => {
                if (response.data.status === 'ready') {
                  let token = response.data.token.split('.', 3)
                  localStorage.setItem('hash00h', token[0])
                  localStorage.setItem('hash01p', token[1])
                  localStorage.setItem('hash02s', token[2])
                  let refreshToken = response.data.refresh_token.split('.', 3)
                  localStorage.setItem('hash03h', refreshToken[0])
                  localStorage.setItem('hash04p', refreshToken[1])
                  localStorage.setItem('hash05s', refreshToken[2])
                  next()
                } else next({ name: 'Login' })
              })
          }
        })
    }
  } else next()
})

export default router
