@extends('merchant.layouts.master')
@section('css')
<link href='{{asset('/plugins/calendar/lib/main.css')}}' rel='stylesheet' />
<script src='{{asset('/plugins/calendar/lib/main.js')}}'></script>
<script src='{{asset('/plugins/calendar/lib/locales/en.js')}}'></script>
<style>
    #calendar {
        margin: 0px;
        padding: 0px;
        overflow:   scroll;
    }::-webkit-scrollbar {
        width: 0px;
        background: transparent; /* make scrollbar transparent */
    }
    .fc-event-title {
        font-size: 15px;
    }
    .fc-event-time {
        display: none;
    }
    .fc-list-day-text, .fc-list-day-side-text {
        color: black !important;
    }
    /* .fc th {
        background-color: #4099ff !important;
    } */
    .fc-daygrid-day-events {
        cursor: pointer;
    }
    .label {
        font-size: 100% !important;
    }
</style>
@endsection
@section('content')
<div class="card page-header p-0">
    <div class="card-block front-icon-breadcrumb row align-items-end">
        <div class="breadcrumb-header col">
            <div class="big-icon">
                <i class="icofont icofont-ui-calendar"></i>
            </div>
            <div class="d-inline-block">
                <h5>Calendar</h5>
                <span>Status: <label class="label label-primary">Admin Level 1</label></span>
            </div>
        </div>
        <div class="col">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item"><a href="">Calendar</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <label class="label label-lg label-warning"><i class="icofont icofont-flash"></i> Flash Sale</label>
                        <label class="label label-lg label-danger"><i class="icofont icofont-fire"></i> Hot Deal</label>
                    </div>
                </div>
            </div>
            <div class="card-block">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
</div>

<div id="result-modalviewcalendar"></div>
@endsection
@section('js')
@include('flash-message')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,listMonth'
            },
            businessHours: true, // display business hours
            timeZone: 'local',
            locale: 'en',
            themeSystem: 'bootstrap',
            businessHours: false,
            editable: false,
            weekNumbers: false,
            selectable: true,
            slotLabelFormat: "HH:mm",
            dayMaxEvents: true,
            eventTimeFormat: {
                hour: '2-digit',
                minute: '2-digit',
                hour12: false
            },
            events: [
                @foreach($day as $day) {
                    id: '{{ $day->fs_id}}',
                    title: '{{ $day->fs_name}}',
                    @if ($day->fs_type == 'FS') 
                    color: '#FFB64D',
                    @else
                    color: '#FF5370',
                    @endif
                    start: '{{ date("Y-m-d", strtotime($day->fs_regis_start)) }}',
                    end: '{{ date("Y-m-d", strtotime($day->fs_dateend)) }}',
                },
                @endforeach
            ],
            eventClick: function (event) {
                var id = event.event.id;
                $.ajax({
                    url: '{{ url('merchant/calendar') }}/' + id,
                    type: 'get',
                }).done(function (data) {
                    $('#result-modalviewcalendar').html(data);
                    $("#modalviewcalendar").modal('show');
                });
            }
        });
        calendar.render();
    });
</script>
@endsection