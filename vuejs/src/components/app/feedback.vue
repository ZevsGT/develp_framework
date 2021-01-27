<template>
  <div id="feedback" class="feedback_sect mt_sect rounded_box">
    <div class="feedback_content">
      <div class="prerol_box box_center">
        <div>
          <h3>Появились вопросы?<br> Мы ответим!</h3>
          <p>Принимаем заявки в любое время дня и ночи</p>
        </div>
      </div>
      <div class="box_center">

        <form action="" class="form_box">
          <div class="form-input">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input v-model="form.email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
          </div>
          <div class="form-input">
            <label for="exampleFormControlTextarea1" class="form-label">Сообщение</label>
            <textarea v-model="form.message" class="form-control" id="exampleFormControlTextarea1" placeholder="Ваше сообщение" rows="3"></textarea>
          </div>
          <div class="form-submit-box">
            <button type="submit" class="btn_ btn_submit" @click.prevent="send">Отправить</button>
            <span class="oferta">Нажимая кнопку “Отправить” вы даете согласие на обработку персональных электронных данных.</span>
          </div>
        </form>

      </div>
    </div>
    <div class="sky_box">
      <span class="cloud cloud-x1" style="top: -15px;"></span>
      <span class="cloud cloud-x2" style="animation-delay: 8s; top: -20px;"></span>
      <span class="cloud cloud-x3" style="animation-delay: 15s; top: -10px"></span>
      <span class="cloud cloud-x3" style="animation-delay: 3s"></span>
      <span class="cloud cloud-x3" style="animation-delay: 30s; top: -80px"></span>
      <span class="cloud cloud-x2" style="animation-delay: 14s; top: -10px"></span>
      <span class="cloud cloud-x1" style="animation-delay: 26s"></span>
      <span class="cloud cloud-x2" style="animation-delay: 20s; top: -160px"></span>
      <span class="cloud cloud-x2" style="animation-delay: 10s; top: -210px"></span>
      <span class="cloud cloud-x1" style="animation-delay: 37s; top: -380px"></span>
      <span class="cloud cloud-x2" style="animation-delay: 24s; top: -410px"></span>
      <span class="cloud cloud-x2" style="animation-delay: 37s; top: -280px"></span>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      form: {
        email: null,
        message: null
      }
    }
  },
  methods: {
    async send () {
      await this.$api.orders.newOrder(this.form)
        .then(response => {
          if (response.data.state === 'ready') {
            this.form.email = null
            this.form.message = null
          }
        })
    }
  }
}
</script>
