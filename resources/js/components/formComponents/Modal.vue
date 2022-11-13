<div>
<b-modal ref="agendaModal" hide-footer title="Using Component Methods">
    <div class="d-block text-left">
      <div class="row">
                      <div class="col-12">
                          <div class="form-group">
                              <label for="title" class="text-left" style="text-align: left;">Titulo</label>
                              <input type="text" class='form-control' id="title" v-model="title">
                          </div>
                      </div>

                      <div class="col-12">
                          <div class="form-group">
                              <label for="">Data</label>
                              <input type="date" class='form-control' id="data_inicio" v-model="this.data_agendamento" >
                          </div>
                      </div>

                  </div>
    </div>
    <div class="row">
      <div class="d-flex">
          <b-button class="mt-2 m-2" variant="outline-danger" block @click="hideModal">Fechar</b-button>
          <b-button class="mt-2 m-2" variant="outline-warning" block @click="storeUser">Salvar</b-button>
      </div>

   </div>
  </b-modal>
</div>
