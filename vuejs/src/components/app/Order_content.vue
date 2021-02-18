<template>
  <h1 class="text-center pr_z1 mb-4">{{service.title}}</h1>
  <div class="status-bar pr_z1">
    <ul>
      <li v-for="(section, index) in sections" :key="index" :class="{selected: section.selected}">
        <span class="num">{{index + 1}}</span>
        <p class="name">{{section.title}}</p>
      </li>
    </ul>
  </div>
  <div class="mt-3">

    <section v-show="sections[section_switch].name === 'Services'">
      <div class="order_content pr_z1">
        <div class="mb-3" v-html="service.description"></div>
      </div>
      <div class="row justify-content-md-center pl-5 pr-5">
        <c-service-cards
          v-for="(service_c, index) in service.child_services"
          :key="index"
          :title="service_c.title"
          :description="service_c.description"
          :id="service_c.id"
          :price="service_c.price"
          :service_id="service.id"
          @toOrder="next_in_child_id(index)"
        />
      </div>
    </section>

    <section v-show="sections[section_switch].name == 'Information'">
      <div class="order_content pr_z1">
        <div class="mb-4" v-html="form.description"></div>
        <button v-show="service.switch_services == 1" class="btn_ btn_submit mr-2" @click.prevent="back">Назад</button>
        <button class="btn_ btn_submit" @click.prevent="next">Заказать услугу</button>
      </div>
    </section>

    <section class="order_content pr_z1" v-show="sections[section_switch].name === 'Data'">
      <form class="mb-4">
        <div class="mb-3">
          <label for="FIO" class="form-label">ФИО</label>
          <input v-model="form.fio" placeholder="Иванов Иван Иванович" :class="{ 'is-invalid is-invalid-white': v$.form.fio.$error }" type="text" class="form-control" id="FIO" aria-describedby="emailHelp">
          <p v-if="v$.form.fio.$dirty" class="invalid-feedback invalid-white">
            Поле обязательно к заполнению!
          </p>
        </div>
        <div class="mb-3">
          <label for="Email1ANDPhone" class="form-label">Email или номер телефона</label>
          <input v-model="form.email_or_phone" placeholder="name@example.com или +79951271482" :class="{ 'is-invalid is-invalid-white': v$.form.email_or_phone.$error }" type="text" class="form-control" id="Email1ANDPhone" aria-describedby="Email1ANDPhoneHelp">
          <p v-if="v$.form.email_or_phone.$dirty" class="invalid-feedback invalid-white">
            Поле обязательно к заполнению!
          </p>
          <p id="Email1ANDPhoneHelp" class="form-text">Для обратной связи с вами.</p>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Сообщение</label>
          <textarea v-model="form.message" placeholder="Ваше сообщение" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
      </form>
      <button class="btn_ btn_submit" @click.prevent="back">Назад</button>
      <button class="btn_ btn_submit ml-2" @click.prevent="send">Продолжить</button>
      <p class="oferta">Нажимая кнопку “Продолжить” вы даете согласие на обработку персональных электронных данных.</p>
    </section>
    <section class="order_content pr_z1" v-show="sections[section_switch].name === 'Aaccepted'">
      <h2 class="text-center">Спасибо,<br>ваша заявка принята!</h2>
      <p class="text-center">Мы свяжемся с вами в ближайшее время</p>
    </section>
  </div>
</template>

<script>
import CServiceCards from '@/components/service/child_service_card.vue'
import { required } from '@vuelidate/validators'
import { useVuelidate } from '@vuelidate/core'

