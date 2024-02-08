import axios from 'axios'

export default {
    install: (app, options) => {
        app.config.globalProperties.$apidirectus = axios.create({
            baseURL: 'http://docketu.iutnc.univ-lorraine.fr:37206',
            headers: {
                "Access-Control-Allow-Origin": "*",
                "Content-type": "application/json"
            }
        });
        app.config.globalProperties.$apigeolo = axios.create({
            baseURL: 'http://docketu.iutnc.univ-lorraine.fr:37202',
            headers: {
                "Access-Control-Allow-Origin": "*",
                "Content-type": "application/json"
            }
        });
        app.config.globalProperties.$apiauth = axios.create({
            baseURL: 'http://docketu.iutnc.univ-lorraine.fr:37201',
            headers: {
                "Access-Control-Allow-Origin": "*",
                "Content-type": "application/json"
            }
        });
    }
}