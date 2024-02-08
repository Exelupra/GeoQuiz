<script>
export default {
  data() {
    return {
      series: []
    }
  },
  mounted() {
    this.$apidirectus.get('items/Serie').then((response) => {
      console.log(response.data)
      this.series = response.data;
    })
  }
}


</script>

<template>
  <div>
  <h1>Series</h1>
      <div v-for="serie in series" :key="serie.id">
        <h2>{{ serie.title }}</h2>
        <p>{{ serie.description }}</p>
        <img :src="serie.image.data.full_url" alt="image">
      </div>
  </div>
</template>

<style scoped>

</style>