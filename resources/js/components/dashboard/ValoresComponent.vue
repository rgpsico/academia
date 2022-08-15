<template>  
        <div class="row">
        <div class="col-sm-4 col-6 bg-light">
            <div class="description-block border-right">
                <span class="description-percentage text-success">
                <i class="fas fa-caret-up"></i>Alunos Ativos: {{ this.totalAlunos }}</span>
                <h5 class="description-header"></h5>
                <span class="description-text">Receita: R$ {{ this.totalMensalidade }}</span>
            </div>
          </div>

        </div>
</template>

 <script>
import axios from "axios";
const default_layout = "default";

export default {
  name: "ValoresComponent",
  computed: {},
  data() {
    return {    
      totalAlunos: '',
      totalMensalidade: ''
     
    };
  },
  methods: {
    convertDate(data) {
      return data.split(" ")[0];
    },
   totalAlunosAtivos() {
      axios.get(this.$url_api + "alunos").then((response) => {
        let Emdia = response.data.data.filter(
          (item) => item.statusPG == "Em dia"
        );
        this.totalAlunos = Emdia.length  ;
        this.totalMensalidade = Emdia.length * this.$valor_mensalidade ;
      });
    },
  },
  mounted: function () {
   this.totalAlunosAtivos() 
  },
};
</script>