<template>
  <div class="container">
    <div class="o_c">
      <header-oomponent>
        <nav-head />
        <div class="head-body mb-3">
          <div class="header_text">
            <h1>{{pageData.title}}</h1>
          </div>
          <div class="b_head_img">
          </div>
        </div>
      </header-oomponent>
      <div class="s_text" v-html="pageData.data">
      </div>
    </div>

    <component-footer/>
  </div>
  <component-bg-animated
    :style="'position: fixed; height: 100vh'"
  />
</template>

<script>
import ComponentFooter from '@/components/app/footer.vue'
import ComponentBgFnimated from '@/components/app/bg_animated.vue'
import HeaderComponent from '@/components/app/header.vue'
import NavHead from '@/components/app/nav_head.vue'

export default {
  components: {
    'component-footer': ComponentFooter,
    'component-bg-animated': ComponentBgFnimated,
    'header-oomponent': HeaderComponent,
    'nav-head': NavHead
  },
  data () {
    return {
      pageData: {
        title: null,
        url_name: null,
        data: null
      }
    }
  },
  mounted () {
    this.loadPage()
  },
  watch: {
    $route (to, from) {
      this.loadPage()
      window.scrollTo(0, 0)
    }
  },
  methods: {
    async loadPage () {
      await this.$api.pages.getPage(this.$route.params.name)
        .then(response => {
          if (response.data.id) {
            this.pageData = response.data
            document.title = response.data.title
          }
        })
    }
  }
}
</script>

<style scoped>
  .b_head_img {
    background-image: url(/img/img_bg_inf.png);
    background-size: contain;
    height: 250px;
    background-position: right;
    display: none;
    width: 100%;
    transform: translateX(0);
  }
  header {
    background: linear-gradient(111.52deg, rgba(33, 25, 32, 0.97) 30.67%, #777EC1 89.43%);
  }
  header .header_text {
    grid-column: span 2;
    width: 100%;
    padding-top: 0;
    display: flex;
    align-items: center;
  }
  header .header_text h1 {
    font-size: 1.5rem;
  }
  .o_c {
    border-bottom-left-radius: 1em;
    border-bottom-right-radius: 1em;
    background-color: #303030;
    color: #ffff;
  }
  .s_text {
    color: #fff;
    padding: 1rem 1rem;
  }
  @media (min-width: 768px) {
    .head-body {
      grid-template-columns: 1fr .5fr;
    }
  }

  @media (min-width: 992px) {
    .b_head_img {
      display: initial;
    }
    header .header_text {
      grid-column: initial;
    }
    header .header_text h1 {
      font-size: 2rem;
    }
    .s_text {
      padding: 1rem 2rem;
    }
  }

  @media (min-width: 1200px) {
    .s_text {
      padding: 1rem 4rem;
    }
  }

  @media (min-width: 1400px) {
    .s_text {
      padding: 1rem 6rem;
    }
  }
</style>
