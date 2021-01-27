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
    }
  }
}
