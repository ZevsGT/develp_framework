import $api from '../api/index'

export default {
  sendDataCaching (doc) {
    if (localStorage.getItem('hash00h')) {
      setTimeout(() => {
        $api.acceleration.cache({
          url: doc.location.pathname,
          title: doc.title,
          description: doc.querySelector('meta[name="description"]').content,
          app: doc.getElementById('app').innerHTML
        }).then(response => {
        })
      }, 1500)
    }
  }
}
