import HToken from '../headerToken'

export default function (instance) {
  return {
    newPages (payload) {
      return instance.post('pages/new', payload, HToken.Access)
    },
    getPagesList (payload) {
      return instance.post('admin/pages', payload, HToken.Access)
    },
    deletePage (id) {
      return instance.get('admin/pages/delete/' + id, HToken.Access)
    },
    getDataEdit (id) {
      return instance.get('admin/pages/edit/' + id, HToken.Access)
    },
    updateDataPage (id, payload) {
      return instance.post('admin/pages/update/' + id, payload, HToken.Access)
    }
  }
}
