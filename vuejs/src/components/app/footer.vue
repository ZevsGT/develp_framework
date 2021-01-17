<template>
  <footer class="mt_sect">

    <div class="useful_links">

      <div class="logo_box">
        <img src="img/logo.svg" alt="" height="25">
      </div>

      <div class="foo-menu">
        <h5>НАВИГАЦИЯ</h5>
        <ul>
          <li>
            <a href="#">Главная</a>
          </li>
          <li>
            <a href="#">Услуги</a>
          </li>
          <li>
            <a href="#">Портфолио</a>
          </li>
          <li>
            <a href="#">Наша команда</a>
          </li>
          <li>
            <a href="#">Как мы работаем</a>
          </li>
        </ul>
      </div>

      <div class="foo-menu">
        <h5>РАБОТА С ПОРТАЛОМ</h5>
        <ul>
          <li>
            <a href="#">Авторизоваться</a>
          </li>
          <li>
            <a href="#">Зарегистрироваться</a>
          </li>
        </ul>
      </div>

      <div class="foo-menu">
        <h5>ИНФОРМАЦИЯ</h5>
        <ul>
          <li>
            <a href="rules.html">Условия Использования</a>
          </li>
          <li>
            <a href="privacy.html">Политика Конфиденциальности</a>
          </li>
        </ul>
      </div>

      <div class="foo-menu">
        <h5>ПОМОЩЬ</h5>
        <ul>
          <li>
            <a href="#">Пункт 1</a>
          </li>
          <li>
            <a href="#">Пункт 2</a>
          </li>
        </ul>
      </div>

    </div>

    <hr>
    <div class="foo-bi mt-2">
      <span class="copyrate">© 2020-{{year}} develp.ru - Команда разработчиков</span>
      <div class="social">
        <a href="#">8(800)-000-00-00</a>
        <a href="#"><i class="fab fa-whatsapp"></i></a>
        <a href="#"><i class="fab fa-telegram-plane"></i></a>
        <a href="#"><i class="fab fa-vk"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>

    <div class="fr-box">
      <span class="first_rectangle"></span>
      <span class="second_rectangle"></span>
    </div>

  </footer>
</template>

<script>
export default {
  data () {
    return {
      year: new Date().getFullYear()
    }
  }
}
</script>
