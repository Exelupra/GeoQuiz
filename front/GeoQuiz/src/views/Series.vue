<script>

export default {
  data() {
    return {
      series: []
    }
  },
  mounted() {
    this.$apidirectus.get('/serie')
        .then((response) => {
          this.series = response.data;
        }).catch((error) => {
      console.log(error);
    });
  }
  ,
  methods: {
    createGame(idSerie) {
      this.$apigeolo.post('/creePartie/' + idSerie)
          .then((response) => {
            console.log(response.data);
            this.$router.push({name: 'game', params: {id: response.data.idPartie}});
          }).catch((error) => {
        console.log(error);
      });
    }
  }
}


</script>

<template>
  <div>
    <h1>Series</h1>
    <div v-for="serie in series" :key="serie.idSerie" class="serie">
      <h2>{{ serie.Nom }}</h2>
      <button @click="createGame(serie.idSerie)">Selectionner</button>
    </div>
  </div>
</template>

<style scoped>
.serie{
  display: flex;
  justify-content: center;
}

h1{
  text-align: center;
  margin-top: 40px;
  margin-bottom: 20px;
}

button {
  height: 40px;
  padding: 5px;
  border-radius: 10px;
  border: rgb(0, 0, 0) solid 1px;
  background-color: rgba(235, 235, 235, 0.64);
  cursor: pointer;
}

h2{
  margin-right: 10px;
  padding: 0;
}
</style>