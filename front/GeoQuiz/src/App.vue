<script>
import { RouterLink, RouterView } from 'vue-router'

export default {
  methods:{
    logout() {
      sessionStorage.clear();
      this.$router.push('/');
    },
    continueGame() {
      this.$apiauth.get('/user/'+sessionStorage.getItem("user")+'/saved').then((response) => {
        if(response.data == null){
          alert('Aucune partie en cours');
        }
        else{
          this.$router.push({name: 'game', params: {id: response.data}});
        }
      }).catch((error) => {
        console.log(error);
      });
      this.testRefresh();
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

<template>
  <header v-if="!$route.meta.hideHeader">
    <div class="wrapper">
      <nav>
        <RouterLink to="/">Accueil</RouterLink>
        <RouterLink to="/serie">Séries</RouterLink>
        <RouterLink to="/historique">Historique</RouterLink>
        <a @click="continueGame()">Continuer</a>
        <a @click="logout()">Deconnexion</a>
      </nav>
    </div>
  </header>

  <RouterView />
</template>

<style>

a{
  margin: 10px 5px;
  text-decoration: none;
  color: rgba(235, 235, 235, 0.64);
  border: rgba(235, 235, 235, 0.64) solid 1px;
  border-radius: 10px;
  padding: 5px;
  cursor: pointer;
}

nav{
  margin-top: 10px;
}
</style>
