@extends('adminlte::page')

@section('title','Nova Pagina')

@section('content_header')
    <h1>
        Novo Aluno
    
    </h1>
    <br>
@endsection

@section('content')

<div class="card">
   
       
    <div class="card-body">
<form class="form-horizontal" method="POST" action="{{route('alunos.store')}}"  enctype="multipart/form-data">
    @csrf
   
    <div class="form-group row">       
        <label for="nome" class="col-sm-2 col-form-label">Nome</label>
            <div class="col-sm-10">
                <input type="text"  name="nome" class="form-control @error('nome') is-invalid @enderror id="nome"  value="{{$aluno->nome ?? false}}">
            </div>
</div>

<div class="form-group row">       
    <label for="Whatssap" class="col-sm-2 col-form-label">Whatssap</label>
        <div class="col-sm-10">
            <input type="text"  name="whatssap" class="form-control @error('whatssap') is-invalid @enderror id="whatssap"  value="{{$aluno->whatssap ?? false}}">
        </div> 
 </div>

 <div class="form-group row">       
    <label for="instagran" class="col-sm-2 col-form-label">instagran</label>
        <div class="col-sm-10">
            <input type="text"  name="instagran" class="form-control @error('instagran') is-invalid @enderror id="instagran"  value="{{$aluno->instagran ?? false}}">
        </div>
 </div>
 
 <div class="form-group row">       
    <label for="instagran" class="col-sm-2 col-form-label">Imagem</label>
        <div class="col-sm-10">
            <input type="file"  name="image" class="form-control @error('image') is-invalid @enderror id="image">
        </div>
 </div>  

    <div class="form-group row">  
        <label class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>
    </div>
    <!-- /.box-footer -->
  </form>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"  crossorigin="anonymous"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script>
      $('#type').change(function(){     
        if($('#type').val() == '1' ){
         
       
        }
      });
  </script>

@endsection