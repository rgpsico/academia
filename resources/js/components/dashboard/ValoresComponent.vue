<template>   
        <div class="col-sm-3 col-6 bg-light">
            <div class="description-block border-right">
                <span class="description-percentage text-success">
                <i class="fas fa-caret-up"></i> 17%</span>
                <h5 class="description-header">$35,210.43</h5>
                <span class="description-text">TOTAL de Ativos</span>
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
      totalAlunos: this.ultimosAlunos(),
      numeroTotal: this.numeroTotal,
    };
  },
  methods: {
    convertDate(data) {
      return data.split(" ")[0];
    },
    ultimosAlunos() {
      axios.get(this.$url_api + "alunos/laststudents").then((response) => {
        this.totalAlunos = response.data;  
        this.numeroTotal = response.data.length  
      });
    },

    limitarNumerosAlunos(de, ate, obj) {
      return obj.slice(de, ate);
    },
  },

  mounted: function () {
    this.ultimosAlunos();
  },
};
</script>