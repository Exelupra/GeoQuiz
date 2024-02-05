import { createRouter, createWebHistory } from 'vue-router'
import WelcomeItem from "@/components/WelcomeItem.vue";
import Connection from "@/views/Connection.vue";
import Inscription from "@/views/Inscription.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: WelcomeItem
    },
    {
      path: '/connection',
      name: 'connection',
      component: Connection
    },
    {
      path: '/inscription',
      name: 'inscription',
      component: Inscription
    }
  ]
})

export default router
