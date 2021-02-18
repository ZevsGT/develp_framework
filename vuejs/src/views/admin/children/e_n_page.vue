<template>
  <div class="edit_container mt-4">
    <div>
      <form style="position: sticky; top: 90px;">
        <div class="mb-3">
          <label for="title" class="form-label">Название страницы</label>
          <input v-model="form.title" type="text" class="form-control" id="title">
        </div>
        <div class="mb-3">
          <label for="url" class="form-label">название страницы в url</label>
          <input v-model="form.url_name" type="text" class="form-control" id="url">
        </div>
        <seo
          :fTitle="form.seo_title"
          :fdescription="form.seo_description"
          @onSeoSend="seoData"
        />
        <button type="submit" class="btn btn_admin" @click.prevent="send">Сохранить</button>
      </form>
    </div>
    <div class="">
      <ckeditor :editor="editor" v-model="form.data" :config="editorConfig"></ckeditor>
    </div>
  </div>
  <modal :visibility="visibility" @click="visibility = !visibility">
    <div class="modal_confirm" @click.stop>
      <div class="mb-4">Изменения сохранены!</div>
      <button class="btn_ btn_secondary" @click="visibility = !visibility">Продолжить</button>
      <button class="btn_ btn_admin ml-3" @click="redirect">К страницам</button>
    </div>
  </modal>
</template>

<script>
import modal from '@/components/modal.vue'
import CKEditor from '@ckeditor/ckeditor5-vue'
import ClassicEditor from '@ckeditor/ckeditor5-build-classic'
import '@ckeditor/ckeditor5-build-classic/build/translations/ru'
import seo from '@/components/admin/seo.vue'

export default {
  components: {
    ckeditor: CKEditor.component,
    modal,
    seo
  },
  data () {
    return {
      visibility: false,
      editor: ClassicEditor,
      form: {
        title: null,
        url_name: null,
        data: null,
        seo_title: null,
        seo_description: null
      },
      editorConfig: {
        language: 'ru'
      }
    }
  },
  async mounted () {
    if (this.$route.name === 'Pages_edit') {
      this.$api.pages.getDataEdit(this.$route.params.id)
        .then(response => {
          if (response.data.data.id) this.form = response.data.data
        })
    }
  },
  methods: {
    async send () {
      if (this.$route.name === 'Pages_new') {
        await this.$api.pages.newPages(this.form)
          .then(response => {
            if (response.data.status === 'ready') this.$router.push({ name: 'Pages' })
          })
      } else if (this.$route.name === 'Pages_edit') {
        await this.$api.pages.updateDataPage(this.form.id, this.form)
          .then(response => {
            if (response.data.status === 'ready') this.visibility = true
          })
      }
    },
    redirect () {
      this.$router.push({ name: 'Pages' })
    },
    seoData (data) {
      this.form.seo_title = data.title
      this.form.seo_description = data.description
    }
  }
}
</script>

<style>
  .ck.ck-editor__top.ck-reset_all {
    position: sticky;
    top: 61px;
  }

  .ck.ck-sticky-panel__placeholder {
  }
  .ck.ck-sticky-panel .ck-sticky-panel__content_sticky {
    position: sticky;
    top: 61px;
  }
</style>
