export default {
  path: '/admin',
  name: 'AdminLayout',
  component: () => import('../views/admin/index.vue'),
  children: [
    {
      path: '',
      name: 'Admin',
      component: () => import('../views/admin/layout/works.vue')
    },
    {
      path: 'portfolio',
      component: () => import('../views/admin/layout/works.vue')
    }
  ]
}
