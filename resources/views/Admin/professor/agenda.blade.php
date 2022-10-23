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

<div id='draggable-el' data-event='{ "title": "my event", "duration": "02:00" }'>drag me</div>
<div id="calendar">

</div>


@endsection

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>

<script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',

        dateClick: function(info) {
            var date = calendar.getDate();
           $('#data').val(info.dateStr)


           info.dayEl.style.backgroundColor = 'red';
            $('.left').modal('show')
        }
      },

      );
      calendar.render();
    });




  </script>
