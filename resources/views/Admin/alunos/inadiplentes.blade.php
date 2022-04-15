@extends('adminlte::page')

@section('title','Alunos')

@section('content_header')
    <h1>
       Alunos
       <a href="{{route('alunos.create')}}" class="btn btn-sm btn-success">Cadastrar Aluno</a>
    </h1>
    
@endsection

@section('content')

<form action="{{route('alunos.search')}}">
<div class="input-group mb-3 col-9">

        <input type="text" class="form-control" name="nome" placeholder="Nome do Aluno" aria-label="Nome do Aluno" aria-describedby="basic-addon2">
            <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Buscar Aluno</button>
            </div>
 
  </div>
</form>
  <br>
  <br>

@include('Admin.includes.alert')

<div id="app">
    <Devedores>       
        
    </Devedores>
</div>





<script src="{{mix('js/app.js')}}"></script>


@endsection

