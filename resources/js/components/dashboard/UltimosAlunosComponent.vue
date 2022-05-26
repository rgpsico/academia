  <template>
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">UltimosAlunos</h3>
        <div class="card-tools">
          <span class="badge badge-danger">{{ numeroTotal }} Alunos novos</span>
          <button
            type="button"
            class="btn btn-tool"
            data-card-widget="collapse"
          >
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>

      <div class="card-body p-0">
        <ul class="users-list clearfix">
          <li v-for="alunos in totalAlunos" :key="alunos.id">
            <img
              :src="$url_image + '' + alunos.avatar"
              :alt="alunos.nome"
              width="128px"
              height="128px"
            />
            <a class="users-list-name" href="#">{{ alunos.nome }}</a>
            <span class="users-list-date"> </span>
          </li>
        </ul>
      </div>

      <div class="card-footer text-center">
        <a href="/painel/alunos">Ver todos os Alunos</a>
      </div>
    </div>
  </div>
</template>
      <script>
import axios from "axios";
const default_layout = "default";

export default {
  name: "UltimosAlunosComponent",
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