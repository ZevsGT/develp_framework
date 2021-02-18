<templatee>
  <div>dsad</div>
</templatee>

<script>
export default {
  data () {
    return {
      status: false
    }
  },
  async mounted () {
  },
  computed: {
    classNav_list: function () {
      if (this.status === true) {
        return 'nav_list_active'
      } else {
        return ''
      }
    },
    classButton: function () {
      if (this.status === true) {
        return 'button_active'
      } else {
        return ''
      }
    }
  }
}
</script>
