<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Enviar pagamento</h5>
          <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{route('alunopagamento.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" id="user_id" name="user_id" value="777">
            <input type="text" id="aluno_id" name="aluno_id">
            <p>Enviar foto do seu comprovante </p>
            <p><input type="file" name="image" id="image"></p>

            <label for="data_inicio">Mês referência</label>
            <input type="date" class="form-control" id="data_inicio" name="data_inicio">


            <label for="data_fim">Mês referência</label>
            <input type="date" class="form-control" id="data_fim" name="data_fim">
            </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Enviar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
      </div>
    </div>
  </div>
