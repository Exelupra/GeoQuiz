<template>
  <div class="container">
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
    this.testRefresh();
  },
  methods: {
    fetchHistorique() {
      this.$apigeolo.get(`/Historique/${this.idUser}`)
          .then((response) => {
            this.Historique = response.data;
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
                this.series[idSerie] = response.data.Nom;
              }).catch((error) => {
                console.log(error);
              });
        } else {
          return Promise.resolve(); // Série déjà récupérée
        }
      });

      Promise.all(promises).catch((error) => {
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
            // Rafraîchissement de l'historique après la suppression
            this.fetchHistorique();
          }).catch((error) => {
        console.log(error);
      });
    },
    testRefresh(){
      this.$apiauth.post('/user/checkrefresh',{
        id: sessionStorage.getItem("user"),
        token: sessionStorage.getItem("refreshToken")
      }).then((response) => {
        if(response.data == false){
          sessionStorage.clear();
          this.$router.push('/connection');
          alert('Session expirée');
        }else{
          this.$apiauth.get('/user/' + sessionStorage.getItem('user')+'/startrefresh').then((response) => {
            sessionStorage.setItem('refreshToken', response.data);
          }).catch((error) => {
            console.log(error);
          });
        }
      }).catch((error) => {
        console.log(error);
      });
    }
  }
}
</script>

<style scoped>
.container {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  margin-top: 30px;
}

table {
  margin-top: 10px;
  width: 25%;
  text-align: center;
}
th, td {
  border: rgba(235, 235, 235, 0.64) solid 2px;
  padding: 10px;
}
thead{
  background-color: rgba(235, 235, 235, 0.64);
  color: #181818;
}
</style>
