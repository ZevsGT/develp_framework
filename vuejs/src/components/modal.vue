<template>
  <div class="d-modal" :class="{'d-modal-visible': visibility}">
    <div>
      <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    visibility: {
      type: Boolean,
      default: false
    }
  },
  data () {
    return {
      scrollbarWidth: null
    }
  },
  watch: {
    visibility () {
      if (this.visibility) {
        document.body.style.overflow = 'hidden'
        document.body.style.paddingRight = this.scrollbarWidth + 'px'
      } else {
        document.body.style.overflow = ''
        document.body.style.paddingRight = ''
      }
    }
  },
  mounted () {
    this.scrollbarWidth = parseInt(window.innerWidth) - parseInt(document.documentElement.clientWidth)
  },
  methods: {
  }
}
</script>

<style>
  .d-modal {
    position: fixed;
    top: 0;
    left: 0;
    background-color: rgba(0,0,0, .8);
    width: 100%;
    height: 100%;
    z-index: 10000;
    visibility: hidden;
    overflow: hidden;
    opacity: 0;
    transition: .2s;
  }
  .d-modal-visible {
    visibility: visible;
    opacity: 1;
    overflow-y: auto;
  }
</style>
