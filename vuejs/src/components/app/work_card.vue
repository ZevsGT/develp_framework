<template>
  <div class="card_works" :class="getClasss" :style="getBgColor">
    <div class="img_box">
      <img :src="srcImg" alt="">
      <i class="more"></i>
    </div>
    <div class="tittle_box" :style="getBgColor">
      <h5>{{title}}</h5>
      <p class="discription_box">
        {{description}}
      </p>
      <a class="btn_ btn_light text-center" href="#" @click.prevent="more_details">Подробнее</a>
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
      default: '#5D433B'
    },
    title: {
      type: String,
      required: true
    },
    description: {
      type: String,
      required: true
    },
    srcImg: {
      type: String,
      default: 'https://mold-s.ru/upload/medialibrary/85e/85ed3bab0493ee42591c68313af24ace.png'
    }
  },
  data () {
    return {
      form: ['', 'card_form_1', 'card_form_2'],
      probability: [25, 4, 2]
    }
  },
  computed: {
    getBgColor () {
      return {
        'background-color': this.color
      }
    },
    getClasss () {
      let total = this.array_sum(this.probability)
      let n = 0
      let num = this.getRandomIntInclusive(1, total)

      for (let i in this.form) {
        n += this.probability[i]
        if (n >= num) return this.form[i]
      }

      return 1
    }
  },
  methods: {
    getRandomIntInclusive (min, max) {
      min = Math.ceil(min)
      max = Math.floor(max)
      return Math.floor(Math.random() * (max - min + 1)) + min
    },
    array_sum (array) {
      let sum = 0
      for (let i in array) sum += array[i]
      return sum
    },
    more_details () {
      this.$emit('moreDetails', this.id)
    }
  }
}
</script>
