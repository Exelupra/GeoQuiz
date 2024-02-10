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
    </div>
</template>

<script>
  export default{
    computed: {
      isConnected(){
        return sessionStorage.getItem('user') != null;
      }
    },mounted() {
      if(sessionStorage.getItem('user') != null){
      this.testRefresh();
      }
    },
    methods:{
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
  height: 80vh;
}
</style>
