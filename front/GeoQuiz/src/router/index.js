import {createRouter, createWebHistory} from 'vue-router'
import Accueil from "@/views/Accueil.vue";
import Connection from "@/views/Connection.vue";
import Inscription from "@/views/Inscription.vue";
import Series from "@/views/Series.vue";
import Pagetest from "@/views/pagetest.vue";
import Historique from "@/views/Historique.vue";
import Jeu2 from "@/views/Jeu2.vue";

const router = createRouter({
    history: createWebHistory(),
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
            component: Connection,
            meta: { hideHeader: true },
        },
        {
            path: '/inscription',
            name: 'inscription',
            component: Inscription,
            meta: { hideHeader: true },
        },
        {
            path: '/serie',
            name: 'serie',
            component: Series
        },
        {
            path: '/game/:id',
            name: 'game',
            component: Jeu2
        },
        {
            path: '/pagetest',
            name: 'pagetest',
            component: Pagetest
        },{
            path: '/historique',
            name: 'historique',
            component: Historique
        }
    ]
})

export default router
