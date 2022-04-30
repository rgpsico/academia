
    @csrf

    <div class="form-group row">       
        <label for="nome" class="col-sm-2 col-form-label">Admin que Recebeu:</label>
            <div class="col-sm-10">
                <input type="text"    name="user_name" class="form-control @error('user_name') is-invalid @enderror" id="name"  value="{{$pagamento->admin->name ?? auth()->user()->name}}">
                <input type="hidden"  name="user_id" class="form-control @error('user_id') is-invalid @enderror" id="user_id"  value="{{$pagamento->admin->id ?? auth()->user()->id}}">
             </div>
    </div>


    <div class="form-group row">       
        <label for="nome" class="col-sm-2 col-form-label">Aluno que fez o pagamento:</label>
            <div class="col-sm-10">
                <input type="text"  name="aluno_name" class="form-control @error('aluno_name') is-invalid @enderror" id="aluno_name"  value="{{$pagamento->alunos->nome ?? $aluno->nome}}">
                <input type="hidden"  name="aluno_id" class="form-control @error('aluno_id') is-invalid @enderror" id="aluno_id"  value="{{$pagamento->alunos->id ?? $aluno->id }}">
            </div>
    </div>


    <div class="form-group row">       
        <label for="nome" class="col-sm-2 col-form-label">Data do Pagamento:</label>
            <div class="col-sm-10">
                <input type="date"   name="data_pagamento" class="form-control @error('data_pagamento') is-invalid @enderror" id="data_pagamento"  value="{{$pagamento->data_pagamento ?? ''}}">
            </div>
    </div>

    <div class="form-group row">       
        <label for="nome" class="col-sm-2 col-form-label">Data do primeiro dia de treino:</label>
            <div class="col-sm-10">
                <input type="date"   name="data_inicio" class="form-control @error('data_inicio') is-invalid @enderror" id="data_inicio"  value="{{$pagamento->data_inicio ?? ''}}">
            </div>
    </div>

    <div class="form-group row d-none">       
        <label for="nome" class="col-sm-2 col-form-label">Data depois dos 30 dias de treino:</label>
            <div class="col-sm-10">
                <input type="hidden" disabled  name="data_fim" class="form-control @error('data_fim') is-invalid @enderror id="data_fim"  value="{{$pagamento->data_fim ?? ''}}">
            </div>
    </div>


    <div class="form-group row">  
        <label class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
            <button  class="btn btn-info  bt-habilitar">Habilitar botão para pagar</button>
            <button type="submit" class="btn btn-success pagar d-none" >Pagar</button>
        </div>
    </div>
    <!-- /.box-footer -->
  </form>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
