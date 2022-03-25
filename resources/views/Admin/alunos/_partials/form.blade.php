<form class="form-horizontal" action="{{ route('alunos.update', $aluno->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")
        <div class="form-group row">       
                <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text"  name="title" class="form-control @error('nome') is-invalid @enderror id="nome"  value="{{$aluno->nome}}">
                    </div>
        </div>

        <div class="form-group row">       
            <label for="Whatssap" class="col-sm-2 col-form-label">Whatssap</label>
                <div class="col-sm-10">
                    <input type="text"  name="whatssap" class="form-control @error('whatssap') is-invalid @enderror id="whatssap"  value="{{$aluno->whatssap}}">
                </div>
         </div>
   
         <div class="form-group row">       
            <label for="instagran" class="col-sm-2 col-form-label">instagran</label>
                <div class="col-sm-10">
                    <input type="text"  name="instagran" class="form-control @error('instagran') is-invalid @enderror id="instagran"  value="{{$aluno->instagran}}">
                </div>
         </div>     

        
    <div class="form-group row">  
      <button type="submit" class="btn btn-success">Salvar</button>
    </div>
</form>