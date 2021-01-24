<template>
  <form action="#" class="l_form sign-up-form">
    <h2 class="title">Регистрация</h2>
    <div class="input-field">
      <i class="fas fa-user"></i>
      <input v-model="form.name" type="text" placeholder="Ваше имя" />
    </div>
    <div class="input-field">
      <i class="fas fa-envelope"></i>
      <input v-model="form.email" type="email" placeholder="Email" />
    </div>
    <div class="input-field">
      <i class="fas fa-lock"></i>
      <input v-model="form.password" type="password" placeholder="Пароль" />
    </div>
    <input type="submit" value="Зарегистрироваться" class="l_btn solid" />
  </form>
</template>

<script>
export default {
  data () {
    return {
      form: {
        name: '',
        email: '',
        password: ''
      }
    }
  }
}
</script>
