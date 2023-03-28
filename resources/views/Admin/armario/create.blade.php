@extends('adminlte::page')

@section('title','Novo Usuário')

@section('content_header')
    <h1>
        Novo Professor

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
<form class="form-horizontal" method="POST" action="{{route('series.store')}}">
    @csrf

            <div class="form-group row">
                <label for="nome" class="col-sm-2 col-form-label">Titulo</label>
                    <div class="col-sm-10">
                        <input type="text"  name="nome" class="form-control @error('nome') is-invalid @enderror id="name"  value="{{old('name')}}">
                    </div>
            </div>

            <div class="form-group row">
                <label for="nome" class="col-sm-2 col-form-label">Descricão</label>
                    <div class="col-sm-10">
                        <input type="text"  name="descricao" class="form-control @error('descricao') is-invalid @enderror " id="descricao"  value="{{old('descricao')}}">
                    </div>
            </div>

            <div class="form-group row">
                <label for="nome" class="col-sm-2 col-form-label">Imagem</label>
                    <div class="col-sm-10">
                        <input type="text"  name="imagem" class="form-control  @error('imagem') is-invalid @enderror " id="imagem" value="{{old('imagem')}}">
                    </div>
            </div>

            <div class="form-group row">
                    <label for="nome" class="col-sm-2 col-form-label">video</label>
                        <div class="col-sm-10">
                            <input type="text"  name="video" class="form-control @error('video') is-invalid @enderror" id="video" >
                    </div>
            </div>


    <div class="form-group row">
      <button type="submit" class="btn btn-success">Cadastrar</button>
    </div>
    <!-- /.box-footer -->
  </form>
</div>
</div>
@endsection
