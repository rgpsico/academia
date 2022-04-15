@extends('adminlte::page')

@section('title', 'Alunos')

@section('content_header')
    <h1>
        Alunos
        <a href="{{ route('alunos.create') }}" class="btn btn-sm btn-success">Cadastrar Aluno</a>
    </h1>

@endsection

@section('content')

 
    <br>
    <br>

    @include('Admin.includes.alert')

    <div id="app">
        <Emdia>

        </Emdia>
    </div>





    <script src="{{ mix('js/app.js') }}"></script>


@endsection
