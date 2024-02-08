<script>
export default {
  data() {
    return {
      series: []
    }
  },
  mounted() {
    this.$apidirectus.get('items/Serie').then((response) => {
      this.series = response.data;
    })
  },
  methods: {
    jeu(id) {
      this.$apigeolo.post('creerPartie/' + id).then((response) => {
        this.$router.push({path: '/game', params: {idSerie: response.data.idPartie}})
      })
    }
  }
}


</script>

<template>
  <div>
    <h1>Series</h1>
    <div v-for="serie in series" :key="serie.idSerie">
      <h2>{{ serie.Nom }}</h2>
      <button @click="jeu(serie.idSerie)">Selectionner</button>
    </div>
  </div>
</template>

<style scoped>

</style>