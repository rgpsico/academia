@extends('adminlte::page')

@section('title','Usuarios')

@section('content_header')
    <h1>
        Meus serie
       <a href="{{route('series.create')}}" class="btn btn-sm btn-success">Novo serie</a>
    </h1>
@endsection

@section('content')
<div class="card">

<table class="table table-hover">
    <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Descricao</th>
                <th>Ações</th>
            </tr>
    </thead>
    <tbody>
    @foreach($series as $serie)
    <tr>
        <td>{{$serie->id}}</td>
        <td>{{$serie->titulo}}</td>
        <td>{{$serie->descricao}}</td>
        <td>
            <a href="{{route('series.edit',['series'=> $serie->id])}}" class="btn btn-sm btn-info">Editar</a>
       
            <form method="POST" action="{{route('series.destroy',['series'=>$serie->id])}}" 
                class="d-inline" 
                onsubmit="return confirm('Tem certeza que deseja Excluir?')">
            @method('DELETE')
            @csrf
                <button class="btn btn-sm btn-danger"> Excluir</button>
            </form>
           

        </td>
    </tr>
    @endforeach
    </tbody>
</table>
</div>

{{ $series->links('pagination::bootstrap-4') }}
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
