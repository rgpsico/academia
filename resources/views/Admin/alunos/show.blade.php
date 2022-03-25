@extends('adminlte::page')

@section('title','Usuarios')

@section('content_header')
    <h1>{{$alunos->nome}}</h1>
        @include('Admin.includes.alert')
@endsection

@section('content')

<div class="card">   
    <div class="col-md-12">

        <div class="card card-primary card-outline">
        <div class="card-body box-profile">
        <div class="text-center">
        <img class="profile-user-img img-fluid img-circle" src="https://cdn.pixabay.com/photo/2019/08/11/16/31/fitness-4399322_960_720.jpg" alt="User profile picture">
        </div>
        <h3 class="profile-username text-center">{{$alunos->nome}}</h3>
      

        <ul class="list-group list-group-unbordered mb-3">
        <li class="list-group-item">
        <b>Endereço:</b> <a class="float-right">{{$alunos->whatssap}}</a>
        </li>
        <li class="list-group-item">
        <b>Telefone</b> <a class="float-right">{{$alunos->whatssap}}</a>
        </li>
        <li class="list-group-item">
        <b>Instagran</b> <a class="float-right">{{$alunos->instagran}}</a>
        </li>
        </ul>
        <a href="#" class="btn btn-success btn-block"><b>Whatssap</b></a>
        </div>
        
        </div>
        
        
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Pagamentos</h3>
            <span class="float-right bg-danger text-light">Ultimo Pagamento: 21/12/2021</span>
            
        </div>
        
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                        <tr>
                            <th width="50">ID</th>                      
                            <th>Data Pagamento</th>                       
                         
                        </tr>
                </thead>
                <tbody>
                    @foreach ($pagamento as $value )
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->data_pagamento}}</td>                   
                    </tr>
                    @endforeach
                </tbody>
              
            </table>
        
        
       </div>
    </div>

</div>

@endsection