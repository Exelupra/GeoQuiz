<script setup>
import { RouterLink, RouterView } from 'vue-router'
import WelcomeItem from "@/components/WelcomeItem.vue";
</script>

<template>
  <header>
    <div class="wrapper">
      <nav>
        <RouterLink to="/">Accueil</RouterLink>
        <RouterLink to="/connection">Se connecter</RouterLink>
        <RouterLink to="/inscription">S'inscrire</RouterLink>
      </nav>
    </div>
  </header>

  <RouterView />
</template>

<style scoped>

</style>
