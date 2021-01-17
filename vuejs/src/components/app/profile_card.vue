<template>
  <div class="profile_card" :style="imgBg">
    <div class="profile_card_inside">
      <h5>{{name}}</h5>
      <span class="status">{{status ? 'Online' : 'Offline'}}</span>
      <img :src="srcImg" alt="">
      <span class="role mt-2">{{role}}</span>
      <div class="p_card_nav">
        <a href="#" class="fas fa-comment-alt" title="Чат"></a>
        <a v-if="linkVk != null" :href="linkVk" class="fab fa-vk" title="Страница ВКонтакте"></a>
        <a href="#" class="fas fa-user-alt" title="Профиль на сайте"></a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    id: {
      type: Number,
      required: true
    },
    name: {
      type: String,
      required: true
    },
    status: {
      type: Number,
      default: 0
    },
    role: {
      type: String,
      required: true
    },
    linkVk: {
      type: String,
      default: null
    },
    srcImg: {
      type: String,
      default: ''
    },
    srcBgImg: {
      type: String,
      default: 'data_file/maxresdefault.jpg'
    }
  },
  computed: {
    imgBg: function () {
      return {
        'background-image': 'url(' + this.srcBgImg + ')'
      }
    }
  }
}
</script>
