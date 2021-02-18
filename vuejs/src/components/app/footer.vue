<template>
  <footer class="mt_sect">

    <div class="useful_links">

      <div class="logo_box">
        <img src="/img/logo_footer.svg" alt="">
      </div>

      <div class="foo-menu">
        <h5>НАВИГАЦИЯ</h5>
        <ul>
          <li>
            <router-link to="/#services">Услуги</router-link>
          </li>
          <li>
            <router-link to="/#portfolio">Портфолио</router-link>
          </li>
          <!--<li>
            <router-link to="/#command">Наша команда</router-link>
          </li>-->
          <li>
            <router-link to="/#howwework">Как мы работаем</router-link>
          </li>
        </ul>
      </div>
      <!--
      <div class="foo-menu">
        <h5>РАБОТА С ПОРТАЛОМ</h5>
        <ul>
          <li>
            <router-link to="/login">Авторизоваться</router-link>
          </li>
          <li>
            <router-link to="/login">Зарегистрироваться</router-link>
          </li>
        </ul>
      </div>
      -->
      <div class="foo-menu">
        <h5>ИНФОРМАЦИЯ</h5>
        <ul>
          <li>
            <router-link to="/page/rules">Условия Использования</router-link>
          </li>
          <li>
            <router-link to="/page/privacy">Политика Конфиденциальности</router-link>
          </li>
        </ul>
      </div>
      <!--
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
      -->
    </div>

    <hr>
    <div class="foo-bi mt-2">
      <span class="copyrate">© 2020-{{year}} develp.ru - Создание и разработка сайтов. г.Саратов</span>
      <div class="social">
        <a href="tel:+79951271482" class="d-block d-lg-inline-block" target="_blank">+79951271482</a>
        <a href="https://wa.me/79951271482" target="_blank"><i class="fab fa-whatsapp"></i></a>
        <a href="https://viber.click/79951271482" target="_blank"><i class="fab fa-viber"></i></a>
        <a href="https://t.me/develp" target="_blank"><i class="fab fa-telegram-plane"></i></a>
        <a href="https://vk.com/develp_ru" target="_blank"><i class="fab fa-vk"></i></a>
      </div>
    </div>

    <span class="first_rectangle"></span>
    <span class="second_rectangle"></span>

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
