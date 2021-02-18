<template>
  <div class="w__card">
    <img :src="srcImg" alt="">
    <div class="tools">
      <router-link :to="href" class="btn_tools">
        <i class="fas fa-edit"></i>
      </router-link>
      <button class="btn_tools" @click.prevent="delete_portfolio">
        <i class="fas fa-trash"></i>
      </button>
    </div>
    <div class="w__title">{{title}}</div>
  </div>
</template>

<script>
export default {
  props: {
    index: Number,
    id: {
      type: Number,
      required: true
    },
    title: {
      type: String,
      required: true
    },
    srcImg: {
      type: String,
      default: 'https://mold-s.ru/upload/medialibrary/85e/85ed3bab0493ee42591c68313af24ace.png'
    }
  },
  computed: {
    href () {
      return 'portfolio/edit/' + this.id
    }
  },
  methods: {
    delete_portfolio () {
      this.$emit('deletePortfolio', {
        id: this.id,
        index: this.index
      })
    }
  }
}
</script>

<style>
  .w__card {
    width: 100%;
    height: 300px;
    background-color: #F7F7FF;
    box-shadow: 4px 5px 15px 0px rgba(50, 38, 174, 0.2);
    border-radius: 1em;
    overflow: hidden;
    position: relative;
    color: #fff;
  }
  .w__card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  .w__title{
    position: absolute;
    bottom: 1rem;
    left: 1rem;
    right: 1rem;
    font-size: 1.25rem;
    font-weight: bold;
  }
</style>
