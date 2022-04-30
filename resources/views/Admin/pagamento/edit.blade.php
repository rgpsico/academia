@extends('adminlte::page')

@section('title', 'Editar Pagamento')

@section('content_header')
    <h1>
        Editar Pagamento

    </h1>
@endsection

@section('content')
    @include('Admin.includes.alert')

    @if ($errors->any())
        <div class="alert alert-danger">
            <h5><i class="icon fas fa-ban"></i>Ocorreu um error</h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ @$error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">

        <div class="card-body">
            <form class="form-horizontal" action="{{ route('pagamento.update', ['pagamento' => $pagamento->id]) }}"
                method="POST">
                @csrf
                @method("PUT")
                @include('admin.pagamento._partials.form')
                <!-- /.box-footer -->
          
        </div>
    </div>

    <div class="modal fade" id="confirmar-usuario-modal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <input type="password" class="form-control password">
                    </div>

                    <button class="btn btn-success bt-logar">Logar</button>


                    <button type="button btn btn-info" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times; Cancelar</span>
                    </button>
                </div>

            </div>
        </div>
    </div>

<script src="{{asset('js/pagamento/pagamento.js')}}"></script>
@endsection

