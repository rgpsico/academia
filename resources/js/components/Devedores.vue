<template>
  <div>
    <div class="row">
      <div
        v-for="item in alunos"
        :key="item.message"
        class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column"
      >
        <div class="card bg-light d-flex flex-fill">
          <div class="card-header text-muted border-bottom-0">
            <b v-if="item.statusPG === 'Em dia'" class="btn btn-success" >{{item.statusPG}}</b>
            <b v-else class="btn btn-danger">Devendo</b>
          </div>

          <div class="card-body pt-0">
            <div class="row">
              <div class="col-7">
                <h2 class="lead">
                  <b>{{ item.nome }}</b>
                </h2>
                <p class="text-muted text-sm"><b></b></p>
                <ul class="ml-4 mb-0 fa-ul text-muted">
                  <li class="small">
                    <span class="fa-li">
                      <i class="fas fa-lg fa-phone"></i>
                    </span>
                    <a
                      :href="'https://wa.me/55' + item.whatssap + '?text=Ola'"
                      target="_blank"
                      class="btn btn-sm"
                    >{{ item.whatssap }} </a>
                  </li>
                </ul>
              </div>

              <div class="col-5 text-center">
                <img
                  :src="$url_image + item.avatar"
                  alt="user-avatar"
                  class="img-circle img-fluid"
                />
              </div>
            </div>
          </div>

          <div class="card-footer">
            <div class="text-right">
              <a
                :href="'https://wa.me/55' + item.whatssap + '?text=Ola'"
                target="_blank"
                class="btn btn-sm bg-teal"
              >
                <i class="fas fa-comments"> Enviar Mensagem </i>
              </a>
              <a :href="'alunos/' + item.id" class="btn btn-sm btn-primary">
                <i class="fas fa-user"></i> Ver Perfil
              </a>
              <a
                :href="'alunos/' + item.id + '/edit'"
                class="btn btn-sm btn-dark"
              >
                <i class="fas fa-edit"></i> Editar Aluno
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import axios from "axios";
const default_layout = "default";

export default {
  computed: {},
  data() {
    return {
      message: "hello word",
      alunos: this.refreshData(),
    };
  },
  methods: {
    convertDate(data) {
      return data.split(" ")[0];
    },
    refreshData() {
      axios.get(this.$url_api+"alunos").then((response) => {        
         let Emdia =  response.data.data.filter(item => item.statusPG !== 'Em dia')
       this.alunos = Emdia
     

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
  mounted: function () {

  },
};
</script>