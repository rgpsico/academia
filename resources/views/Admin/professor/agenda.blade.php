@extends('adminlte::page')


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.css">
@section('title','Usuarios')

@section('content_header')
    <h1>
        Meus Professor
       <a href="{{route('professor.create')}}" class="btn btn-sm btn-success">Novo Professor</a>
    </h1>
@endsection

<!-- Modal -->
@include('admin.professor._partials.modal')
<!-- modal -->

@section('content')


<div id="calendar">

</div>


@endsection
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>

<script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev, next today',
            center: 'title',
            right: 'dayGridMonth, timeGridWeek, timeGridDay'
        },
        buttonText: {
                today:'hoje',
                month:'Mês',
                timeGridWeek:'semana',
                timeGridDay:'Dia'
        },
        initialView: 'dayGridMonth',
        timeZone: 'UTC',
        events:'http://127.0.0.1:8000/api/agenda',

        dateClick: function(info) {
        var date = calendar.getDate();
           $('#data_inicio').val(info.dateStr)
        //info.dayEl.style.backgroundColor = 'red';
            $('.left').modal('show')
        }
      },

      );
      calendar.render();


      $('#AgendarCadastro').click(function(){
        $.post('/api/agenda/store',
        {
		"title": $('#title').val(),
	    "user_id":   $('#user_id').val() ?? 1,
	    "aluno_id":$('#aluno_id').val() ?? 1,
		"descricao":  $('#descricao').val(),
	    "data_inicio":$('#data_inicio').val(),
	    "data_fim": $('#data_fim').val() ??  $('#data_inicio').val(),
	    "descricao": $('#descricao').val() ?? 'descricao teste'
        },function(data){
            swal("Agendado com sucesso");
            $('.modal').modal('hide')

            calendar.addEvent({
                title: $('#title').val(),
                start: $('#data_inicio').val(),
                end: $('#data_fim').val(),
              });

        })

      })


    });




  </script>
