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

@include('admin.includes.alert')

<div class="row">
 
    @foreach($alunos as $aluno)
    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
        <div class="card bg-light d-flex flex-fill">
            <div class="card-header text-muted border-bottom-0">     
                  
               {!!$aluno->statusPG === "Em dia" ? "<b class='btn btn-success'>Mês Pago</b>" : "<b class='btn btn-danger'>Está devendo</b>"!!}
            </div>
            
            <div class="card-body pt-0">
            
                <div class="row">
                    <div class="col-7">
                        <h2 class="lead"><b>{{$aluno->nome}}</b></h2>
                        <p class="text-muted text-sm"><b>Sobre: </b></p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">                  
                            <li class="small">
                                <span class="fa-li">
                                    <i class="fas fa-lg fa-phone">
                                </i>
                                </span>   <a href="https://wa.me/55{{$aluno->whatssap}}?text=Ola {{$aluno->nome}}{{$mensagem_whatssap->mensagem}}"   target="_blank" class="btn btn-sm">{{$aluno->whatssap}}</a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="col-5 text-center">
                        <img src="{{Storage::url($aluno->avatar) ?? 'imagem'}}" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="text-right">
                    <a href="https://wa.me/55{{$aluno->whatssap}}?text=Ola {{$aluno->nome}}{{$mensagem_whatssap->mensagem}}"  target="_blank"  class="btn btn-sm bg-teal">
                    <i class="fas fa-comments"> Enviar mensagem</i>
                    </a>
                    <a href="{{route('alunos.show',['aluno'=> $aluno->id])}}" class="btn btn-sm btn-primary">
                    <i class="fas fa-user"></i> Ver Perfil
                    </a>
                    <a href="{{route('alunos.edit',['aluno'=> $aluno->id])}}" class="btn btn-sm btn-dark">
                        <i class="fas fa-edit"></i> Editar Aluno
                        </a>
                    
                </div>
            </div>

    </div>

</div>
@endforeach

</div>


@endsection