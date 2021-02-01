export default {
  path: '/admin',
  name: 'AdminLayout',
  meta: { require_auth: true },
  component: () => import('../views/admin/index.vue'),
  children: [
    {
      path: '',
      name: 'Admin',
      meta: { title: 'Админпанель' },
      component: () => import('../views/admin/children/works.vue')
    },
    {
      path: 'portfolio',
      name: 'Portfolio',
      meta: { title: 'Админпанель: Портфолио' },
      component: () => import('../views/admin/children/works.vue')
    },
    {
      path: 'portfolio/new',
      name: 'Portfolio_new',
      meta: { title: 'Админпанель: Новое портфолио' },
      component: () => import('../views/admin/children/e_n_work.vue')
    },
    {
      path: 'portfolio/edit/:id',
      name: 'Portfolio_edit',
      meta: { title: 'Админпанель: Редактирование портфолио' },
      component: () => import('../views/admin/children/e_n_work.vue')
    },
    {
      path: 'pages',
      name: 'Pages',
      meta: { title: 'Админпанель: Статические страницы' },
      component: () => import('../views/admin/children/pages.vue')
    },
    {
      path: 'pages/new',
      name: 'Pages_new',
      meta: { title: 'Админпанель: Новая статическая страница' },
      component: () => import('../views/admin/children/e_n_page.vue')
    },
    {
      path: 'pages/edit/:id',
      name: 'Pages_edit',
      meta: { title: 'Админпанель: Редактирвание статической страницы' },
      component: () => import('../views/admin/children/e_n_page.vue')
    },
    {
      path: 'orders',
      name: 'Orders',
      meta: { title: 'Админпанель: Заказы' },
      component: () => import('../views/admin/children/orders.vue')
    }
  ]
}
