import instance from './instance'

import authModule from './requests/auth'
import servicesModule from './requests/services'
import usersModule from './requests/users'
import portfolioModule from './requests/portfolio'
import ordersModule from './requests/orders'
import pagesModule from './requests/pages'

export default {
  auth: authModule(instance),
  services: servicesModule(instance),
  users: usersModule(instance),
  portfolio: portfolioModule(instance),
  orders: ordersModule(instance),
  pages: pagesModule(instance)
}
