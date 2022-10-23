@extends('adminlte::page')

@section('title','Usuarios')

@section('content_header')
    <h1>
        Meus Professor
       <a href="{{route('professor.create')}}" class="btn btn-sm btn-success">Novo Professor</a>
    </h1>
@endsection

@section('content')
<div class="card">

<table class="table table-hover">
    <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
    </thead>
    <tbody>
    @foreach($professores as $professor)
    <tr>
        <td>{{$professor->id}}</td>
        <td>{{$professor->name}}</td>
        <td>{{$professor->email}}</td>
        <td>
            <a href="{{route('professor.edit',['professor'=> $professor->id])}}" class="btn btn-sm btn-info">Editar</a>
         @if($loggedId !== intval($professor->id))
            <form method="POST" action="{{route('professor.destroy',['professor'=>$professor->id])}}" class="d-inline" onsubmit="return confirm('Tem certeza que deseja Excluir?')">
            @method('DELETE')
            @csrf
                <button class="btn btn-sm btn-danger"> Excluir</button>
            </form>
            @endif

        </td>
    </tr>
    @endforeach
    </tbody>
</table>
</div>

{{ $professores->links('pagination::bootstrap-4') }}
@endsection


<script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
      });
      calendar.render();
    });

  </script>
