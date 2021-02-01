export default function (instance, token) {
  return {
    newOrder (payload) {
      return instance.post('new_order', payload)
    }
  }
}
