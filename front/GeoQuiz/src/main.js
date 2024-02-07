import './assets/base.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'
import apidirectus from "@/plugin/api.js";
import apigeolo from "@/plugin/api.js";
import apiauth from "@/plugin/api.js";

const app = createApp(App)


app.use(apidirectus, { baseURL: 'http://docketu.iutnc.univ-lorraine.fr:37206'})
app.use(apigeolo, { baseURL: 'http://docketu.iutnc.univ-lorraine.fr:37202'})
app.use(apiauth, { baseURL: 'http://docketu.iutnc.univ-lorraine.fr:37201'})
app.use(createPinia())
app.use(router)

app.mount('#app')
