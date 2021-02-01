export default function (instance, token) {
  return {
    newPages (payload) {
      return instance.post('pages/new', payload, token.Access())
    },
    getPagesList (payload) {
      return instance.post('admin/pages', payload, token.Access())
    },
    deletePage (id) {
      return instance.get('admin/pages/delete/' + id, token.Access())
    },
    getDataEdit (id) {
      return instance.get('admin/pages/edit/' + id, token.Access())
    },
    updateDataPage (id, payload) {
      return instance.post('admin/pages/update/' + id, payload, token.Access())
    },
    getPage (name) {
      return instance.get('page/' + name)
    }
  }
}
