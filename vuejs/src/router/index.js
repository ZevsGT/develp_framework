import { createRouter, createWebHistory } from 'vue-router'
import $api from '../api/index'
import Home from '../views/Home.vue'
import AdminModule from './admin'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    meta: {
      title: 'Develp - создание и разработка сайтов',
      description: 'Develp - команда разработчиков. Качественное создание и продвижение сайтов. Отрисовка дизайна для вашего бизнеса. Логотипы, шрифты. Оплата после выполнения работы. Постоянная техподдержка клиентов.'
    }
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
    path: '/page/:name',
    name: 'PageP',
    component: () => import('../views/Page.vue')
  },
  {
    path: '/service/:id',
    name: 'Order',
    component: () => import('../views/Order.vue'),
    children: [
      {
        path: '',
        name: 'OrderP',
        component: () => import('../components/app/Order_content.vue')
      },
      {
        path: ':child_id',
        name: 'OrderPChild',
        component: () => import('../components/app/Order_content.vue')
      }
    ]
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
    } else {
      return { x: 0, y: 0 }
    }
  }
})

router.beforeEach((to, from, next) => {
  const nearestWithTitle = to.matched.slice().reverse().find(r => r.meta)
  if (typeof nearestWithTitle.meta.title !== 'undefined') document.title = nearestWithTitle.meta.title
  if (typeof nearestWithTitle.meta.description !== 'undefined' && document.querySelector('meta[name="description"]')) {
    document.querySelector('meta[name="description"]')
      .setAttribute('content', nearestWithTitle.meta.description)
  }
  const RAuth = to.matched.slice().reverse().find(r => r.meta && r.meta.require_auth)
  if (RAuth) {
    if (RAuth.meta.require_auth && localStorage.getItem('hash03h') && localStorage.getItem('hash04p') && localStorage.getItem('hash05s')) {
      $api.users.get_status()
        .then(response => {
          if (response.data.ACL_RESPONSE.status === 'ready' && response.data.ACL_RESPONSE.code === 200) next()
          else next({ name: 'Login' })
        })
    } else next({ name: 'Login' })
  } else next()
})

export default router
