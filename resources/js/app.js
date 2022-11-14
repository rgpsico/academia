

import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import VueSweetalert2 from "vue-sweetalert2"; //importa a lib

import "sweetalert2/dist/sweetalert2.min.css"; 


Vue.use(VueSweetalert2);
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);


import Emdia from './components/Emdia.vue'
import Devedores from './components/Devedores.vue'
import formsearch from './components/FormSearch.vue'
import Dashboard from './components/Dashboard.vue'
import FilterDatas from './components/formComponents/FilterDatas.vue'
import Agenda from './components/Agenda.vue'
import store from './store/store.js'



Vue.prototype.$url_api = 'https://sistem.academiaextremeapocalipse.com.br/api/'
Vue.prototype.$url_base = 'https://sistem.academiaextremeapocalipse.com.br/painel/'
Vue.prototype.$url_image = 'https://sistem.academiaextremeapocalipse.com.br/storage/'
Vue.prototype.$valor_mensalidade =  70

const app = new Vue({
    el: '#app',
    store,
    components:{Emdia, Devedores, formsearch, Dashboard, FilterDatas, Agenda, Agenda, store}
});
