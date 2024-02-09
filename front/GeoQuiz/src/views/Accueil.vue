<template>

    <div class="container">
      <h1>
        Bienvenue sur GeoQuiz
      </h1>
      <div class="btn" v-if="!isConnected">
        <RouterLink to="/connection">Se connecter</RouterLink>
        <RouterLink to="/inscription">S'inscrire</RouterLink>
      </div>
      <div class="btn" v-else>
        <RouterLink to="/serie">Jouer</RouterLink>
        <router-link to="/historique">Historique</router-link>
      </div>
      <button @click="goToPlay">Jouer</button>
    </div>
</template>

<script>
  export default{
    computed: {
      isConnected(){
        return localStorage.getItem('user') != null;
      }
    },
    methods: {
      goToPlay(){
        this.$apigeolo.post('/creePartie/1')
          .then((response) => {
            console.log(response.data);
            this.$router.push('/game/'+response.data.idPartie);
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
  height: 80vh;
}
</style>
