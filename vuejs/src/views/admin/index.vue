<template>
  <div class="a_container">
    <nav>
      <a href="#">logo</a>
      <div class="nav-bar">
        <ul>
          <router-link  to="/admin" v-slot="{ href, isExactActive }">
            <li class="link-nav" :class="isExactActive && 'router-link-exact-active'">
              <a :href="href">
                <i class="fas fa-chart-pie"></i>
              </a>
            </li>
          </router-link>
          <router-link to="/admin/portfolio" v-slot="{ href, isExactActive }">
            <li class="link-nav" :class="isExactActive && 'router-link-exact-active'">
              <a :href="href">
                <i class="fas fa-briefcase"></i>
              </a>
            </li>
          </router-link>
        </ul>
      </div>
    </nav>
    <div class="content">
      <div class="top-bar sticky-top">
        <div class="search input-group">
          <button class="btn btn-search" type="button"><i class="fas fa-search"></i></button>
          <input type="text" class="form-control inp-search" placeholder="Поиск" aria-label="Example text with button addon" aria-describedby="button-addon1">
        </div>
        <div class="top-nav">
          <ul>
            <li>
              <a href="/" target="_blank">Главаня сайта</a>
            </li>
          </ul>
        </div>
        <div class="u_bar">
          <span class="bell">
            <a href="#"><i class="fas fa-bell"></i></a>
          </span>
          <span>
            <a href="#" class="" @click.prevent>
              <img :src="src_u_photo" alt="">
            </a>
            <ul class="">
              <li><a class="" href="#">Профиль</a></li>
              <li><a class="" href="#" @click.prevent="logout">Выйти</a></li>
            </ul>
          </span>
        </div>
      </div>

      <router-view></router-view>

    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      dropdown: false,
      src_u_photo: 'https://bh.by/upload/iblock/112/1127994722e9b9e78c1f69861320a45d.jpg'
    }
  },
  mounted () {
    if (this.$store.state.user === null) {
      let user = JSON.parse(window.atob(localStorage.getItem('hash01p')))
      this.$store.commit('setUser', user)
    }
    this.src_u_photo = this.$store.state.user.src_photo
  },
  methods: {
    logout () {
      this.$api.auth.logot()
      this.$router.push({ name: 'Login' })
    }
  }
}
</script>

<style>
  .a_container {
    background-color: #3226AE;
    color: #2C4D7A;
    display: grid;
    overflow: hidden;
  }
  .content {
    background-color: #fff;
    overflow: hidden;
    overflow-y: auto;
  }
  nav {
    display: grid;
    position: relative;
  }
  .nav-bar ul{
    list-style: none;
    padding: 0;
  }
  .nav-bar a {
    font-size: 1.5rem;
    color: rgba(256,256,256, .5);
    transition: .2s;
  }
  .nav-bar a:hover {
    color: rgba(256,256,256, .8);
  }
  .nav-bar .link-nav {
    margin-bottom: .3rem;
    padding: 1rem;
    line-height: initial;
    text-align: center;
    transition: .2s;
    border-radius: 1rem;
  }
  .nav-bar .router-link-exact-active{
    background-color: #fff;
    box-shadow: 4px 5px 15px 0px rgba(50, 38, 174, 0.2);
    color: #F04B45;
  }
  .router-link-exact-active a,
  .router-link-exact-active a:hover{
    color: #F04B45;
  }
  .top-bar {
    display: grid;
    background-color: #fff;
  }
  .search {
    background-color: rgba(219, 219, 219, .3);
    border-radius: .5rem;
    height: 38px;
  }
  .btn-search {
    color: #3024A6;
    border: initial;
  }
  .inp-search,
  .inp-search:focus{
    background-color: initial;
    color: rgba(50,38,174, .5);
    border: initial;
    box-shadow: initial;
    padding: .375rem 0;
  }
  .inp-search::placeholder {
    color: rgba(50,38,174, .3);
  }
  .top-nav ul {
    margin: 0;
  }
  .top-nav ul li{
    display: inline-block;
    padding: .5rem 1rem;
    height: 38px;
  }
  .top-nav a {
    text-decoration: none;
    font-weight: bold;
    color: #2e2e2e;
    transition: .2s;
  }
  .top-nav a:hover{
    opacity: .5;
  }
  .u_bar {
    text-align: right;
    display: flex;
    align-self: center;
    justify-content: flex-end;
  }
  .u_bar .bell {
    margin-right: 2rem;
    font-size: 1.5rem;
    padding-top: 7px;
  }
  .u_bar .bell::before {
    content: '';
    display: block;
    position: absolute;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background-color: #FA3730;
    transform: translate(13px,5px);
  }
  .bell a {
    color: #B9BFDB;
    transition: .2s;
  }
  .bell a:hover {
    color: rgba(185, 191, 219, .8);
  }
  .u_bar img {
    height: 45px;
    width: 45px;
    border-radius: 1rem;
    object-fit: cover;
  }
  .a_l_container {
    display: grid;
    grid-gap: 1.5rem;
    grid-template-rows: auto;
  }
  .btn_admin,
  .btn_secondary{
    color: #fff;
    background-color: #3226AE;
    padding: 7px 25px;
  }
  .btn_admin:hover,
  .btn_secondary:hover{
    color: #fff;
    opacity: .9;
  }
  .btn_secondary {
    background-color: #6c757d;
  }
  .modal_confirm {
    background-color: #fff;
    padding: 1rem 3rem;
    border-radius: 1rem;
    position: absolute;
    top: 30%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
  }
  @media (min-width: 576px) {
  }
  @media (min-width: 768px) {
  }
  @media (min-width: 992px) {
    .a_container {
      height: 100vh;
      grid-template-columns: auto 1fr;
    }
    .content {
      border-radius: 50px 0 0 50px;
      padding: 0 70px 1rem 70px;
      padding-top: 0;
    }
    nav {
      grid-template-rows: auto 1fr;
    }
    .nav-bar {
      display: flex;
      align-self: center;
    }
    .nav-bar ul {
      padding: 1rem;
    }
    .nav-bar .router-link-exact-active{
      position: relative;
      transform: translateX(30px);
    }
    .top-bar {
      padding-top: 1rem;
      grid-template-columns: repeat(4, 1fr);
    }
    .search {
      grid-column: 1;
    }
    .top-nav {
      grid-column: span 2;
    }
    .a_l_container {
      grid-template-rows: initial;
      grid-template-columns: repeat(4, 1fr);
    }
  }
  @media (min-width: 1200px) {
  }
  @media (min-width: 1400px) {
  }
</style>
