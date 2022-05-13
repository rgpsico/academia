@extends('adminlte::page')

@section('title', 'Nova Pagina')

@section('content_header')
    <h1 class="color:#fff;">
        Dash Board

    </h1>
    <br>
@endsection

@section('content')

 <div id="app">
    <Dashboard>
       
    </Dashboard>
 </div>


 <script src="{{ mix('js/app.js') }}"></script>
@endsection
