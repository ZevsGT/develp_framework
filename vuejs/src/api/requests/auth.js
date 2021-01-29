export default function (instance) {
  return {
    signIn (payload) {
      return instance.post('login/signin', payload)
    },
    signUp (payload) {
      return instance.post('login/signup', payload)
    },
    logot () {
      localStorage.removeItem('hash00h')
      localStorage.removeItem('hash01p')
      localStorage.removeItem('hash02s')
      localStorage.removeItem('hash03h')
      localStorage.removeItem('hash04p')
      localStorage.removeItem('hash05s')
    }
  }
}
