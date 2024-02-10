<template>
  <div class="container">
    <h1>Connexion</h1>
    <div class="form">

      <div>
        <label>Email</label>
        <input type="email" v-model="mail" name="mail" required>
      </div>
      <div>
        <label>Mot de passe</label>
        <input type="password" v-model="password" name="password" required>
      </div>
      <button @click="connect()">Submit</button>

    </div>
  </div>
</template>

<script>

export default {
  data() {
    return {
      mail: '',
      password: ''
    }
  },
  methods: {
    connect() {
      if (this.mail === '' || this.password === '') {
        alert('Veuillez remplir tous les champs');
        return;
      }
      this.$apiauth.post('/user/connect', {
        Email: this.mail,
        MDP: this.password
      }).then((response) => {
        if(response.data == false){
          alert('Email ou mot de passe incorrect');
        }
        else{
          sessionStorage.setItem('user', JSON.stringify(response.data.Id));
          sessionStorage.setItem('accessToken', response.data.AccessToken);
          this.$apiauth.get('/user/' + sessionStorage.getItem('user')+'/startrefresh').then((response) => {
            sessionStorage.setItem('refreshToken', response.data);
            this.$router.push({name: 'home'});
          }).catch((error) => {
            console.log(error);
          });
          }
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
  },
  mounted() {
    if(sessionStorage.getItem('user') != null){
      this.testRefresh();
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

.form {
  margin-top: 20px;
  display: flex;
  flex-direction: column;
  align-items: flex-end;
}

input {
  margin-bottom: 10px;
  margin-left: 5px;
}

button {
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