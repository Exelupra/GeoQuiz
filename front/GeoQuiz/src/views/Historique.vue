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
        <td>{{ series[historique.idSerie] || 'Chargement...' }}</td>
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
      series: {}, // Garder une trace des séries
      maxHistorySize: 10 // Taille maximale de l'historique
    };
  },
  mounted() {
    this.idUser = sessionStorage.getItem('user');
    this.fetchHistorique();
  },
  methods: {
    fetchHistorique() {
      this.$apigeolo.get(`/Historique/${this.idUser}`)
          .then((response) => {
            this.Historique = response.data;
            console.log(response.data);
            this.fetchSeries();
            if (this.Historique.length > this.maxHistorySize) {
              this.deleteOldestHistorique();
            }
          }).catch((error) => {
        console.log(error);
      });
    },
    fetchSeries() {
      const uniqueSeriesIds = [...new Set(this.Historique.map(h => h.idSerie))];
      const promises = uniqueSeriesIds.map(idSerie => {
        if (!this.series[idSerie]) {
          return this.$apidirectus.get(`/serie/${idSerie}`)
              .then((response) => {
                console.log(response.data);
                this.series[idSerie] = response.data.Nom;
              }).catch((error) => {
                console.log(error);
              });
        } else {
          return Promise.resolve(); // Série déjà récupérée
        }
      });

      Promise.all(promises)
          .then(() => {
            console.log("Toutes les séries ont été récupérées.");
          })
          .catch((error) => {
            console.log(error);
          });
    },
    deleteOldestHistorique() {
      // Tri de l'historique par date dans l'ordre croissant
      this.Historique.sort((a, b) => new Date(a.Date) - new Date(b.Date));

      // Récupération de l'ID de l'historique le plus ancien
      const oldestHistoriqueId = this.Historique[0].idHistorique;

      // Envoi de la demande de suppression
      this.$apigeolo.delete(`/Historique/${oldestHistoriqueId}`)
          .then(() => {
            console.log(`Historique avec l'ID ${oldestHistoriqueId} supprimé avec succès.`);
            // Rafraîchissement de l'historique après la suppression
            this.fetchHistorique();
          }).catch((error) => {
        console.log(error);
      });
    }
  }
}
</script>

<style scoped>
/* Ajoutez votre style ici si nécessaire */
</style>
