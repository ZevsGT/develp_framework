<template>
  <header-oomponent>
    <nav-head />
    <div class="head-body mb-5">
      <div class="header_text">
        <h1>Привет!<br>Мы команда разработчиков</h1>
        <h3>Нас всегда привлекал дизайн и разработка. Нам нравится каждый аспект своего дела и мы любим разрабатывать веб-сайты и мобильные приложения от начала и до конца. Создадим сайт любой сложности для Вас или Вашего бизнеса качественно и в короткие сроки.</h3>
        <a class="btn_ btn_contact_light" href="#feedback">Связаться с нами</a>
      </div>
      <div class="b_head_img">
        <component-bg-animated
          :behavior="behavior"
          :options="options"
          :style="'opacity: .8;'"
        />
      </div>
    </div>
  </header-oomponent>
</template>

<script>
import ComponentBgFnimated from '@/components/app/bg_animated.vue'
import HeaderComponent from '@/components/app/header.vue'
import NavHead from '@/components/app/nav_head.vue'

export default {
  components: {
    'component-bg-animated': ComponentBgFnimated,
    'header-oomponent': HeaderComponent,
    'nav-head': NavHead
  },
  data () {
    return {
      behavior: 'stated',
      options: [
        {
          type: 'o',
          size: 0.8,
          position: {
            x: 90,
            y: 188
          }
        },
        {
          type: 'o',
          size: 0.6,
          position: {
            x: 120,
            y: 128
          }
        },
        {
          type: 'x',
          size: 0.5,
          position: {
            x: 65,
            y: 160
          }
        },
        {
          type: 'x',
          size: 0.35,
          position: {
            x: 40,
            y: 150
          }
        },
        {
          type: 'o',
          size: 0.7,
          position: {
            x: 110,
            y: 388
          }
        },
        {
          type: 'o',
          size: 0.6,
          position: {
            x: 130,
            y: 435
          }
        },
        {
          type: 'o',
          size: 0.4,
          position: {
            x: 80,
            y: 420
          }
        },
        {
          type: 'o',
          size: 0.8,
          position: {
            x: 580,
            y: 138
          }
        },
        {
          type: 'o',
          size: 0.6,
          position: {
            x: 630,
            y: 240
          }
        },
        {
          type: 'x',
          size: 0.5,
          position: {
            x: 660,
            y: 160
          }
        },
        {
          type: 'x',
          size: 0.5,
          position: {
            x: 540,
            y: 300
          }
        },
        {
          type: 'x',
          size: 0.5,
          position: {
            x: 610,
            y: 360
          }
        },
        {
          type: 'x',
          size: 0.35,
          position: {
            x: 341,
            y: 195
          }
        },
        {
          type: 'x',
          size: 0.3,
          position: {
            x: 255,
            y: 196
          }
        },
        {
          type: 'x',
          size: 0.2,
          position: {
            x: 200,
            y: 240
          }
        },
        {
          type: 'x',
          size: 0.2,
          position: {
            x: 245,
            y: 295
          }
        }
      ]
    }
  }
}
</script>
