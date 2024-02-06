<template>
  <div class="game">
    <div class="game_info">
      <h3>Score: </h3>
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

export default {
  data() {
    return {
      score: 0,
      time: 0,
      map: null,
      marker: null
    }
  },
  mounted() {
    // Créer une instance de la carte et l'attribuer à votre div avec l'ID "map"
    this.map = L.map('map').setView([40, -5], 3);

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

</style>