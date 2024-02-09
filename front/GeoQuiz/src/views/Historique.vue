<template>
  <div>
    <h1>Historique</h1>
    <table>
      <thead>
      <tr>
        <th>Date</th>
        <th>Score</th>
        <th>Série</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="historique in Historique" :key="historique.idHistorique">
        <td>{{ historique.Date }}</td>
        <td>{{ historique.Score }}</td>
        <td>{{ getNomSerie(historique.idSerie) }}</td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      Historique: [],
      series: {} // Garder une trace des séries
    };
  },
  mounted() {
    this.idUser = sessionStorage.getItem('user');
    this.$apigeolo.get(`/Historique/${this.idUser}`)
        .then((response) => {
          this.Historique = response.data;
          console.log(response.data);
          // Après avoir récupéré l'historique, récupérer les séries correspondantes
        }).catch((error) => {
      console.log(error);
    });
  },
  methods: {
    getNomSerie(idSerie) {
      if (!this.series[idSerie]) {
        // Si le nom de la série n'est pas déjà enregistré, récupérer le nom depuis l'API
        this.$apidirectus.get(`/serie/${idSerie}`)
            .then((response) => {
              console.log(response.data);
              this.series[idSerie] = response.data.Nom;
            }).catch((error) => {
          console.log(error);
        });
      }
      return this.series[idSerie]; // Renvoyer le nom de la série depuis l'objet 'series'
    }
  }
}
</script>

<style scoped>
/* Ajoutez votre style ici si nécessaire */
</style>
