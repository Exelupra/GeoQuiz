import './assets/base.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'
import api from "@/plugin/api.js";


const app = createApp(App)


app.use(api)
app.use(createPinia())
app.use(router)

app.mount('#app')