export default {
  components: {
    CServiceCards
  },
  data () {
    return {
      section_switch: 0,
      form: {
        service_id: this.$route.params.id,
        child_s_id: null,
        description: '',
        fio: null,
        email_or_phone: null,
        message: null
      },
      sections: [
        {
          title: 'Информация',
          name: 'Information',
          selected: true
        },
        {
          title: 'Данные',
          name: 'Data',
          selected: false
        },
        {
          title: 'Заявка принята',
          name: 'Aaccepted',
          selected: false
        }
      ],
      service: {}
    }
  },
  setup () {
    return { v$: useVuelidate() }
  },
  validations () {
    return {
      form: {
        fio: { required },
        email_or_phone: { required }
      }
    }
  },
  mounted () {
    this.load_data()
  },
  methods: {
    load_data () {
      this.$api.services.get_data(this.$route.params.id)
        .then(response => {
          if (response.data.status === 'ready' && response.data.data !== null) {
            this.service = response.data.data
            if (this.$route.name === 'OrderP') { // если начальная станица то загружаем заголовки и дескриптион
              document.title = this.service.seo_title
              document.querySelector('meta[name="description"]').content = this.service.seo_description
            }
            if (response.data.data.switch_services === 1) { // выводим карточки если они включины
              if (this.$route.name !== 'OrderPChild') { // если не открыта страница с описание карточки
                this.sections[0].selected = false
              } else { // если открыта страница с карточкой
                this.section_switch = 1
                let index = this.$route.params.child_id
                if (typeof this.service.child_services[index] !== 'undefined') { // проверяем есть ли такая страница загружаем данные описания
                  this.set_child_data(index)
                  document.title = this.service.child_services[index].seo_title
                  document.querySelector('meta[name="description"]').content = this.service.child_services[index].seo_description
                } else this.$router.push({ name: '404' }) // редиректим если такой страницы нет
              }
              this.sections.unshift({
                title: 'Услуги',
                name: 'Services',
                selected: true
              })
            } else this.set_description(response.data.data.description)
          } else if (response.data.data === null) this.$router.push({ name: '404' })
        })
    },
    set_description (desc) {
      this.form.description = desc
    },
    set_child_data (index) {
      this.form.child_s_id = index
      this.set_description(this.service.child_services[index].full_description)
    },
    next_in_child_id (index) {
      this.set_child_data(index)
      this.next()
      history.pushState(null, null, '/service/' + this.$route.params.id + '/' + index)
    },
    next () {
      this.section_switch++
      this.sections[this.section_switch].selected = true
    },
    back () {
      this.sections[this.section_switch].selected = false
      this.section_switch--
      if (this.section_switch === 0) history.pushState(null, null, '/service/' + this.$route.params.id)
    },
    async send () {
      this.v$.form.$touch()
      if (!this.v$.form.$error) {
        await this.$api.orders.newOrder(this.form)
          .then(response => {
            if (response.data.state === 'ready') {
              this.next()
              this.v$.$reset()
            }
          })
      }
    }
  }
}
</script>

<style scoped>
  .pr_z1 {
    position: relative;
    z-index: 1;
  }
  .order-box {
    background: linear-gradient(155.21deg, rgba(29, 26, 28, 0.97) 47.93%, #2EB4CF 144.57%);
    position: relative;
    overflow: hidden;
    color: #fff;
    padding: 2rem 0;
  }
  h1 {
    font-size: 2rem;
  }
  .status-bar {
    text-align: center;
  }
  .status-bar ul {
    list-style: none;
    padding: 0;
    --dashed-w: 150px;
  }
  .status-bar ul li{
    opacity: .5;
    display: inline-block;
    position: relative;
    width: 104px;
    transition: .2s;
  }
  .status-bar ul li:not(:first-of-type){
    margin-left: var(--dashed-w);
  }
  .status-bar ul li:not(:first-of-type):before {
    content: '';
    position: absolute;
    display: block;
    border-top: 1px dashed #fff;
    --additional: 40px;
    width: calc(var(--dashed-w) + var(--additional));
    transform: translate(calc(-1 * (var(--dashed-w) + var(--additional) / 2)), 11px);
  }
  .status-bar ul .selected{
    opacity: 1;
  }
  .status-bar ul li .num{
    border: solid 2px #fff;
    border-radius: 50%;
    padding: 5px 10px;
    background-color: rgba(256,256,265,.1);
  }
  .status-bar ul li .name{
    margin-top: 10px;
    font-weight: lighter;
    font-size: .9rem;
  }
  .order_content {
    padding: 0 15rem;
  }
  .form-control {
    display: inline-block;
    width: 100%;
    background-color: rgba(255, 255, 255, .1);
    color: rgba(255, 255, 255, .5);
    border: 2px solid rgba(255, 255, 255, 0.5);
  }

  .form-control::placeholder {
    color: rgba(255, 255, 255, .5);
  }

  .form-control:focus {
    background-color: rgba(255, 255, 255, .1);
    border-color: #E0E0E0;
    color: #E0E0E0;
    box-shadow: 0 0 0 0.2rem rgba(255, 255, 255,.1);
  }
  @media (max-width: 1200px) {
    .order_content {
      padding: 0 calc(2rem + (15 - 2) * ((100vw - 320px) / (1200 - 320)));
    }
    .status-bar ul {
      --dashed-w: calc(-10px + (150 + 10) * ((100vw - 320px) / (1200 - 320)));
    }
    .status-bar ul li{
      width: calc(70px + (104 - 70) * ((100vw - 320px) / (1200 - 320)));
    }
    .status-bar ul li .name{
      font-size: calc(0.6rem + (0.9 - 0.6) * ((100vw - 320px) / (1200 - 320)));
    }
    h1{
      font-size: calc(1.5rem + (2 - 1.5) * ((100vw - 320px) / (1200 - 320)));
    }
  }
</style>
