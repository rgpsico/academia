<template>
  <div>
    
   <InfoBoxComponent/>
 
    <!---ultimos alunos-->
    <div class="row">
 
    <UltimosAlunosComponent/>
    </div>
  </div>
</template>


<script>


import UltimosAlunosComponent from "./dashboard/UltimosAlunosComponent.vue";
import InfoBoxComponent from "./dashboard/InfoBoxComponent.vue";
const default_layout = "default";

export default {
  name:'Dashboard',
  components:{ 
    UltimosAlunosComponent,
    InfoBoxComponent
},
  computed: {},
 
};
</script>