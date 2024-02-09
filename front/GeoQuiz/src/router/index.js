import {createRouter, createWebHistory} from 'vue-router'
import Accueil from "@/views/Accueil.vue";
import Connection from "@/views/Connection.vue";
import Inscription from "@/views/Inscription.vue";
import Jeu from "@/views/Jeu.vue";
import Series from "@/views/Series.vue";
import Pagetest from "@/views/pagetest.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'home',
            component: Accueil,
            meta: {hideHeader: true}
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
        },
        {
            path: '/serie',
            name: 'serie',
            component: Series
        },
        {
            path: '/game/:id',
            name: 'game',
            component: Jeu
        },
        {
            path: '/pagetest',
            name: 'pagetest',
            component: Pagetest
        }
    ]
})

export default router
