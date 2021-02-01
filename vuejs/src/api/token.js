export default function () {
  return {
    Access () {
      return {
        headers: {
          'X-Access-Token': localStorage.getItem('hash00h') + '.' + localStorage.getItem('hash01p') + '.' + localStorage.getItem('hash02s')
        }
      }
    },
    Refresh () {
      return {
        headers: {
          'X-Refresh-Token': localStorage.getItem('hash03h') + '.' + localStorage.getItem('hash04p') + '.' + localStorage.getItem('hash05s')
        }
      }
    },
    setToken (TokenAccess, RefreshToken) {
      let token = TokenAccess.split('.', 3)
      localStorage.setItem('hash00h', token[0])
      localStorage.setItem('hash01p', token[1])
      localStorage.setItem('hash02s', token[2])
      let refreshToken = RefreshToken.split('.', 3)
      localStorage.setItem('hash03h', refreshToken[0])
      localStorage.setItem('hash04p', refreshToken[1])
      localStorage.setItem('hash05s', refreshToken[2])
    }
  }
}
