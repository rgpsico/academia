@extends('adminlte::page')

@section('title','Editar Paginas')

@section('content_header')
    <h1>
        Editar Aluno {{$aluno->nome}}
    
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
<form class="form-horizontal" action="{{ route('alunos.update', $aluno->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    @include('Admin.alunos._partials.form')
</div>
</div>
<div class="col-5 text-center">
    <img src="{{Storage::url($aluno->avatar) ?? 'imagem'}}" alt="user-avatar" class="img-circle img-fluid">
</div>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


@endsection