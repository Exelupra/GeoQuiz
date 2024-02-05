<template>
  <div class="container">
    <h1>Connection</h1>
    <div>
      <form>
        <div>
          <label for="mail">Email</label>
          <input type="text" id="mail" name="mail">
        </div>
        <div>
          <label for="password">Mot de passe</label>
          <input type="password" id="password" name="password">
        </div>
        <div>
          <button type="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>

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
</style>