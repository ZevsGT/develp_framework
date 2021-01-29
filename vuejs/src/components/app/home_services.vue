<template>
  <div id="services" class="mt_sect">
    <h3 class="H_section text-center mb-3">Мы предлагаем следующие услуги</h3>
    <div class="services">

      <service-card
        v-for="(service, index) in services" :key="index"
        :id="service.id"
        :srcImg="service.bg_img"
        :color="service.bg_color"
        :title="service.title"
        :description="service.description"
      />

    </div>
  </div>
</template>

<script>
import ServiceCard from '@/components/app/service_card.vue'

export default {
  components: {
    ServiceCard
  },
  data () {
    return {
      services: []
    }
  },
  async mounted () {
    await this.$api.services.get_list()
      .then(response => {
        if (response.data[0].id) this.services = response.data
      })
  }
}
</script>
