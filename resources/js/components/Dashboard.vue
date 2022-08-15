<template>
  <div>
         <FilterDatas/> 
         <InfoBoxComponent/> 
         <ValoresComponent/>     
         <UltimosAlunosComponent/>       
   

        
  </div>
</template>


<script>


import UltimosAlunosComponent from "./dashboard/UltimosAlunosComponent.vue";
import InfoBoxComponent from "./dashboard/InfoBoxComponent.vue";
import ValoresComponent from "./dashboard/ValoresComponent.vue";
import selectMeses from "./formComponents/selectMeses.vue";
import FilterDatas from "./formComponents/FilterDatas.vue";
const default_layout = "default";

export default {
  name:'Dashboard',
  components:{
    UltimosAlunosComponent,
    InfoBoxComponent,
    ValoresComponent,
    selectMeses,
    FilterDatas
},
  computed: {},
 
};
</script>