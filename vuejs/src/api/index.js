import instance from './instance'

import authModule from './requests/auth'
import servicesModule from './requests/services'
import usersModule from './requests/users'
import portfolioModule from './requests/portfolio'
import ordersModule from './requests/orders'
import pagesModule from './requests/pages'
import token from './token'
import accelerationModule from './requests/accelerator'

export default {
  auth: authModule(instance),
  services: servicesModule(instance, token()),
  users: usersModule(instance, token()),
  portfolio: portfolioModule(instance, token()),
  orders: ordersModule(instance, token()),
  pages: pagesModule(instance, token()),
  token: token(),
  acceleration: accelerationModule(instance),
  synchronizeTime (clientTime) {
    if (!localStorage.getItem('DIFFERENCE_TIME')) {
      let time = new Date()
      return instance.get('', {
        headers: {
          'X-Client-Time': time.getTime()
        }
      }).then(response => {
        if (typeof response.data.DifferenceTime !== 'undefined') {
          localStorage.setItem('DIFFERENCE_TIME', response.data.DifferenceTime)
          localStorage.setItem('TIME_LAST_UPDATE', time.getTime())
        }
      })
    }
  }
}
