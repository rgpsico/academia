<template>
  <div>
     <div class="row"> 
        <selectMeses colmd='col-md-2' label='Data inicial'/> 
        <selectMeses colmd='col-md-2' label='Data final'/> 
        <selectMeses colmd='col-md-2' label='Ano'/> 
        <InfoBoxComponent/> 
    </div>

    
     
    <div class="row"> 
         <ValoresComponent/>   
     </div>

    <div class="row"> 
        <UltimosAlunosComponent/>       
     </div>

        
  </div>
</template>


<script>


import UltimosAlunosComponent from "./dashboard/UltimosAlunosComponent.vue";
import InfoBoxComponent from "./dashboard/InfoBoxComponent.vue";
import ValoresComponent from "./dashboard/ValoresComponent.vue";
import selectMeses from "./formComponents/selectMeses.vue";
const default_layout = "default";

export default {
  name:'Dashboard',
  components:{
    UltimosAlunosComponent,
    InfoBoxComponent,
    ValoresComponent,
    selectMeses
},
  computed: {},
 
};
</script>