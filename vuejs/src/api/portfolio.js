export default function (instance) {
  return {
    get_portfolio_list (payload) {
      return instance.post('portfolio', payload)
    },
    get_a_portfolio_list (payload) {
      return instance.post('admin/portfolio', payload)
    }
  }
}
