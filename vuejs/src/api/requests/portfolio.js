export default function (instance, token) {
  return {
    get_portfolio_list (payload) {
      return instance.post('portfolio', payload)
    },
    get_a_portfolio_list (payload) {
      return instance.post('admin/portfolio', payload, token.Access())
    },
    upload_img (payload) {
      return instance.post('admin/portfolio/upload_img', payload, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      })
    },
    add_new_portfolio (payload) {
      return instance.post('admin/portfolio/add_new', payload, token.Access())
    },
    get_data_portfolio (id) {
      return instance.get('admin/portfolio/edit/' + id, token.Access())
    },
    update_portfolio (id, payload) {
      return instance.post('admin/portfolio/update/' + id, payload, token.Access())
    },
    delete_portfolio (id) {
      return instance.post('admin/portfolio/delete/' + id, token.Access())
    },
    get_data_portfolio_Id (id) {
      return instance.get('portfolio/' + id)
    }
  }
}
