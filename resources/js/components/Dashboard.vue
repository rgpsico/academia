<template>
  <div>
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"
            ><i class="fas fa-cog"></i
          ></span>
          <div class="info-box-content">
            <span class="info-box-text">Numero total de alunos</span>
            <span class="info-box-number numero-alunos">
              {{ this.totalAlunos }}
            </span>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"
            ><i class="fas fa-thumbs-up"></i
          ></span>
          <div class="info-box-content">
            <span class="info-box-text">Numero de alunos ativos</span>
            <span class="info-box-number"> {{ this.AlunosEmDia }}</span>
          </div>
        </div>
      </div>

      <div class="clearfix hidden-md-up"></div>
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"
            ><i class="fas fa-shopping-cart"></i
          ></span>
          <div class="info-box-content">
            <span class="info-box-text">Alunos inativos</span>
            <span class="info-box-number">{{ this.AlunosInativos }}</span>
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
            <span class="info-box-number">{{ this.novosAlunos }}</span>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="card direct-chat direct-chat-warning">
          <div class="card-header">
            <h3 class="card-title">Mensagem</h3>
            <div class="card-tools">
              <span title="3 New Messages" class="badge badge-warning">3</span>
              <button
                type="button"
                class="btn btn-tool"
                data-card-widget="collapse"
              >
                <i class="fas fa-minus"></i>
              </button>
              <button
                type="button"
                class="btn btn-tool"
                title="Contacts"
                data-widget="chat-pane-toggle"
              >
                <i class="fas fa-comments"></i>
              </button>
              <button
                type="button"
                class="btn btn-tool"
                data-card-widget="remove"
              >
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>

          <div class="card-body">
            <div class="direct-chat-messages">
              <div class="direct-chat-msg right">
                <div class="direct-chat-infos clearfix">
                  <span class="direct-chat-name float-right"
                    >Sarah Bullock</span
                  >
                  <span class="direct-chat-timestamp float-left"
                    >23 Jan 6:10 pm</span
                  >
                </div>

                <img
                  class="direct-chat-img"
                  src="https://adminlte.io/themes/v3/dist/img/user1-128x128.jpg"
                  alt="message user image"
                />

                <div class="direct-chat-text">I would love to.</div>
              </div>
            </div>

            <div class="direct-chat-contacts">
              <ul class="contacts-list">
                <li>
                  <a href="#">
                    <img
                      class="contacts-list-img"
                      src="https://adminlte.io/themes/v3/dist/img/user1-128x128.jpg"
                      alt="User Avatar"
                    />
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Count Dracula
                        <small class="contacts-list-date float-right"
                          >2/28/2015</small
                        >
                      </span>
                      <span class="contacts-list-msg"
                        >How have you been? I was...</span
                      >
                    </div>
                  </a>
                </li>
              
              </ul>
            </div>
          </div>

          <div class="card-footer">
            <form action="#" method="post">
              <div class="input-group">
                <input
                  type="text"
                  name="message"
                  placeholder="Type Message ..."
                  class="form-control"
                />
                <span class="input-group-append">
                  <button type="button" class="btn btn-warning">Send</button>
                </span>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Ultimos Alunos</h3>
            <div class="card-tools">
              <span class="badge badge-danger">8 New Members</span>
              <button
                type="button"
                class="btn btn-tool"
                data-card-widget="collapse"
              >
                <i class="fas fa-minus"></i>
              </button>
              <button
                type="button"
                class="btn btn-tool"
                data-card-widget="remove"
              >
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>

          <div class="card-body p-0">
            <ul class="users-list clearfix">
              <li>
                <img src="https://adminlte.io/themes/v3/dist/img/user1-128x128.jpg" alt="User Image" />
                <a class="users-list-name" href="#">Alexander Pierce</a>
                <span class="users-list-date">Today</span>
              </li>
             
            </ul>
          </div>

          <div class="card-footer text-center">
            <a href="javascript:">View All Users</a>
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
      totalAlunos: this.getAlunosTotal(),
      AlunosEmDia: this.totalAlunosAtivos(),
      AlunosInativos: this.totalAlunosInativos(),
      novosAlunos: this.getNovosAlunos(),
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
      axios.get(this.$url_api + "alunos").then((response) => {
        this.novosAlunos = response.data.data.length;
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