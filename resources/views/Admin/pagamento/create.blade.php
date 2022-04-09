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
                        <input type="text"    name="user_name" class="form-control @error('user_name') is-invalid @enderror id="name"  value="{{auth()->user()->name}}">
                        <input type="hidden"  name="user_id" class="form-control @error('user_id') is-invalid @enderror id="name"  value="{{auth()->user()->id}}">
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
            <button type="submit" class="btn btn-success">Pagar</button>
        </div>
    </div>
    <!-- /.box-footer -->
  </form>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"  crossorigin="anonymous"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="{{asset('assets/js/select2.js')}}"></script>
<script>
   

$('#data_inicio').change(function(){
    var dateControl = document.querySelector('#data_fim');
           data = new Date("2019-04-20T10:00:00-03:00");
         

       
         
        
        

})
  



    </script>
@endsection