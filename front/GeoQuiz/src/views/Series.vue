<script>
import axios from "axios";

export default {
  data() {
    return {
      series: []
    }
  },
  mounted() {
    this.$apidirectus.get('/serie')
        .then((response) => {
          console.log(response.data);
          this.series = response.data;
        }).catch((error) => {
      console.log(error);
    });
  }
  ,
  methods: {
  }
}


</script>

<template>
  <div>
    <h1>Series</h1>
    <div v-for="serie in series" :key="serie.idSerie">
      <h2>{{ serie.Nom }}</h2>
    </div>
  </div>
</template>

<style scoped>

</style>