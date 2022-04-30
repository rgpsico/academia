

import Vue from 'vue'

import formsearch from './components/FormSearch.vue'
import Emdia from './components/Emdia.vue'
import Devedores from './components/Devedores.vue'


Vue.prototype.$url_api = 'https://sistem.academiaextremeapocalipse.com.br/api/'
Vue.prototype.$url_base = 'https://sistem.academiaextremeapocalipse.com.br/painel/'
Vue.prototype.$url_image = 'https://sistem.academiaextremeapocalipse.com.br/storage/'


const app = new Vue({
    el: '#app',
    components:{ Emdia,Devedores, formsearch}
});
