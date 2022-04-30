

import Vue from 'vue'

import formsearch from './components/FormSearch.vue'
import Emdia from './components/Emdia.vue'
import Devedores from './components/Devedores.vue'


Vue.prototype.$url_api = 'http://127.0.0.1:8000/api/'
Vue.prototype.$url_base = 'http://127.0.0.1:8000/painel/'
Vue.prototype.$url_image = 'http://127.0.0.1:8000/painel/storage/'


const app = new Vue({
    el: '#app',
    components:{ Emdia,Devedores, formsearch}
});
