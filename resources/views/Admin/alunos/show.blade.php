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
                <b>Situação:</b><b class="btn btn-dark">Em divida</b>
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
                        <img src="https://adminlte.io/themes/v3/dist/img/user1-128x128.jpg" 
                             alt="user-avatar" 
                             class="img-circle img-fluid">
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="text-right">
                    <a href="#" class="btn btn-sm bg-teal">
                    <i class="fas fa-comments"> Enviar Mensagem</i>
                    </a>
                    <a href="{{route('pagamento.create',['aluno'=> $alunos->id])}}" class="btn btn-sm btn-success">
                    <i class="fas fa-credit-card"></i> Realizar pagamentos
                    </a>

                    <a href="{{route('alunos.destroy',['aluno'=> $alunos->id])}}" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Excluir Alunos
                        </a>
                </div>
            </div>

        </div>
    </div>

    <div class="col-06">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Todos os Pagamentos</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Buscar">
                        
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        
                        </div>
                    </div>
                </div>
            </div>        
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario que Recebeu</th>
                            <th>Dia do pagamento</th>
                            <th>data do vencimento</th>
                            <th>Forma de pagamento</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                        <tbody>
                        @foreach ($pagamentos as $pagamento)                            
                            <tr>
                                <td>183</td>
                                <td>{{$pagamento->id}}</td>
                                <td>{{$pagamento->data_pagamento}}</td>
                                <td>{{$pagamento->data_fim}}</td>
                                <td><span class="tag tag-success">Dinheiro</span></td>
                                <td>
                                   <button class="btb btn-info">Editar</button>
                                    <button class="btb btn-danger">Exluir</button>
                                </td>
                            </tr> 
                        @endforeach  
                        </tbody>
                </table>
            </div>
        </div>        
    </div>


</div>

@endsection