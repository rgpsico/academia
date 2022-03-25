@extends('adminlte::page')

@section('title','Usuarios')

@section('content_header')
    <h1>{{$alunos->nome}}</h1>
        @include('Admin.includes.alert')
@endsection

@section('content')

<div class="row">

    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
        <div class="card bg-light d-flex flex-fill">
            <div class="card-header text-muted border-bottom-0">
                <b class=" btn btn-success">Pago</b>
            </div>
            
            <div class="card-body pt-0">
            
                <div class="row">
                    <div class="col-7">
                        <h2 class="lead"><b>{{$alunos->nome}}</b></h2>
                        <p class="text-muted text-sm"><b>Sobre: </b> Eletricista/Pedreito</p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Endereço: Rua sant roman 200</li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Telefone: {{$alunos->whatssap}}</li>
                        </ul>
                    </div>
                    
                    <div class="col-5 text-center">
                        <img src="https://adminlte.io/themes/v3/dist/img/user1-128x128.jpg" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="text-right">
                    <a href="#" class="btn btn-sm bg-teal">
                    <i class="fas fa-comments"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-primary">
                    <i class="fas fa-user"></i> Ver Perfil
                    </a>
                </div>
            </div>

    </div>

</div>


</div>

@endsection