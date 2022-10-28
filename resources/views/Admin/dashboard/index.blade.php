@extends('adminlte::page')

@section('title', 'Nova Pagina')

@section('content_header')

    <br>
@endsection

@section('content')

 <div id="app">
    <Dashboard>
    </Dashboard>
 </div>


 <script src="{{ mix('js/app.js') }}"></script>
@endsection
