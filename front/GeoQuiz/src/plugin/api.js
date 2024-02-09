import axios from 'axios';

export default {
    install: (app, options) => {
        app.config.globalProperties.$apidirectus = axios.create({
            baseURL: 'http://docketu.iutnc.univ-lorraine.fr:37208',
            headers: {
                "Content-Type": "application/json"
            }
        });

        app.config.globalProperties.$apigeolo = axios.create({
            baseURL: 'http://docketu.iutnc.univ-lorraine.fr:37202',
            headers: {
                "Content-Type": "application/json"
            }
        });

        app.config.globalProperties.$apiauth = axios.create({
            baseURL: 'http://docketu.iutnc.univ-lorraine.fr:37201',
            headers: {
                "Content-Type": "application/json"
            }
        });
    }
};
