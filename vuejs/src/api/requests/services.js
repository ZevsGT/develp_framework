export default function (instance) {
  return {
    get_list () {
      return instance.get('services')
    }
  }
}
