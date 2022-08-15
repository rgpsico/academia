<template>
<div class="row">
    <div class="col-4">
        <h1 class="color:#fff;">Dash Board (BETA)</h1>
    </div>
    <div class="col-3">

    </div>
    <div class="col-2">
        <div class="form-group">
            <label for="inicio">Data Inicio</label>
            <input v-model="data_start" type="date" class="form-control">
        </div>
    </div>
    <div class="col-2">
        <div class="form-group">
            <label for="inicio">Data Fim</label>
            <input v-model="data_end" type="date" class="form-control">
        </div>
    </div>
    <div class="col-1">
        <div class="form-group pb-2">
            <button class='btn btn-info my-4' @click="filter()" style="margin-top:10px;">Buscar</button>
        </div>   
    </div>
   
</div>
</template>

<script>
const default_layout = "FilterDatas";
import axios from "axios";
export default {
  name:'FilterDatas',
 
  components:{
   
},
  computed: {
    
  },  
  data() {
    return {
      message: "hello word",
      data_start:'',
       data_end:'',
       numero_total_alunos:'',
       numero_total_alunos_ativos:'',
       numero_total_alunos_inativos:''
    };
  },
  methods:{
    filter() {   
       this.byData()
  
  },byData() {
         axios.get(this.$url_api+"alunos/byDate/"+this.data_start+"/"+this.data_end).then((response) => {  
            console.log(response.data.data)   
           this.numero_total_alunos = response.data.data.length;

      });
    },
  }
 
};
</script>