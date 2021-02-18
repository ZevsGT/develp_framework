<template>
  <section class="w_s_itm">
    <img class="w-100" :src="Sdata.srcImg" alt="Пример разработки сайта">
    <div v-if="visibleTools" class="tools_load_img">
      <input type="file" class="form-file-input" :id="get_id" @change="load_img">
      <label class="form-file-label" :for="get_id">
        <i class="fas fa-file-upload"></i>
      </label>
    </div>
    <slot v-if="visibleTools"></slot>
  </section>
</template>

<script>
export default {
  props: {
    index: Number,
    visibleTools: {
      type: Boolean,
      default: false
    },
    Sdata: Object
  },
  data () {
    return {
      file: null,
      img_src: ''
    }
  },
  computed: {
    get_id () {
      return 'load_bg_img' + this.index
    }
  },
  methods: {
    async load_img (e) {
      let formData = new FormData()
      formData.append('img_file', e.target.files[0])
      formData.append('spa_request', true)

      let data = this.Sdata
      await this.$api.portfolio.upload_img(
        formData
      )
        .then(response => {
          if (response.data.state === 'ready') data.srcImg = '/' + response.data.src_img
          else console.log(response.data)
        })
    }
  }
}
</script>

<style>
  .tools_load_img {
    position: absolute;
    width: 48px;
    height: 64px;
    top: 50%;
    left: 50%;
    font-size: 4rem;
    text-align: center;
    overflow: hidden;
  }
  .tools_load_img:hover {
    opacity: .7;
  }
</style>
