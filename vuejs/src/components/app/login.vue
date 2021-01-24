<template>
  <form action="#" class="l_form sign-in-form">
    <h2 class="title">Авторизация</h2>
    <div class="input-field">
      <i class="fas fa-user"></i>
      <input v-model="form.email" type="email" placeholder="Email" />
    </div>
    <div class="input-field">
      <i class="fas fa-lock"></i>
      <input v-model="form.password" type="password" placeholder="Пароль" />
    </div>
    <input type="submit" value="Войти" class="l_btn solid" @click.prevent="signIn" />
  </form>
</template>

<script>
export default {
  data () {
    return {
      form: {
        email: '',
        password: ''
      }
    }
  },
  mounted () {
    if (localStorage.getItem('hash00h') && localStorage.getItem('hash01p') && localStorage.getItem('hash02s')) {
      this.$api.users.validate_token({
        token: localStorage.getItem('hash00h') + '.' + localStorage.getItem('hash01p') + '.' + localStorage.getItem('hash02s')
      })
        .then(response => {
          if (response.data.state === 'ready') {
            let user = JSON.parse(window.atob(localStorage.getItem('hash01p')))
            this.$store.commit('setUser', user)
            this.$router.push({ name: 'Admin' })
          }
        })
    }
  },
  methods: {
    signIn () {
      this.$api.auth.signIn(this.form)
        .then(response => {
          if (response.data.state === 'ready') {
            let token = response.data.token.split('.', 3)
            localStorage.setItem('hash00h', token[0])
            localStorage.setItem('hash01p', token[1])
            localStorage.setItem('hash02s', token[2])
            let disposableToken = response.data.disposable_token.split('.', 3)
            localStorage.setItem('hash03h', disposableToken[0])
            localStorage.setItem('hash04p', disposableToken[1])
            localStorage.setItem('hash05s', disposableToken[2])
            let user = JSON.parse(window.atob(token[1]))
            this.$store.commit('setUser', user)
            this.$router.push({ name: 'Admin' })
          }
        })
    }
  }
}
</script>
