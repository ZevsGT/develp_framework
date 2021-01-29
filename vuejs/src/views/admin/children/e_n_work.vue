<template>
  <div class="edit_container mt-4">
    <div>
      <form style="position: sticky; top: 90px;">
        <div class="mb-3">
          <label for="title" class="form-label">Название</label>
          <input type="text" class="form-control" id="title" v-model="form.title">
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Описание</label>
          <textarea class="form-control" id="description" rows="3" v-model="form.description"></textarea>
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
          <div v-show="form.src_preview" class="img_preview">
            <img :src="form.src_preview" alt="">
          </div>
        </div>
        <div class="mb-3">
          <label for="Color" class="form-label">Цвет подложки в превью</label>
          <input type="color" class="form-control form-control-color" id="Color" v-model="form.color">
        </div>
        <button type="submit" class="btn btn_admin" @click.prevent="send">Готово</button>
      </form>
    </div>
    <div class="w_s_list">
      <component
        v-for="(component, index) in form.body"
        :key="index"
        :is="component.type_name"
        :Sdata="component.Sdata"
        :visibleTools="true"
        :index="index"
      >
       <div class="w_i_tools">
         <button class="btn_ btn_admin">
           <i class="fas fa-puzzle-piece"></i>&nbsp;&nbsp;Выбрать тип секции
         </button>
         <button class="btn_ btn_admin" @click.prevent="delete_section(index)">
           <i class="fas fa-trash"></i>
         </button>
       </div>
      </component>
      <button class="add_section mt-4" @click.prevent="add_section">
        <i class="fas fa-plus"></i>
      </button>
    </div>
  </div>
  <modal :visibility="visibility" @click="visibility = !visibility">
    <div class="modal_confirm" @click.stop>
      <div class="mb-4">Изменения сохранены!</div>
      <button class="btn_ btn_secondary" @click="visibility = !visibility">Продолжить</button>
      <button class="btn_ btn_admin ml-3" @click="redirect">К работам</button>
    </div>
  </modal>
</template>

<script>
import ImageSection from '@/components/work/w_image_section.vue'
import modal from '@/components/modal.vue'

export default {
  components: {
    ImageSection,
    modal
  },
  data () {
    return {
      visibility: false,
      file: {
        name: 'Файл не выбран...'
      },
      form: {
        title: '',
        description: '',
        color: '#ffffff',
        src_preview: null,
        body: []
      }
    }
  },
  mounted () {
    if (this.$route.name === 'Portfolio_edit') {
      this.$api.portfolio.get_data_portfolio(this.$route.params.id)
        .then(response => {
          if (response.data.id === this.$route.params.id) this.form = response.data
        })
    }
  },
  methods: {
    async send () {
      if (this.$route.name === 'Portfolio_new') {
        await this.$api.portfolio.add_new_portfolio(this.form)
          .then(response => {
            if (response.data.state === 'ready') this.$router.push({ name: 'Portfolio' })
          })
      } else if (this.$route.name === 'Portfolio_edit') {
        await this.$api.portfolio.update_portfolio(this.form.id, this.form)
          .then(response => {
            if (response.data.state === 'ready') this.visibility = true
          })
      }
    },
    async load_img (e) {
      let formData = new FormData()
      formData.append('img_file', e.target.files[0])
      formData.append('spa_request', 1)
      await this.$api.portfolio.upload_img(
        formData
      )
        .then(response => {
          if (response.data.state === 'ready') this.form.src_preview = 'http://framework.ru/' + response.data.src_img
          else console.log(response.data)
        })
    },
    add_section () {
      this.form.body.push({
        type_name: 'ImageSection',
        Sdata: {
          srcImg: ''
        }
      })
    },
    delete_section (index) {
      this.form.body.splice(index, 1)
    },
    redirect () {
      this.$router.push({ name: 'Portfolio' })
    }
  }
}
</script>

<style>
  .add_section {
    display: block;
    border-radius: 1rem;
    min-height: 200px;
    width: 100%;
    box-shadow: 4px 5px 15px 0px rgba(50, 38, 174, 0.2);
    background-color: #F7F7FF;
    border: 3px #3024A6 dashed;
    color: #3024A6;
    font-size: 4rem;
    opacity: .4;
    transition: .2s;
  }
  .add_section:hover {
    opacity: .7;
  }
  .w_s_list {
    border-radius: 1rem;
    overflow: hidden;
  }
  .w_s_itm {
    min-height: 400px;
    background-color: #F7F7FF;
    position: relative;
  }
  .w_i_tools {
    position: absolute;
    top: 1rem;
    right: 1rem;
  }
  .w_i_tools button {
    border: initial;
    margin-left: 1rem;
    opacity: .5;
  }
  .img_preview {
    width: 350px;
    height: 350px;
    overflow: hidden;
    border-radius: 1rem;
  }
  .img_preview img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  @media (min-width: 576px) {
  }
  @media (min-width: 768px) {
  }
  @media (min-width: 992px) {
  }
  @media (min-width: 1200px) {
  }
  @media (min-width: 1400px) {
  }
</style>
