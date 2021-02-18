<template>
  <hr>
  <h5 class="text-center">SEO</h5>
  <div class="mb-3">
    <label for="title_seo" class="form-label">Заголовок</label>
    <input v-model="title" type="text" class="form-control" id="title_seo">
  </div>
  <div class="mb-3">
    <label for="description_seo" class="form-label">Описание</label>
    <textarea v-model="description" class="form-control" id="description_seo" rows="3"></textarea>
  </div>
  <hr>
</template>

<script>
import _ from 'lodash'
export default {
  components: {
  },
  props: {
    fTitle: String,
    fdescription: String
  },
  emits: ['onSeoSend'],
  data () {
    return {
      modal_seo: false,
      title: null,
      description: null
    }
  },
  watch: {
    fTitle () {
      this.title = this.fTitle
    },
    fdescription () {
      this.description = this.fdescription
    },
    title () {
      this.debouncedSendData()
    },
    description () {
      this.debouncedSendData()
    }
  },
  created () {
    this.debouncedSendData = _.debounce(this.sendData, 500)
  },
  methods: {
    sendData () {
      this.$emit('onSeoSend', {
        title: this.title,
        description: this.description
      })
      this.modal_seo = false
    }
  }
}
</script>
