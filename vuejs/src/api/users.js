export default function (instance) {
  return {
    get_worker_list () {
      return instance.get('workers?spa=get')
    }
  }
}
