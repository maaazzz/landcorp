@extends('admin.layouts.master')
@section('styles')
<link href="{{asset('admin/calendar/lib/main.css')}}" rel='stylesheet' />

@endsection

@section('content')
<div id='calendar'></div>
@endsection


@section('scripts')
<script src="{{asset('admin/calendar/lib/main.js')}}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          headerToolbar: {
              left: 'prev,next today',
              center: '',
              right: 'dayGridMonth,timeGridWeek,timeGridDay',

           },
          initialView: 'dayGridMonth',
            events: '/admin/schedule-data',
        });


        calendar.render();
      });

</script>
@endsection
