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


<div class="row">
    <div class="search-professor col-3">
        <div class="form-group">
            <label for="professor">Professor</label>
            <select name="" id="professor" class="form-control">
                <option value="" selected>Selecione</option>
                <option value="">Fabiane</option>
            </select>
        </div>
    </div>

    <div class="search-professor col-3">
        <div class="form-group">
            <label for="professor">Atividade</label>
            <select name="" id="atividade" class="form-control">
                <option value="" selected>Selecione</option>
                <option value="">Futebol</option>
            </select>
        </div>
    </div>



    <div class="search-professor col-3">
        <div class="form-group">
            <label for="professor">Local</label>
            <select name="" id="atividade" class="form-control">
                <option value="" selected>Selecione</option>
                <option value="">Futebol</option>
            </select>
        </div>
    </div>
</div>
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
        },
        eventMouseover: function(event, jsEvent, view) {
            if (view.name !== 'agendaDay') {
                $(jsEvent.target).attr('title', event.title);
            }
        },
        eventDestroy: function(event, element, view)
        {
            alert("removing stuff");
        },
        eventClick: function(calEvent, jsEvent, view)
        {
            var id = calEvent.event._def.publicId

            swal({
                title: "Voce deseja excluir",
                text: "Voce deseja Excluir o evento ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                    url: '/api/agenda/'+id+'/delete',
                    type: 'DELETE',
                    success: function(result) {
                        swal("Eita! Seu Evento foi deletado com sucesso", {
                    icon: "success",
                    });
                    calendar.refetchEvents()
                    }
                });
                } else {
                    swal("Evento não foi excluido");
                }
                });

        },
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

            calendar.refetchEvents()

        })

      })


    });




  </script>

