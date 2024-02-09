<script setup>
import { RouterLink, RouterView } from 'vue-router'

</script>

<template>
  <header v-if="!$route.meta.hideHeader">
    <div class="wrapper">
      <nav>
        <RouterLink to="/">Accueil</RouterLink>
        <RouterLink to="/serie">Séries</RouterLink>
        <RouterLink to="/pagetest">Page de test</RouterLink>
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
}

nav{
  margin-top: 10px;
}
</style>
