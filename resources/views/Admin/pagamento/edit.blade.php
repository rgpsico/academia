@extends('adminlte::page')

@section('title','Editar Paginas')

@section('content_header')
    <h1>
        Editar Paginas
    
    </h1>
@endsection

@section('content')
@include('Admin.includes.alert')

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
<form class="form-horizontal" action="{{route('pagamento.update', ['pagamento'=>$pagamento->id])}}" method="POST" >
    @csrf
    @method("PUT")
        <div class="form-group row">       
                <label for="nome" class="col-sm-2 col-form-label">Admin que Recebeu:</label>
                    <div class="col-sm-10">
                        <input type="text"  name="user_id" class="form-control @error('user_id') is-invalid @enderror id="user_id"  value="{{$pagamento->user_id}}">
                    </div>
            </div>


            <div class="form-group row">       
                <label for="nome" class="col-sm-2 col-form-label">Aluno que fez o pagamento:</label>
                    <div class="col-sm-10">
                        <input type="text"  name="aluno_id" class="form-control @error('aluno_id') is-invalid @enderror id="aluno_id"  value="{{$pagamento->aluno_id}}">
                    </div>
            </div>


            <div class="form-group row">       
                <label for="nome" class="col-sm-2 col-form-label">Data do Pagamento:</label>
                    <div class="col-sm-10">
                        <input type="date"  name="data_pagamento" class="form-control @error('data_pagamento') is-invalid @enderror id="data_pagamento"  value="{{$pagamento->data_pagamento}}">
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