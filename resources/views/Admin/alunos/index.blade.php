@extends('adminlte::page')

@section('title','Usuarios')

@section('content_header')
    <h1>
       Alunos
       <a href="{{route('alunos.create')}}" class="btn btn-sm btn-success">Novo Aluno</a>
    </h1>
    
@endsection

@section('content')


@include('Admin.includes.alert')

<div class="row">
 
    @foreach($alunos as $aluno)
    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
        <div class="card bg-light d-flex flex-fill">
            <div class="card-header text-muted border-bottom-0">
                <b class=" btn btn-success">Pago</b>
            </div>
            
            <div class="card-body pt-0">
            
                <div class="row">
                    <div class="col-7">
                        <h2 class="lead"><b>{{$aluno->nome}}</b></h2>
                        <p class="text-muted text-sm"><b>Sobre: </b> Eletricista/Pedreito</p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Endereço: Rua sant roman 200</li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Telefone: {{$aluno->whatssap}}</li>
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
                    <a href="{{route('alunos.show',['aluno'=> $aluno->id])}}" class="btn btn-sm btn-primary">
                    <i class="fas fa-user"></i> Ver Perfil
                    </a>
   <a href="{{route('alunos.edit',['aluno'=> $aluno->id])}}" class="btn btn-sm btn-dark">
                        <i class="fas fa-edit"></i> Editar
                        </a>
                 
                </div>
            </div>

    </div>

</div>
@endforeach

</div>

{{ $alunos->links('pagination::bootstrap-4') }}
@endsection