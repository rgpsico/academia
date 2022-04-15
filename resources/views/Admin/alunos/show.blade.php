@extends('adminlte::page')

@section('title','Usuarios')

@section('content_header')
    <h1></h1>
        @include('Admin.includes.alert')
@endsection

@section('content')

<div class="row">

    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
        <div class="card bg-light d-flex flex-fill">
            <div class="card-header text-muted border-bottom-0">
             
                {!!$ultimoPagamento  > date('Y-m-d') ?  '<b class="btn btn-success">Pago</b>' : '<b class="btn btn-danger">Está devendo</b>'!!}
            </div>
            
            <div class="card-body pt-0">            
                <div class="row">
                    <div class="col-7">
                        <h2 class="lead"><b>{{$alunos->nome}}</b></h2>
                        <p class="text-muted text-sm"><b>Sobre:</b> </p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Endereço: </li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Telefone: {{CelAjuste($alunos->whatssap)}}</li>
                            <li class="text-danger my-5 bg-danger ">Data Vencimento: {{date('d/m/Y', strtotime($ultimoPagamento)) === '31/12/1969' ? 'Não Pagou ainda' :  date('d/m/Y', strtotime($ultimoPagamento))}}</li>
                        </ul>
                    </div>
                    
                    <div class="col-5 text-center">
                        <img src="{{Storage::url($alunos['avatar'])}}" 
                             alt="user-avatar" 
                             class="img-circle img-fluid">
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="text-right">
                    <a href="https://wa.me/{{CelAjuste($alunos['whatssap'])}}?text=Mensagemn"    class="btn btn-sm bg-teal">
                    <i class="fas fa-comments"> Enviar Mensagem</i>
                    </a>
                    <a href="{{route('pagamento.create',['aluno'=> $alunos->id])}}" class="btn btn-sm btn-success">
                    <i class="fas fa-credit-card"></i> Realizar pagamentos
                    </a>
                         
                            <button type="submit" class="btn btn-danger my-2 excluir-aluno" data-id="{{ $alunos->id }}" data-name="{{ $alunos->nome }}">
                                <i class="fas fa-trash"></i> Excluir o Aluno {{ $alunos->nome }}
                            </button>
                       
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
                            <button type="button" class="btn btn-default"><i class="fas fa-search"></i></button>
                        
                        </div>
                    </div>
                </div>
            </div>        
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th v-show=false>ID</th>
                            <th>Usuario que Recebeu</th>
                            <th>Dia do pagamento</th>
                            <th>data de Inicio</th>
                            <th>data do vencimento</th>
                            <th>Forma de pagamento</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                        <tbody>
                         @foreach ($alunos->pagamento as $pagamento )
                    
                            <tr>
                                <td>{{$pagamento->id}}</td>
                                <td>{{$pagamento->admin->name}}</td>
                                <td>{{date('d/m/Y', strtotime($pagamento->data_pagamento))}}</td>
                                <td>{{date('d/m/Y', strtotime($pagamento->data_inicio))}}</td>
                                <td>{{date('d/m/Y', strtotime($pagamento->data_fim))}}</td>
                                <td><span class="tag tag-success">Dinheiro</span></td>
                                <td>
                                   <a href="{{route('pagamento.edit',['pagamento'=> $pagamento->id])}}"><button class="btb btn-info">Editar</button></a>
                                   <form action="{{ route('pagamento.destroy', $pagamento->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i> DELETAR o Pagamento {{ $pagamento->id }}</button>
                                </form>
                                </td>
                            </tr> 
                         @endforeach
                        </tbody>
                </table>
                
            </div>
        </div>        
    </div>


</div>

  
  <!-- Modal -->
  <div class="modal fade" id="confirmar-exclusao-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Desejar Excluir o Aluno <b class="aluno-excluido"></b> ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-danger confirmar-exclusao" 
          data-id="{{ $alunos->id }}" data-name="{{ $alunos->nome }}">Confirmar a Exclusão</button>
        </div>
      </div>
    </div>
  </div>


@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    const urlApi =  'http://127.0.0.1:8000/api'
    const url =  'http://127.0.0.1:8000/'

    function makeDELETErequest(id) {
        $.ajax({
            url: urlApi+'/alunos/'+id,
            type: 'DELETE',
            success: function (result) {
                console.log(result)
            }
        });
    }


  

        $('.excluir-aluno').click(function(){         
            let name = $('.excluir-aluno').attr('data-name');
            $('.aluno-excluido').text(name);
            $('#confirmar-exclusao-modal').modal('show');
            
          
        })
        
        $('.confirmar-exclusao').click(function(){
            let id = $('.excluir-aluno').attr('data-id');
            let name = $('.excluir-aluno').attr('data-name');           
            
            $('#confirmar-exclusao-modal').fadeOut('slow');
            $('#confirmar-exclusao-modal').fadeIn('slow');
            $('.modal-body').text('Aluno excluido com successo');
            setTimeout(() => {
                $('#confirmar-exclusao-modal').modal('hide');   
                window.location=url+"painel/alunos";
            }, 2000);         
            makeDELETErequest(id)
         

        });

       
    })
</script>