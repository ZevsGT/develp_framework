export default function (instance, token) {
  return {
    get_list () {
      return instance.get('services')
    }
  }
}
