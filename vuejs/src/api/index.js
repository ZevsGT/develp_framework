import instance from './instance'

import authModule from './auth'
import servicesModule from './services'
import usersModule from './users'
import portfolioModule from './portfolio'

export default {
  auth: authModule(instance),
  services: servicesModule(instance),
  users: usersModule(instance),
  portfolio: portfolioModule(instance)
}
