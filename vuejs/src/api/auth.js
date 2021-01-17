export default function (instance) {
  return {
    signIn (payload) {
      return instance.post('', payload)
    },
    signUp (payload) {
      return instance.post('', payload)
    },
    logout () {
      return instance.delete('')
    }
  }
}
