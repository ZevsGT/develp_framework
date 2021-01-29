export default {
  Access: {
    headers: {
      'X-Access-Token': localStorage.getItem('hash00h') + '.' + localStorage.getItem('hash01p') + '.' + localStorage.getItem('hash02s')
    }
  },
  Refresh: {
    headers: {
      'X-Refresh-Token': localStorage.getItem('hash03h') + '.' + localStorage.getItem('hash04p') + '.' + localStorage.getItem('hash05s')
    }
  }
}
