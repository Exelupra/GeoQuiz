<template>
  <div class="container">
    <h1>Connexion</h1>
    <div>
      <form>
        <div>
          <label for="mail">Email</label>
          <input type="text" v-model="mail" id="mail" name="mail" required>
        </div>
        <div>
          <label for="password">Mot de passe</label>
          <input type="password" v-model="password" id="password" name="password" required>
        </div>
        <div>
          <button type="submit">Submit</button>
        </div>
      </form>
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
    submit() {
      console.log('submit')
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