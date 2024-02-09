<template>
  <div class="game">
    <div id="results">
        <div></div>
    </div>
    <div class="game_info">
      <h3>Score: {{ score }}</h3>
      <h3>Etapes: {{ currentStep }}/10</h3>
      <h3>Temps restant: 00</h3>
    </div>
    <div class="game_map">
      <div id="img"></div>
      <div id="map">{{ map }}</div>
    </div>
    <button type="submit" @click="calcScore">Valider</button>
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
      partie: null,
      serie: null,
      currentStep: 1,
      currentImageID: null,
      currentImageCoordonates: [],
    }
  },
  methods: {
    init(){
      this.$apigeolo.get('/creePartie/'+this.$route.params.id)
        .then((response) => {
          this.partie = response.data;
          this.currentStep = response.data.Etape;
          this.score = response.data.ScoreActuel;
        });

        setTimeout(() => {
          this.$apidirectus.get('/serie/'+this.partie.idSerie)
          .then((res) => {
            this.serie = res.data;
          });
        }, 1000);

      setTimeout(() =>{
        let long = this.serie.geoSerie.coordinates[0];
        let lat = this.serie.geoSerie.coordinates[1];

        // Créer une instance de la carte et l'attribuer à votre div avec l'ID "map"
        this.map = L.map('map').setView([lat,long], 12);

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
      }, 1500);

      this.getImage();
      this.getPicture();
    },
    getImage(){
      setTimeout(() => {
        this.$apidirectus.get('/image/'+this.serie.images[this.currentStep-1])
        .then((res) => {
          this.currentImageID = res.data.Image;
          this.currentImageCoordonates = res.data.geo.coordinates;
        });
      }, 1500);
    },
    getPicture(){
      setTimeout(() => {
        this.$apidirectus.get('/picture/'+this.currentImageID)
        .then((res) => {
          document.getElementById('img').innerHTML = `<img src="${res.data}" width="100%">`;
        });
      }, 2000);
    },
    calcScore(){
      const lat1 = this.currentImageCoordonates[1];
      const lon1 = this.currentImageCoordonates[0];

      const lat2 = this.marker.getLatLng().lat;
      const lon2 = this.marker.getLatLng().lng;

      console.log(lat1, lon1);
      console.log(lat2, lon2);

      const R = 6371; // Rayon de la Terre en kilomètres
      const dLat = (lat2 - lat1) * Math.PI / 180;  // Conversion en radians
      const dLon = (lon2 - lon1) * Math.PI / 180;
      const a =
        Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
        Math.sin(dLon / 2) * Math.sin(dLon / 2);
      const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
      const distance = R * c; // Distance en kilomètres

      if(distance < 1){
        this.score += 5;
      } else if(distance < 2){
        this.score += 3;
      } else if(distance < 4){
        this.score += 1;
      }

      if(this.time < 5){
        this.score *= 4;
      } else if(this.time < 10){
        this.score *= 2;
      } else if(this.time>20){
        this.score *= 0;
      }

      this.$apigeolo.patch('/creePartie/1', {
        score: this.score,
      }).then((res) => {
        /*if(){
          this.init();
          this.getImage();
          this.getPicture();
        } else {
          this.$router.push('/historique');
        }*/
        console.log(res.data);
      });
    }
  },
  mounted() {
        this.init();
        this.getImage();
        this.getPicture();
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
  width: 50%;
  height: 100%;
  border: 1px solid red;
}

#map {
  border: 1px solid red;
  width: 50%;
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
  align-items: center;
  height: 53vh;
  width: 100%;
  padding-top: 5%;
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