export default function (instance, token) {
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
    get_status () {
      return instance.get('login/status', token.Access())
    },
    refresh_token (path) {
      return instance.get(path, token.Refresh())
    }
  }
}
