import axios from 'axios'

const instance = axios.create({
  baseURL: 'http://framework.ru/',
  headers: {
    accept: 'application/json'
  }
})

export default instance
