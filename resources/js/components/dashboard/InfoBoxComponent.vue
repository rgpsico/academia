<template>
    <div>
        <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"
            ><i class="fas fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Numero total de alunos</span>
            <span class="info-box-number numero-alunos">
              {{ this.totalAlunos }}
            </span>
          </div>
        </div>
      </div>


      <div class="clearfix hidden-md-up"></div>
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"
            ><i class="fas fa-users"></i
          ></span>
          <div class="info-box-content">
            <span class="info-box-text">Alunos Ativos</span>
            <span class="info-box-number">{{ this.AlunosEmDia  }}</span>
          </div>
        </div>
      </div>

      
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"
            ><i class="fas fa-users"></i
          ></span>
          <div class="info-box-content">
            <span class="info-box-text">Numero de alunos Inativos</span>
            <span class="info-box-number"> {{ this.AlunosInativos }}</span>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"
            ><i class="fas fa-users"></i
          ></span>
          <div class="info-box-content">
            <span class="info-box-text">Novos Alunos</span>
            <span class="info-box-number">{{ novosAlunos }}</span>
          </div>
        </div>
      </div>
    </div>
    </div>
</template>
<script>
import axios from "axios";
export default {
  name:'Dashboard',
  computed: {},
  data() {
    return {
      message: "hello word",
      totalAlunos: this.getAlunosTotal(),
      AlunosEmDia: this.totalAlunosAtivos(),
      AlunosInativos: this.totalAlunosInativos(),
      novosAlunos: this.getNovosAlunos()
    
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
        this.AlunosEmDia = Emdia.length;
      });
    },

    totalAlunosInativos() {
      axios.get(this.$url_api + "alunos").then((response) => {
        let Inativos = response.data.data.filter(
          (item) => item.statusPG !== "Em dia"
        );
        this.AlunosInativos = Inativos.length;
      });
    },
    getAlunosTotal() {
      axios.get(this.$url_api + "alunos").then((response) => {
        this.totalAlunos = response.data.data.length;
      });
    },
    getNovosAlunos() {
      axios.get(this.$url_api + "alunos/laststudents").then((response) => {   
        this.novosAlunos = response.data.length;       
      });
    },

    imageUpload(event) {
      let formData = new FormData();
      formData.append("file", event.target.files[0]);
      axios.post(variables.API_URL + "/books/Upload", formData).then((res) => {
        this.PhotoFileName = res.data;
      });
    },
  },
  mounted: function () {},
};
</script>