@extends('adminlte::page')

@section('title', 'Nova Pagina')

@section('content_header')
    <h1>
        Novo Aluno aaa

    </h1>
    <br>
@endsection

@section('content')

    <div class="card">
        @include('Admin.includes.alert')
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ route('alunos.store') }}" enctype="multipart/form-data">
                @csrf
                @include('Admin.alunos._partials.form')
              
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


@endsection
