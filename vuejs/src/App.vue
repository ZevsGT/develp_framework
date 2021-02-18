<template>
      <router-view/>
</template>

<script>
export default {
  async mounted () {
    await this.$api.synchronizeTime()
    this.$accelerator.sendDataCaching(document)
  }
}
</script>

<style>
</style>
