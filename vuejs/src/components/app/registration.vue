<template>
  <form action="#" class="l_form sign-up-form">
    <h2 class="title">Регистрация</h2>
    <div class="input-field">
      <i class="fas fa-user"></i>
      <input v-model="form.name" type="text" placeholder="Имя" />
    </div>
    <div class="input-field">
      <i class="fas fa-user"></i>
      <input v-model="form.surname" type="text" placeholder="Фамилия" />
    </div>
    <div class="input-field">
      <i class="fas fa-envelope"></i>
      <input v-model="form.email" type="email" placeholder="Email" />
    </div>
    <div class="input-field">
      <i class="fas fa-lock"></i>
      <input v-model="form.password" type="password" placeholder="Пароль" />
    </div>
    <input type="submit" value="Зарегистрироваться" class="l_btn solid" @click.prevent="send" />
  </form>
</template>

<script>
export default {
  data () {
    return {
      form: {
        name: null,
        surname: null,
        email: null,
        password: null
      }
    }
  },
  methods: {
    send () {
      this.$api.auth.signUp(this.form)
        .then(response => {
          if (response.data.status === 'ready') {
            this.$api.token.setToken(response.data.token, response.data.refresh_token)
            let user = JSON.parse(window.atob(localStorage.getItem('hash01p')))
            this.$store.commit('setUser', user)
            this.$router.push({ name: 'Admin' })
          }
        })
    }
  }
}
</script>
