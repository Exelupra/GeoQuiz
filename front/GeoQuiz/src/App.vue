<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <header>
    <div class="wrapper">
      <nav>
        <RouterLink to="/">Accueil</RouterLink>
        <RouterLink to="/connection">Se connecter</RouterLink>
        <RouterLink to="/inscription">S'inscrire</RouterLink>
        <RouterLink to="/game">Page de jeu</RouterLink>
      </nav>
    </div>
  </header>

  <RouterView />
</template>

<style scoped>

a{
  margin: 0 5px;
  text-decoration: none;
  color: rgba(235, 235, 235, 0.64);
  border: rgba(235, 235, 235, 0.64) solid 1px;
  border-radius: 10px;
  padding: 5px;
}

nav{
  margin-top: 10px;
}
</style>
