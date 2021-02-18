<template>
  <div class="edit_container mt-4">
    <div>
      <form style="position: sticky; top: 90px;">
        <div class="mb-3">
          <label for="title" class="form-label">Название услуги</label>
          <input type="text" class="form-control" id="title" v-model="form.title">
        </div>
        <div class="mb-3">
          <label for="short_description" class="form-label">Краткое описание услуги</label>
          <textarea class="form-control" id="short_description" rows="3" v-model="form.short_description"></textarea>
        </div>
        <div class="mb-3">
          <label for="Color" class="form-label">Цвет подложки</label>
          <input type="color" class="form-control form-control-color" id="Color" v-model="form.bg_color">
        </div>
        <div class="form-file mb-3">
          <label class="form-label">Превью</label>
          <div>
            <input type="file" class="form-file-input" id="imp_p" @change="load_img">
            <label class="form-file-label" for="imp_p">
              <span class="form-file-text">{{file.name}}</span>
              <span class="form-file-button">Открыть файл</span>
            </label>
          </div>
          <div v-show="form.bg_img" class="img_preview" :style="getBgColor">
            <img :src="'/' + form.bg_img" alt="">
          </div>
        </div>
        <seo
          :fTitle="form.seo_title"
          :fdescription="form.seo_description"
          @onSeoSend="seoData"
        />
        <div class="form-check form-switch mb-3">
          <input v-model="form.disabled" class="form-check-input" type="checkbox" id="SwitchCheckDisabled">
          <label class="form-check-label" for="SwitchCheckDisabled">Отключить показ</label>
        </div>
        <button type="submit" class="btn btn_admin" @click.prevent="send">Сохранить</button>
      </form>
    </div>
    <div class="">
      <div class="mb-3">
        <label class="form-label">Полное описание услуги</label>
        <ckeditor :editor="editor" v-model="form.description" :config="editorConfig"></ckeditor>
      </div>
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckServices" v-model="form.switch_services">
        <label class="form-check-label" for="flexSwitchCheckServices">Включить подуслуги</label>
      </div>
      <hr>
      <div v-show="form.switch_services" class="row justify-content-md-center">
        <c-service-cards class="color_bg"
          v-for="(service, index) in form.child_services"
          :key="index"
          :title="service.title"
          :description="service.description"
          :index="index"
          :id="service.id"
          :price="service.price"
        >
          <div class="tools">
            <button class="btn_tools" @click.prevent="edit_card_service(index)">
              <i class="fas fa-edit"></i>
            </button>
            <button class="btn_tools" @click.prevent="delete_card_service(index, service.id)">
              <i class="fas fa-trash"></i>
            </button>
          </div>
        </c-service-cards>

        <div class="col-12 col-sm-12 col-lg-3 mb-3">
          <button class="add_w add_w_modify w-100" @click.prevent="add_new_card_service">
            <i class="fas fa-plus"></i>
          </button>
        </div>

        <modal :visibility="modal_edit.active" @click="modal_edit.active = !modal_edit.active">
          <div class="container modal_edit mt-3" @click.stop>
            <div class="mb-3">
              <label for="title_с" class="form-label">Название подуслуги</label>
              <input v-model="modal_edit_data.title" type="text" class="form-control" id="title_с">
            </div>
            <div class="mb-3">
              <label for="price_с" class="form-label">Цена</label>
              <input v-model="modal_edit_data.price" type="text" class="form-control" id="price_с">
            </div>
            <div class="mb-3">
              <label class="form-label">Краткое описание подуслуги</label>
              <ckeditor :editor="editor" v-model="modal_edit_data.description" :config="editorConfig"></ckeditor>
            </div>
            <div class="mb-3">
              <label class="form-label">Полное описание подуслуги</label>
              <ckeditor :editor="editor" v-model="modal_edit_data.full_description" :config="editorConfig"></ckeditor>
            </div>
            <seo
              :fTitle="modal_edit_data.seo_title"
              :fdescription="modal_edit_data.seo_description"
              @onSeoSend="seoModalData"
            />
            <button class="btn_ btn_secondary" @click.prevent="modal_edit.active = false">Отмена</button>
            <button class="btn_ btn_admin ml-3" @click.prevent="ready_card_service">Готово</button>
          </div>
        </modal>

        <modal :visibility="visibility" @click="visibility = !visibility">
          <div class="modal_confirm" @click.stop>
            <div class="mb-4">Вы хотите удалить подуслугу?</div>
            <button class="btn_ btn_secondary" ref="btn_cancel">Отмена</button>
            <button class="btn_ btn_admin ml-3" ref="btn_delete">Удалить</button>
          </div>
        </modal>

      </div>
    </div>
  </div>

  <modal :visibility="v_store" @click="v_store = !v_store">
    <div class="modal_confirm" @click.stop>
      <div class="mb-4">Изменения сохранены!</div>
      <button class="btn_ btn_secondary" @click="v_store = !v_store">Продолжить</button>
      <router-link :to="{ name: 'Services' }" class="btn_ btn_admin ml-3">К услугам</router-link>
    </div>
  </modal>
</template>

<script>
import CKEditor from '@ckeditor/ckeditor5-vue'
import ClassicEditor from '@ckeditor/ckeditor5-build-classic'
import '@ckeditor/ckeditor5-build-classic/build/translations/ru'
import CServiceCards from '@/components/service/child_service_card.vue'
import modal from '@/components/modal.vue'
import seo from '@/components/admin/seo.vue'

