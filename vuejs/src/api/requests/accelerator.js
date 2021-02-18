export default function (instance) {
  return {
    cache (payload) {
      return instance.put('admin/cache', payload)
    }
  }
}
