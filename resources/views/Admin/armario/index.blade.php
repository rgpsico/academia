@extends('adminlte::page')

@section('title', 'Usuarios')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

@section('content_header')
    <h1>
        <a href="{{ route('series.create') }}" class="btn btn-sm btn-success">Criar Armário</a>
    </h1>
@endsection
</div>
</div>
<style>
    .container_teste {
        width: 100%;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 10px;
        min-height: 500px;
        overflow: auto;

    }

    .card {
        width: 120px;
        height: 220px;
    }

    .item1 {
        width: 80px;
        height: 100px;
        background: rgba(46, 2, 2, 0.842);
        display: flex;
        justify-content: center;
        flex-direction: column;
        border: 2px solid #ccc;
        box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        background-image: url({{ asset('assets/img/armario.png') }});
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .fechadura {
        margin: 2px;
        width: 10px;
        height: 25px;
        background: #000;
        display: flex;
        flex-direction: column-reverse;
        align-items: center;
    }

    .redondo {
        height: 5px;
        width: 5px;
        border-radius: 100%;
        background: #fff;
    }

    .meio {
        display: flex;
        justify-content: center;


    }

    .detalhe {
        height: 10px;
        width: 10px;
        background: red;
    }
</style>
@section('content')



    <h1> Armário </h1>
    <div class="container_teste">
        @for ($x = 0; $x < 10; $x++)
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Titutlo</div>
                </div>
                <div class="card-body">
                    <div class="item1">


                    </div>
                </div>
                <div class="card-footer">
                    <span>Footer</span>
                </div>
            </div>
        @endfor
    </div>



@endsection
