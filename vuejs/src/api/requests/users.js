export default function (instance) {
  return {
    get_worker_list () {
      return instance.get('workers')
    },
    validate_token (payload) {
      return instance.post('login/validate', payload)
    },
    get_new_token (payload) {
      return instance.post('login/new_token', payload)
    },
    get_status (HToken) {
      return instance.get('login/status', {
        headers: {
          'X-Access-Token': localStorage.getItem('hash00h') + '.' + localStorage.getItem('hash01p') + '.' + localStorage.getItem('hash02s')
        }
      })
    },
    refresh_token (HToken) {
      return instance.get('login/status', {
        headers: {
          'X-Refresh-Token': localStorage.getItem('hash03h') + '.' + localStorage.getItem('hash04p') + '.' + localStorage.getItem('hash05s')
        }
      })
    }
  }
}
