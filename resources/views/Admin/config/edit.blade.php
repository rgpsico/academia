@extends('adminlte::page')

@section('title','Configurações do sistema')

@section('content_header')
    <h1>
        Configurações
    
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
<form class="form-horizontal" action="{{ route('config.update', $config->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")
        <div class="form-group row">       
                <label for="nome" class="col-sm-2 col-form-label">Mensagem Whatssap</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="id" value="1">
                      <textarea name="mensagem" id="mensagem" cols="30" rows="10" class="form-control">
                            {{$config->mensagem}} 

                      </textarea>
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


@endsection