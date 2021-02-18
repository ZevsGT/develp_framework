<template>
  <div class="pages_card">
    <div class="tittle">
      <span>{{title}}</span>
    </div>
    <div class="tools">
      <router-link :to="href" class="btn_tools">
        <i class="fas fa-edit"></i>
      </router-link>
      <button class="btn_tools" @click.prevent="delete_page">
        <i class="fas fa-trash"></i>
      </button>
    </div>
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
    url: {
      type: String,
      required: true
    }
  },
  computed: {
    href () {
      return this.url + this.id
    }
  },
  methods: {
    delete_page () {
      this.$emit('deletePage', {
        id: this.id,
        index: this.index
      })
    }
  }
}
</script>

<style>
  .pages_card {
    background-color: #6E65C0;
    color: #fff;
    border-radius: 1rem;
    overflow: hidden;
    text-align: center;
    background-size: cover;
    transition: 1s;
    height: 100%;
    min-height: 300px;
    position: relative;
  }

  .pages_card .tittle {
    padding: 1rem;
    font-size: 1.4rem;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-shadow: 0px 0px 30px rgba(0, 0, 0, 0.8);
  }

  .pages_card .tittle span{
    display: block;
    margin: auto 0;
  }
</style>
