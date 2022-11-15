@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1></h1>
    @include('Admin.includes.alert')
@endsection

@include('Admin.alunos._partials.modal')

@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Profile</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li><button class='btn btn-success btPagamento'>Enviar Pagamento </button></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-3 col-sm-12">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle btAvatar"
                            @php $img = $alunos->avatar == '' ?  asset('media/images/abn.png') : asset('media/avatar/'.$alunos->avatar)   @endphp
                            src="{{$img}}" alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center">{{$alunos->nome ?? ''}}</h3>
                    <p class="text-muted text-center">{{$alunos->whatssap}}</p>
                    <a href="#" class="btn btn-primary btn-block"><b>{{$alunos->instagran}}</b></a>
                </div>
            </div>

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sobre</h3>
                </div>

                <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i> Idade</strong>
                    <p class="text-muted">
                        21
                    </p>
                    <hr>
                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Peso</strong>
                    <p class="text-muted">92</p>
                    <hr>
                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Comecei com </strong>
                    <p class="text-muted">107 kg</p>
                    <hr>
                </div>

            </div>

        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <h1>Series</h1>
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Segunda</a></li>
                        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Terça</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Quarta</a></li>
                        <li class="nav-item"><a class="nav-link"  data-toggle="tab">Quinta</a></li>
                        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Sexta</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Sabado</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="activity">
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg"
                                        alt="user image">
                                    <span class="username">
                                        <a href="#">Jonathan Burke Jr .</a>
                                        <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                    </span>
                                    <span class="description">Shared publicly - 7:30 PM today</span>
                                </div>

                                <p>
                                    Lorem ipsum represents a long-held tradition for designers,
                                    typographers and the like. Some people hate it and argue for
                                    its demise, but others ignore the hate as they create awesome
                                    tools to help create filler text for everyone from bacon lovers
                                    to Charlie Sheen fans.
                                </p>
                                <p>
                                    <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i>
                                        Share</a>
                                    <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i>
                                        Like</a>
                                    <span class="float-right">
                                        <a href="#" class="link-black text-sm">
                                            <i class="far fa-comments mr-1"></i> Comments (5)
                                        </a>
                                    </span>
                                </p>
                                <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                            </div>






                        </div>

                    </div>

                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Pagamentos</h1>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>cod</th>
                                    <th>Status</th>
                                    <th>Data de pagamento</th>
                                    <th>mês de uso</th>
                                    <th>Comprovante</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($alunos->alunoPagamento as $aluno)
                                <tr>
                                    <td>{{$aluno->id}}</td>
                                    <td>{{$aluno->id}}</td>
                                    <td>{{$aluno->data_pagamento}}</td>
                                    <td>{{$aluno->data_fim}}</td>

                                    <td><img src="{{ asset('/storage/'.$aluno->image_pagamento) }}" alt="" height="80" width="80"></td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>



    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.btPagamento').click(function(){
            $('.modal').modal('show')
        })


      function getForm(){
        $('.modal').modal('show')
        $.get('/formAvatar',function(data){
            $('.modal-body').html(data)
            $('#idAluno').val({{$alunos->id}})
            
        })
      }


        $('.btAvatar').click(function(){
            getForm()
    
            $('.btmodal').addClass('EnviarAvatar')
        
        })


        $(document).on("click",".EnviarAvatar",function() {
            const input = document.querySelector('#avatarFile');
                const formData = new FormData();
                formData.append('avatarFile', input.files[0]);
                formData.append('alunoId',   $('#idAluno').val());
                axios.post('/imageUpload', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(function (response) {
                if(response.status == 200){
                    swal("Bom Trabalho!", "Avatar enviado com sucesso", "success");
                    setTimeout(() => {
                        window.location.reload(); 
                    }, 2000);
                    
                } 
            }).catch(function (error) {              
                swal("Ops!", 'o formato da imagem é inválido', "danger");
            });;
        });
        $('#aluno_id').val({{$alunos->id}})



    </script>

@endsection
