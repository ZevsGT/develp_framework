<template>
  <div class="col-12 col-sm-12 col-lg-3 mb-3">
    <div class="c_s_card">
      <h5 class="text-center">{{title}}</h5>
      <div class="description" v-html="description"></div>
      <h6 class="text-center">{{price}}</h6>
      <div class="button_box text-center">
        <a :href="'/service/' + service_id + '/' + id" class="btn_ btn_submit" @click.prevent="toOrder">Выбрать</a>
      </div>
      <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    id: Number,
    title: String,
    description: String,
    service_id: Number,
    price: String
  },
  methods: {
    toOrder () {
      this.$emit('toOrder')
    }
  }
}
</script>

<style>
  .c_s_card {
    position: relative;
    z-index: 1;
    background-color: rgba(256,256,256, .2);
    color: #fff;
    border-radius: 1rem;
    height: 100%;
    padding: 1rem;
    padding-bottom: 4.5rem;
    overflow: hidden;
  }
  .c_s_card .description {
    font-weight: lighter;
    min-height: 200px;
  }
  .c_s_card .description p {
    margin-bottom: .2rem;
  }
  .c_s_card .button_box {
    position: absolute;
    bottom: .5rem;
    width: 100%;
    left: 0;
  }
</style>
