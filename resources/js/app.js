

import Vue from 'vue'

import formsearch from './components/FormSearch.vue'
import Emdia from './components/Emdia.vue'
import Devedores from './components/Devedores.vue'
import config from './config/config.js'

const variables = {    
    API_URL:"https://sistem.academiaextremeapocalipse.com.br/api/",
    PHOTO_URL:"https://www.iconspng.com/images/"
}

const app = new Vue({
    el: '#app',
    components:{ Emdia,Devedores, formsearch, config}
});
