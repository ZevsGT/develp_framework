export default {
  path: '/admin',
  name: 'AdminLayout',
  component: () => import('../views/admin/index.vue'),
  children: [
    {
      path: '',
      name: 'Admin',
      component: () => import('../views/admin/children/works.vue')
    },
    {
      path: 'portfolio',
      name: 'Portfolio',
      component: () => import('../views/admin/children/works.vue')
    },
    {
      path: 'portfolio/new',
      name: 'Portfolio_new',
      component: () => import('../views/admin/children/e_n_work.vue')
    },
    {
      path: 'portfolio/edit/:id',
      name: 'Portfolio_edit',
      component: () => import('../views/admin/children/e_n_work.vue')
    }

  ]
}
