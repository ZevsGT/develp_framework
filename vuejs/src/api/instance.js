import axios from 'axios'

const instance = axios.create({
  baseURL: 'http://framework.ru/',
  headers: {
    accept: 'application/json'
  }
})

instance.interceptors.request.use(function (config) {
  if (localStorage.getItem('hash00h') && localStorage.getItem('hash01p') && localStorage.getItem('hash02s')) {
    let data = JSON.parse(window.atob(localStorage.getItem('hash01p')))
    if (data.iat > parseInt(new Date().getTime() / 1000 - 10) + parseInt(localStorage.getItem('DIFFERENCE_TIME'))) {
      config.headers['X-Access-Token'] = localStorage.getItem('hash00h') + '.' + localStorage.getItem('hash01p') + '.' + localStorage.getItem('hash02s')
    } else {
      config.headers['X-Refresh-Token'] = localStorage.getItem('hash03h') + '.' + localStorage.getItem('hash04p') + '.' + localStorage.getItem('hash05s')
    }
  } else if (localStorage.getItem('hash03h') && localStorage.getItem('hash04p') && localStorage.getItem('hash05s')) {
    config.headers['X-Refresh-Token'] = localStorage.getItem('hash03h') + '.' + localStorage.getItem('hash04p') + '.' + localStorage.getItem('hash05s')
  }
  return config
}, function (error) {
  // обрабатываем ошибку
  return Promise.reject(error)
})

instance.interceptors.response.use(function (response) {
  if (typeof response.data.ACL_RESPONSE !== 'undefined' && typeof response.data.ACL_RESPONSE.token !== 'undefined' && typeof response.data.ACL_RESPONSE.refresh_token !== 'undefined') {
    let accessToken = response.data.ACL_RESPONSE.token.split('.', 3)
    localStorage.setItem('hash00h', accessToken[0])
    localStorage.setItem('hash01p', accessToken[1])
    localStorage.setItem('hash02s', accessToken[2])
    let refreshToken = response.data.ACL_RESPONSE.refresh_token.split('.', 3)
    localStorage.setItem('hash03h', refreshToken[0])
    localStorage.setItem('hash04p', refreshToken[1])
    localStorage.setItem('hash05s', refreshToken[2])
  }
  // console.log(response.data)
  return response
}, function (error) {
  // Обрабатываем ошибку
  return Promise.reject(error)
})

export default instance
