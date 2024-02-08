<template>
  <div class="game">
    <div id="results">
        <div></div>
    </div>
    <div class="game_info">
      <h3>Score: </h3>
      <h3>Etapes: 0/0</h3>
      <h3>Temps restant: 00</h3>
    </div>
    <div class="game_map">
      <div id="img">JPEG.PNG</div>
      <div id="map">MAP.JPEG{{ map }}</div>
    </div>
    <button type="submit">Valider</button>
  </div>
</template>

<script>
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
import axios from 'axios';

export default {
  data() {
    return {
      score: 0,
      time: 0,
      map: null,
      marker: null,
      serie: null
    }
  },
  beforeRouteEnter(to, from, next) {
    if(this.$route.params.id == null) {
      this.$apigeolo.post('/creePartie/1').then((response) => {
        next((vm) => {
          this.$router.push('/game/',{id: response.data.id});
        });
      });
    }
  },
  mounted() {
    let idSerie = 0;
    this.$apigeolo.get('/creePartie/'+this.$route.params.id)
      .then((response) => {
        idSeries = response.data.idSerie;
      });
    
    this.$apidirectus.get('/items/Serie/'+idSerie)
      .then((response) => {
        this.serie = response.data;
      });

      
    let lat = this.serie.geoSerie.coordinates[0].value;
    let long = this.serie.geoSerie.coordinates[1].value;

    // Créer une instance de la carte et l'attribuer à votre div avec l'ID "map"
    this.map = L.map('map').setView([lat,long], 5);

    // Ajouter une couche de tuiles (tiles) à la carte, par exemple la couche OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
    }).addTo(this.map);
    
    this.map.on('click', (e) => {
      if (this.marker) {
        this.map.removeLayer(this.marker);
      }
      this.marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(this.map);
    });
  },
}

</script>

<style scoped>

.game_map {
  border: 1px solid red;
  height: 500px;
  width: 100%;
  display: flex;
}

#img {
  width: 35%;
  height: 100%;
  border: 1px solid red;
}

#map {
  border: 1px solid red;
  width: 65%;
  height: 100%;
}

.game_info {
  width: 100%;
  display: flex;
  justify-content: space-around;
  align-items: center;
  margin: 0 10%;
  padding: 10px;
  background-color: rgba(235, 235, 235, 0.64);
  color: black;
}

.game {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 90vh;
  width: 100%;
}

button {
  width: 100%;
  height: 40px;
  padding: 5px;
  border-radius: 10px;
  border: rgb(0, 0, 0) solid 1px;
  background-color: rgba(235, 235, 235, 0.64);
  cursor: pointer;
}

button:hover {
    transition-duration: 0.5s;
  background-color: rgba(235, 235, 235, 0.9);
}

</style>