@extends('adminlte::page')

@section('title','Usuarios')

@section('content_header')
    <h1>
       Alunos
       <a href="{{route('alunos.create')}}" class="btn btn-sm btn-success">Novo Aluno</a>
    </h1>
        @include('Admin.includes.alert')
@endsection

@section('content')
<div class="row">
    
  
    <div class="input-group col-3">
        <input type="search" class="form-control rounded" placeholder="Buscar" aria-label="Search" aria-describedby="search-addon" />
        <button type="button" class="btn btn-outline-primary">Buscar Aluno</button>
    </div>
   
</div>
<div class="card">   

<table class="table table-hover">
    <thead>
            <tr>
                <th width="50">ID</th>
                <th width="50">Imagem</th>
                <th>Nome</th>
                <th>Whatssap</th>
                <th>Data de Inicio</th>
                <th>Ultimo pagamento</th>
                <th>Status</th>
                <th width="200">Ações</th>
            </tr>
    </thead>
    <tbody>
    @foreach($alunos as $aluno)
    <tr>
        <td>{{$aluno->id}}</td>
        <td><img src="https://cdn.pixabay.com/photo/2019/08/11/16/31/fitness-4399322_960_720.jpg" alt="" width="100px" height="100px"></td>
        <td>{{ $aluno->nome}}</td>
        <td>{{ $aluno->whatssap}}</td>
        <td>{{ $aluno->created_at}}</td>
        <td>{{ $aluno->created_at}}</td>
        <td><a href="" class="btn btn-success">Pago</a></td>

            <td>
         
            <a href="{{route('alunos.show',['aluno'=> $aluno->id])}}" class="btn btn-sm btn-success">ver</a>
            <a href="{{route('alunos.edit',['aluno'=> $aluno->id])}}" class="btn btn-sm btn-info">Editar</a>
        
            <form method="POST" action="" class="d-inline" onsubmit="return confirm('Tem certeza que deseja Excluir?')">
            @method('DELETE')
            @csrf
                <button class="btn btn-sm btn-danger"> Excluir</button>
            </form>
            <a href="" class="btn btn-sm btn-dark my-1">Todos os Pagamentos</a>
     
          
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
</div>

{{ $alunos->links('pagination::bootstrap-4') }}
@endsection