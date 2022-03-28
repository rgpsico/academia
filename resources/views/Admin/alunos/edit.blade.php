@extends('adminlte::page')

@section('title','Editar Paginas')

@section('content_header')
    <h1>
        Editar Pagamento
    
    </h1>
@endsection

@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <h5><i class="icon fas fa-ban"></i>Ocorreu um error</h5>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{@$error}}</li>
        @endforeach
    </ul>
  </div>
@endif
<div class="card">
  
    <div class="card-body">        
<form class="form-horizontal" action="{{ route('alunos.update', $aluno->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")
        <div class="form-group row">       
                <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text"  name="nome" class="form-control @error('nome') is-invalid @enderror id="nome"  value="{{$aluno->nome}}">
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
    <!-- /.box-footer -->
  </form>
</div>
</div>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    tinymce.init({
        selector:'textarea.bodyfield',
        height:300,
        menubar:false,
        plugins:['link', 'table', 'image', 'autoresize', 'lists'],
        toolbar:'undor redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | table | link image | bullist numlist',
        content_css:[
            '{{asset('assets/css/content.css')}}'
        ],
        images_upload_url:'{{route('imageupload')}}',
        images_upload_credentials:true,
        convert_urls:false
    });
    </script>
@endsection