export default {
  components: {
    ckeditor: CKEditor.component,
    CServiceCards,
    modal,
    seo
  },
  data () {
    return {
      file: {
        name: 'Файл не выбран...'
      },
      v_store: false,
      visibility: false,
      modal_edit: {
        active: false,
        index: null
      },
      modal_edit_data: {
        title: null,
        description: '',
        full_description: '',
        price: null,
        seo_title: null,
        seo_description: null
      },
      editor: ClassicEditor,
      form: {
        title: null,
        short_description: null,
        description: null,
        switch_services: false,
        bg_color: '#12739E',
        bg_img: null,
        disabled: false,
        seo_title: null,
        seo_description: null,
        child_services: []
      },
      seo: {
        title: '',
        description: ''
      },
      editorConfig: {
        language: 'ru'
      }
    }
  },
  computed: {
    getBgColor () {
      return {
        'background-color': this.form.bg_color
      }
    }
  },
  mounted () {
    if (this.$route.name === 'Services_edit') {
      this.$api.services.get_data_edit(this.$route.params.id)
        .then(response => {
          if (response.data.status === 'ready') {
            this.form = response.data.data
            this.form.switch_services = Boolean(response.data.data.switch_services)
            this.form.disabled = Boolean(response.data.data.disabled)
          }
        })
    }
  },
  methods: {
    add_new_card_service () {
      this.form.child_services.push({
        id: null,
        title: null,
        description: '',
        full_description: '',
        seo_title: '',
        seo_description: ''
      })
    },
    edit_card_service (index) {
      this.modal_edit.active = true
      this.modal_edit.index = index
      this.modal_edit_data.title = this.form.child_services[index].title
      this.modal_edit_data.description = this.form.child_services[index].description
      this.modal_edit_data.full_description = this.form.child_services[index].full_description
      this.modal_edit_data.price = this.form.child_services[index].price
      this.modal_edit_data.seo_title = this.form.child_services[index].seo_title
      this.modal_edit_data.seo_description = this.form.child_services[index].seo_description
    },
    ready_card_service () {
      this.form.child_services[this.modal_edit.index].title = this.modal_edit_data.title
      this.form.child_services[this.modal_edit.index].description = this.modal_edit_data.description
      this.form.child_services[this.modal_edit.index].full_description = this.modal_edit_data.full_description
      this.form.child_services[this.modal_edit.index].price = this.modal_edit_data.price

      this.form.child_services[this.modal_edit.index].seo_title = this.modal_edit_data.seo_title
      this.form.child_services[this.modal_edit.index].seo_description = this.modal_edit_data.seo_description
      this.modal_edit_data.title = null
      this.modal_edit_data.description = ''
      this.modal_edit_data.full_description = ''
      this.modal_edit_data.seo_title = ''
      this.modal_edit_data.seo_description = ''
      this.modal_edit.index = null
      this.modal_edit.active = false
    },
    delete_card_service (index, id) {
      this.visibility = true
      let invisible = () => {
        this.visibility = false
        this.$refs.btn_cancel.removeEventListener('click', invisible)
      }

      let deleteServise = () => {
        if (id != null) {
          this.$api.services.delete_sub_service({ id: id })
            .then(response => {
              if (response.data.status === 'ready') {
                this.form.child_services.splice(index, 1)
                this.visibility = false
              }
            })
        } else {
          this.form.child_services.splice(index, 1)
          this.visibility = false
        }
        this.$refs.btn_delete.removeEventListener('click', deleteServise)
      }

      this.$refs.btn_delete.addEventListener('click', deleteServise)
      this.$refs.btn_cancel.addEventListener('click', invisible)
    },
    send () {
      if (this.$route.name === 'Services_new') {
        this.$api.services.new_service(this.form)
          .then(response => {
            console.log(response.data)
            if (response.data.status === 'ready') this.$router.push({ name: 'Services' })
          })
      }
      if (this.$route.name === 'Services_edit') {
        this.$api.services.store_data(this.form)
          .then(response => {
            if (response.data.status === 'ready') this.v_store = true
          })
      }
    },
    async load_img (e) {
      let formData = new FormData()
      formData.append('img_file', e.target.files[0])
      formData.append('spa_request', 1)
      await this.$api.services.upload_img(
        formData
      )
        .then(response => {
          if (response.data.state === 'ready') this.form.bg_img = '/' + response.data.src_img
          else console.log(response.data)
        })
    },
    seoData (data) {
      this.form.seo_title = data.title
      this.form.seo_description = data.description
    },
    seoModalData (data) {
      this.modal_edit_data.seo_title = data.title
      this.modal_edit_data.seo_description = data.description
    }
  }
}
</script>

<style>
  .add_w_modify .fas{
    top: initial;
    transform: initial;
  }
  .color_bg .c_s_card {
    background-color: #3024A6
  }
  .color_bg .tools {
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    text-align: right;
    padding: 1rem;
    background-color: rgba(0,0,0,.5);
    transition: .2s;
    opacity: 0;
  }
  .color_bg .tools:hover {
    opacity: 1;
  }
  .modal_edit .ck.ck-editor__top.ck-reset_all {
    position: sticky;
    top: 0px;
  }
  .modal_edit .ck.ck-sticky-panel .ck-sticky-panel__content_sticky {
    position: sticky;
    top: 0px;
  }
</style>
