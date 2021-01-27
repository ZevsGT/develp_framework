export default function (instance) {
  return {
    newOrder (payload) {
      return instance.post('new_order', payload)
    }
  }
}
