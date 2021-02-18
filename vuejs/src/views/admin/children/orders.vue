<template>
  <div class="a_l_container mt-3">
    <div class="order-card" v-for="(order, index) in orders" :key="index">
      <h5>{{order.email}} {{order.email_or_phone}}</h5>
      <span>{{order.message}}</span>
    </div>
  </div>
  <div v-show="btn_vis" class="text-center mt-4">
    <a class="btn_ btn_admin" href="#" @click.prevent="load_orders">
      <i v-show="btn_loading" class="fas fa-spinner"></i>
      <span v-show="!btn_loading">Показать еще</span>
    </a>
  </div>
</template>

<script>
export default {
  data () {
    return {
      btn_vis: true,
      btn_loading: false,
      count: 0,
      orders: []
    }
  },
  mounted () {
    this.load_orders()
  },
  methods: {
    async load_orders () {
      this.btn_loading = true
      this.$api.orders.getOrdersList({ count: this.count })
        .then(response => {
          if (response.data.status === 'ready') {
            if (typeof response.data.orders_list[0] !== 'undefined') this.orders = this.orders.concat(response.data.orders_list)
            this.count += response.data.orders_list.length
            this.btn_loading = false
            if (response.data.orders_list.length < 8) this.btn_vis = false
          }
        })
    }
  }
}
</script>

<style>
  .order-card {
    padding: 1rem;
    background-color: #6E65C0;
    color: #fff;
    border-radius: 1rem;
    overflow: hidden;
    word-break: break-all;
  }
</style>
