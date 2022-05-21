<template>
  <div>
    
   <InfoBoxComponent/>
 
    <!---ultimos alunos-->
    <div class="row">
    <MensagemVue/>
    <UltimosAlunosComponent/>
    </div>
  </div>
</template>


<script>

import MensagemVue from "./dashboard/MensagemComponent.vue";
import UltimosAlunosComponent from "./dashboard/UltimosAlunosComponent.vue";
import InfoBoxComponent from "./dashboard/InfoBoxComponent.vue";
const default_layout = "default";

export default {
  name:'Dashboard',
  components:{
    MensagemVue,
    UltimosAlunosComponent,
    InfoBoxComponent
},
  computed: {},
 
};
</script>