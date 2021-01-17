<template>
  <div class="services_card" :style="[getBGcolor, getBGImg]">
    <div class="tittle">
      <span>{{title}}</span>
    </div>
    <div class="services_description" :style="getBGcolor">
      <span>{{description}}</span>
      <!--<a class="btn_ btn_light mt-3" href="#">Подробнее</a>-->
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
    color: {
      type: String,
      default: '#12739E'
    },
    title: {
      type: String,
      required: true
    },
    description: {
      type: String,
      required: true
    },
    srcImg: String
  },
  computed: {
    getBGcolor () {
      return {
        'background-color': this.color
      }
    },
    getBGImg () {
      return {
        'background-image': 'url(' + this.srcImg + ')'
      }
    }
  }
}
</script>
