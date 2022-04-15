@extends('adminlte::page')

@section('title','Realizar Pagamento')

@section('content_header')
    <h1>
       Realizar Pagamento
    
    </h1>
@endsection

@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <h5><i class="icon fas fa-ban"></i>Ocorreu um error</h5>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{@$error}}</li>
        @endforeach
    </ul>
  </div>
@endif
<div class="card">
  
    <div class="card-body">
<form class="form-horizontal" method="POST" action="{{route('pagamento.store')}}">
    @csrf
 

            <div class="form-group row">       
                <label for="nome" class="col-sm-2 col-form-label">Nome do Aluno que esta realizando o pagamento</label>
                    <div class="col-sm-10">
                        <input type="text"  name="nome" class="form-control @error('nome') is-invalid @enderror id="name"  value="{{$aluno->nome}}">
                        <input type="hidden"  name="aluno_id" class="form-control @error('aluno_id') is-invalid @enderror id="name"  value="{{$aluno->id}}">
                    </div>
            </div> 
            
            <div class="form-group row">       
                <label for="nome" class="col-sm-2 col-form-label">Quem está recebendo:</label>
                    <div class="col-sm-10">
                        <input type="text"    name="user_name" class="form-control @error('user_name') is-invalid @enderror" id="name"  value="{{auth()->user()->name}}">
                        <input type="hidden"  name="user_id" class="form-control @error('user_id') is-invalid @enderror" id="user_id"  value="{{auth()->user()->id}}">
                    </div>
            </div> 

            <div class="form-group row">       
                <label for="nome" class="col-sm-2 col-form-label">Data do Pagamento:</label>
                    <div class="col-sm-10">
                        <input type="date"    name="data_pagamento" class="form-control @error('data_pagamento') is-invalid @enderror id="data_pagamento"  value="<?= date('Y-m-d');?>">
                    </div>
            </div>

            <div class="form-group row">       
                <label for="nome" class="col-sm-2 col-form-label">Data de inicio:</label>
                    <div class="col-sm-10">
                        <input type="date"   required name="data_inicio" class="form-control @error('data_inicio') is-invalid @enderror" id="data_inicio"  value="">
                    </div>
            </div>

            <div class="form-group row">       
                <label for="nome" class="col-sm-2 col-form-label">Data Fim:</label>
                    <div class="col-sm-10">
                        <input type="date"  disabled name="data_fim" class="form-control @error('data_fim') is-invalid @enderror" id="data_fim"  value="">
                    </div>
            </div>
          

    <div class="form-group row">  
        <label class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
            <button  class="btn btn-info  bt-habilitar">Habilitar botão para pagar</button>
            <button type="submit" class="btn btn-success pagar d-none" >Pagar</button>
        </div>
    </div>
    <!-- /.box-footer -->
  </form>
</div>
</div>

<div class="modal fade" id="confirmar-usuario-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="texto-modal">Por favor Confirme o usuário que esta recebendo</h5>
        </div>
          <div class="modal-body">
            <div class="form-group">
                <label for="nome">Eu sou:</label>
                <select name="" class="form-control nome-usuario" id="">
                   
                </select>
            </div>


            <div class="form-group">
                <label for="nome">Password</label>
                <input type="password"  class="form-control password">
            </div>

           <button class="btn btn-success bt-logar">Logar</button>
            
          
          <button type="button btn btn-info" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times; Cancelar</span>
          </button>
        </div>      
    
      </div>
    </div>
  </div>

  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"  crossorigin="anonymous"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  
<script>
     const urlApi =  'https://sistem.academiaextremeapocalipse.com.br/api'

    $('.bt-habilitar').click(function(event){
        event.preventDefault();
        $('#confirmar-usuario-modal').modal('show');       
        getUser() 
        
    });

    $('.bt-logar').click(function(event){
        let nome = $('.nome-usuario').val();
        let password = $('.password').val();
        if(authUsuer(nome,password)){
         
        }
       
    
        
    });

    function authUsuer(nome, password) {
                request = $.ajax({
                    type: "POST",
                    url: urlApi+'/auth',
                    data: { name: nome, password : password},
                    statusCode: {
                    200: function(data) {
                        console.log(data)
                        $('#confirmar-usuario-modal').modal('hide');
                        $('.bt-habilitar').hide();
                        $('.pagar').removeClass('d-none');
                        $('#name').val(data.name)
                        $('#user_id').val(data.id) 
                        $('#name').prop('disabled',true); 
                    },
                    403:function(){
                       console.log('erro ao Logar')
                    }
                    }
                });        
            }

    function getUser() {
        $('.nome-usuario').html(' ')
            $.get(urlApi+'/users',
                function(data){
                     for(x=0; x<data.length; x++)
                     {
                        $('.nome-usuario').append(`<option value="${data[x].name}">${data[x].name}</option>`);
                       
                     }
                    
                });
            }






    </script>
@endsection