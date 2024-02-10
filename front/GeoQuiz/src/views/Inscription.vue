<template>
  <div class="container">
    <h1>Inscription</h1>
    <div>
        <div>
          <input v-model="mail" type="email" placeholder="Email" required>
        </div>
        <div>
          <input v-model="password" type="password" placeholder="Mot de passe" required>
        </div>
        <div>
          <input v-model="passwordConfirm" type="password" placeholder="Confirmer mot de passe">
        </div>
        <div>
          <button @click="valide">S'inscrire</button>
        </div>
    </div>
  </div>
</template>

<script>
import router from "@/router/index.js";

export default {
  data() {
    return {
      mail: '',
      password: '',
      passwordConfirm: ''
    }
  },
  methods: {
    valide() {
      let autre="";
      let reste="";
      let check = true;
      if (this.password.length < 5) {
        check = false;
      }
      if (this.password !== this.passwordConfirm) {
        check = false;
      }
      if (check) {
        this.$apiauth.post('/user', {
          Email: this.mail,
          MDP: this.password
        }).then((response) => {
          sessionStorage.clear();
          sessionStorage.setItem('user', response.data.Id);
          this.$apiauth.get('/user/' + sessionStorage.getItem('user')+'/startrefresh').then((response) => {
            autre=response.data;
            sessionStorage.setItem('refreshToken', response.data);
            this.$apiauth.get('/user/' + sessionStorage.getItem('user')+'/startaccess').then((response) => {
              sessionStorage.setItem('accessToken', response.data);
              router.push('/');
            }).catch((error) => {
              console.log(error);
            });
          }).catch((error) => {
            console.log(error);
          });

        }).catch((error) => {
          console.log(error);
        });
      }
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

form {
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
