@extends('adminlte::page')

@section('title','Alunos')

@section('content_header')
    <h1>
       Component treino
       <a href="{{route('alunos.create')}}" class="btn btn-sm btn-success">Cadastrar Aluno</a>
    </h1>

@endsection

@section('content')



    <x-table-teste  />

@endsection
