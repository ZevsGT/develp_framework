<template>
  <div id="command" class="command_box mt_sect rounded_box">
    <h3 class="H_section text-center">Наша команда</h3>
    <swiper
      :slides-per-view="1"
      :breakpoints="breakpoints"
      :space-between="30"
      navigation
      :loop="true"
      :pagination="{ clickable: true }"
      class="theme-profile"
    >
      <swiper-slide v-for="(user, index) in users_team" :key="index">
        <profile-card
          :id="user.id"
          :name="user.name"
          :status="user.status"
          :role="user.role"
          :linkVk="user.link_vk"
          :srcImg="user.src_photo"
          :srcBgImg="user.bg_src_img"
        />
      </swiper-slide>
    </swiper>
    <span class="first_rectangle"></span>
    <span class="second_rectangle"></span>
  </div>
</template>

<script>
import ProfileCard from '@/components/app/profile_card.vue'
import SwiperCore, { Navigation, Pagination } from 'swiper'
import { Swiper, SwiperSlide } from 'swiper/vue'
import 'swiper/swiper.scss'

SwiperCore.use([Navigation, Pagination])

export default {
  components: {
    Swiper,
    SwiperSlide,
    ProfileCard
  },
  data () {
    return {
      users_team: [],
      breakpoints: {
        0: {
          slidesPerView: 1,
          spaceBetween: 20
        },
        576: {
          slidesPerView: 2,
          spaceBetween: 20
        },
        992: {
          slidesPerView: 3,
          spaceBetween: 20
        },
        1200: {
          slidesPerView: 4,
          spaceBetween: 30
        },
        1400: {
          slidesPerView: 5,
          spaceBetween: 30
        }
      }
    }
  },
  async mounted () {
    await this.$api.users.get_worker_list()
      .then(response => (this.users_team = response.data))
  },
  methods: {
  }
}
</script>

<style>
  .swiper-button-prev,
  .swiper-button-next {
    opacity: .7;
    transition: .2s;
    position: absolute;
    top: 50%;
    z-index: 10;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 2rem;
    height: 2rem;
    background-repeat: no-repeat;
    background-position: center;
  }
  .swiper-button-prev:hover,
  .swiper-button-next:hover {
    opacity: 1;
  }
  .swiper-button-prev {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 16 16'%3e%3cpath d='M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z'/%3e%3c/svg%3e");
    left: 50px;
    right: auto;
  }
  .swiper-button-prev:after, .swiper-container-rtl .swiper-button-next:after {
    content: '';
  }
  .swiper-button-next {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 16 16'%3e%3cpath d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    right: 50px;
    left: auto;
  }
  .swiper-button-next:after, .swiper-container-rtl .swiper-button-prev:after {
     content: '';
   }
  .swiper-pagination-bullet {
    width: 10px;
    height: 10px;
    background-color: rgba(152,152,152, .8);
    border-radius: 50%;
    transition: .3s;
    opacity: 1;
    transform: translateY(-25%);
    display: inline-block;
  }
  .swiper-pagination-bullet-active {
    width: 15px;
    height: 15px;
    background-color: rgba(152,152,152, 0);
    border: solid 3px #fff;
    transform: translateY(0);
  }
  .swiper-container {
    position: initial;
  }

  .swiper-pagination-fraction, .swiper-pagination-custom, .swiper-container-horizontal > .swiper-pagination-bullets {
    bottom: 10px;
    left: 0;
    width: 100%;
  }

  .swiper-pagination {
    position: absolute;
    text-align: center;
    transition: 300ms opacity;
    z-index: 10;
    transform: translate3d(0, -30px, 0);
  }
  .swiper-container-horizontal > .swiper-pagination-bullets .swiper-pagination-bullet {
    margin: 0 4px;
  }
  .swiper-pagination-clickable .swiper-pagination-bullet {
    cursor: pointer;
  }
  @media (max-width: 1200px) {
    .swiper-button-prev {
      left: calc(10px + (50 - 10)*((100vw - 320px) / (1200 - 320)));
    }
    .swiper-button-next {
      right: calc(10px + (50 - 10)*((100vw - 320px) / (1200 - 320)));
    }
  }
</style>
