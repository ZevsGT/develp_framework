export default function (instance) {
  return {
    get_portfolio_list (payload) {
      return instance.post('portfolio', payload)
    },
    get_a_portfolio_list (payload) {
      return instance.post('admin/portfolio', payload)
    },
    upload_img (payload) {
      return instance.post('admin/portfolio/upload_img', payload, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      })
    },
    add_new_portfolio (payload) {
      return instance.post('admin/portfolio/add_new', payload)
    },
    get_data_portfolio (id) {
      return instance.get('admin/portfolio/edit/' + id)
    },
    update_portfolio (id, payload) {
      return instance.post('admin/portfolio/update/' + id, payload)
    },
    delete_portfolio (id, payload) {
      return instance.post('admin/portfolio/delete/' + id, payload)
    },
    get_data_portfolio_Id (id) {
      return instance.get('portfolio/' + id)
    }
  }
}
