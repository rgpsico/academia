@extends('adminlte::page')

@section('title','Editar Usuario')

@section('content_header')
    <h1>
        Editar Serie
    
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
<form class="form-horizontal" action="{{route('series.update', ['series'=>$series->id])}}" method="POST" >
    @csrf
    @method("PUT")
        
    <div class="form-group row">
        <label for="nome" class="col-sm-2 col-form-label">Titulo</label>
            <div class="col-sm-10">
                <input type="text"  name="titulo" class="form-control @error('titulo') is-invalid @enderror" id="titulo"  value="{{ $series->titulo}}">
            </div>
    </div>

    <div class="form-group row">
        <label for="nome" class="col-sm-2 col-form-label">Descricão</label>
            <div class="col-sm-10">
                <input type="text"  name="descricao" class="form-control @error('descricao') is-invalid @enderror" id="descricao"  value="{{ $series->descricao}}">
            </div>
    </div>

    <div class="form-group row">
        <label for="nome" class="col-sm-2 col-form-label">Video</label>
            <div class="col-sm-10">
                <input type="text"  name="video" class="form-control  @error('video') is-invalid @enderror" id="video" value="{{ $series->video}}">
            </div>
    </div>



    <div class="form-group row">  
      <button type="submit" class="btn btn-success">Salvar</button>
    </div>
    <!-- /.box-footer -->
  </form>
</div>
</div>
@endsection