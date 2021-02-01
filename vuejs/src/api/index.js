import instance from './instance'

import authModule from './requests/auth'
import servicesModule from './requests/services'
import usersModule from './requests/users'
import portfolioModule from './requests/portfolio'
import ordersModule from './requests/orders'
import pagesModule from './requests/pages'
import token from './token'

export default {
  auth: authModule(instance),
  services: servicesModule(instance, token()),
  users: usersModule(instance, token()),
  portfolio: portfolioModule(instance, token()),
  orders: ordersModule(instance, token()),
  pages: pagesModule(instance, token()),
  token: token()
}
