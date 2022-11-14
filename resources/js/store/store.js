import Vue from 'vue'
import Vuex from 'vuex'
//parei no 20:59
Vue.use(Vuex)

const store = new Vuex.Store({
    state:{
        events:'/api/agenda'
    },
    getters:{
        EVENTS: state => state.events
    },
    mutations:{
        ADD_EVENT: (state, event) => {
            state.events.push(event)
        },
        DEL_EVENT: (state, event) => {
            this.$swal("Alerta padrão!!!");
        }

    },
    actions: {}

})

export default store;
