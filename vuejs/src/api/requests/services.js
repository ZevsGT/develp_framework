export default function (instance, token) {
  return {
    get_list () {
      return instance.get('services')
    },
    get_list_admin (payload) {
      return instance.post('admin/services', payload)
    },
    new_service (payload) {
      return instance.post('admin/services/new', payload)
    },
    get_data_edit (id) {
      return instance.get('admin/service/edit/' + id)
    },
    store_data (payload) {
      return instance.post('admin/service/edit', payload)
    },
    upload_img (payload) {
      return instance.post('admin/service/upload_img', payload, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      })
    },
    delete_service (payload) {
      return instance.post('admin/service/delete', payload)
    },
    delete_sub_service (payload) {
      return instance.post('admin/service/sub/delete', payload)
    },
    get_data (id) {
      return instance.get('service/' + id)
    }
  }
}
