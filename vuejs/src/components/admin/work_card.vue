<template>
  <div class="w__card">
    <img :src="srcImg" alt="">
    <div class="w__tools">
      <router-link to="#" class="btn_tools">
        <i class="fas fa-edit"></i>
      </router-link>
      <button class="btn_tools">
        <i class="fas fa-trash"></i>
      </button>
    </div>
    <div class="w__title">{{title}}</div>
  </div>
</template>

<script>
export default {
  props: {
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
  .w__tools {
    position: absolute;
    top: 1rem;
    right: 1rem;
  }
  .btn_tools {
    background-color: initial;
    border: none;
    color: #fff;
    font-size: 1.3rem;
    transition: .2s;
    margin-left: .5rem;
  }
  .btn_tools:hover {
    color: rgba(256,256,256,.7);
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
