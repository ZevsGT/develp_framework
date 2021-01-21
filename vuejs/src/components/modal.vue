<template>
  <div class="d-modal" :class="{'d-modal-visible': visibility}">
    <slot></slot>
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
    }
  },
  watch: {
    visibility () {
      this.visibility ? document.body.style.overflow = 'hidden' : document.body.style.overflow = ''
    }
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
    overflow-y: auto;
    opacity: 0;
    transition: .2s;
  }
  .d-modal-visible {
    visibility: visible;
    opacity: 1;
  }
</style>
