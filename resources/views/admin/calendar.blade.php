@extends('layouts.admin')

@section('title', 'پازل استودیو | تقویم کلاس‌ها')

@section('content')
<!--begin::Content-->
<div class="flex-row-fluid">
    @include('partials.alerts')

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">
                    تقویم کلاس‌های
                </h3>
            </div>
        </div>
        <div class="card-body">
            <div id='calendar'></div>
        </div>
    </div>
</div>
<!--end::Content-->
@endsection

@section('css')
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.css' rel='stylesheet' />
<style>
    .popper,
    .tooltip {
        position: absolute;
        z-index: 9999;
        background: #3699ff;
        color: black;
        width: 150px;
        border-radius: 3px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.12);
        padding: 10px;
        text-align: center;
        opacity: 1 !important;
    }
    
    .tooltip .tooltip-inner {
        font-family: IRANSansX;
    }

    .style5 .tooltip {
        background: #1E252B;
        color: #FFFFFF;
        max-width: 200px;
        width: auto;
        font-size: .8rem;
        padding: .5em 1em;
    }

    .popper .popper__arrow,
    .tooltip .tooltip-arrow {
        width: 0;
        height: 0;
        border-style: solid;
        position: absolute;
        margin: 5px;
    }

    .tooltip .tooltip-arrow,
    .popper .popper__arrow {
        border-color: #3699ff;
    }

    .style5 .tooltip .tooltip-arrow {
        border-color: #1E252B;
    }

    .popper[x-placement^="top"],
    .tooltip[x-placement^="top"] {
        margin-bottom: 5px;
    }

    .popper[x-placement^="top"] .popper__arrow,
    .tooltip[x-placement^="top"] .tooltip-arrow {
        border-width: 5px 5px 0 5px;
        border-left-color: transparent;
        border-right-color: transparent;
        border-bottom-color: transparent;
        bottom: -5px;
        left: calc(50% - 5px);
        margin-top: 0;
        margin-bottom: 0;
    }

    .popper[x-placement^="bottom"],
    .tooltip[x-placement^="bottom"] {
        margin-top: 5px;
    }

    .tooltip[x-placement^="bottom"] .tooltip-arrow,
    .popper[x-placement^="bottom"] .popper__arrow {
        border-width: 0 5px 5px 5px;
        border-left-color: transparent;
        border-right-color: transparent;
        border-top-color: transparent;
        top: -5px;
        left: calc(50% - 5px);
        margin-top: 0;
        margin-bottom: 0;
    }

    .tooltip[x-placement^="right"],
    .popper[x-placement^="right"] {
        margin-left: 5px;
    }

    .popper[x-placement^="right"] .popper__arrow,
    .tooltip[x-placement^="right"] .tooltip-arrow {
        border-width: 5px 5px 5px 0;
        border-left-color: transparent;
        border-top-color: transparent;
        border-bottom-color: transparent;
        left: -5px;
        top: calc(50% - 5px);
        margin-left: 0;
        margin-right: 0;
    }

    .popper[x-placement^="left"],
    .tooltip[x-placement^="left"] {
        margin-right: 5px;
    }

    .popper[x-placement^="left"] .popper__arrow,
    .tooltip[x-placement^="left"] .tooltip-arrow {
        border-width: 5px 0 5px 5px;
        border-top-color: transparent;
        border-right-color: transparent;
        border-bottom-color: transparent;
        right: -5px;
        top: calc(50% - 5px);
        margin-left: 0;
        margin-right: 0;
    }
</style>
@endsection

@section('js')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.js'></script>
<script src='https://unpkg.com/popper.js/dist/umd/popper.min.js'></script>
<script src='https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            center: 'timeGridWeek,timeGridThreeDay' // buttons for switching between views
        },
        views: {
            timeGridThreeDay: {
                type: 'timeGrid',
                duration: { days: 3 },
                buttonText: '۳ روز'
            }
        },
        eventDidMount: function(info) {
            var tooltip = new Tooltip(info.el, {
                title: info.event.extendedProps.description,
                placement: 'top',
                trigger: 'hover',
                container: 'body'
            });
        },
        themeSystem: 'bootstrap',
        locale: 'fa',
        direction: 'rtl',
        firstDay: '6',
        nowIndicator: true,
        navLinks: true,
        slotMinTime: '06:00:00',
        slotMaxTime: '24:00:00',
        buttonText: {
            today:    'امروز',
            month:    'ماه',
            week:     'هفته',
            day:      'روز',
            list:     'لیست'
        },
        events: [
            @foreach ($todayClasses as $todayClass)
            {
                title: '{{$todayClass->name}} {{$todayClass->course->name}} - استودیو{{$todayClass->stu_num}}',
                start: '{{$todayClass->classroom_date}}',
                end: '{{$todayClass->classroom_end_date}}',
                description: '{{$todayClass->name}} - {{$todayClass->course->name}} - استودیو {{$todayClass->stu_num}}',
                @switch($todayClass->stu_num)
                    @case(1)
                        backgroundColor: '#8E24AA'
                        @break
                    
                    @case(2)
                        backgroundColor: '#009688'
                        @break
                    
                    @case(3)
                        backgroundColor: '#4285F4'
                        @break
                    
                    @case(4)
                        backgroundColor: '#e3c342'
                        @break
                    
                    @case(5)
                        backgroundColor: '#D81B60'
                        @break
                    
                    @case(10)
                        backgroundColor: '#616161'
                        @break
                    
                    @case(0)
                        backgroundColor: '#ff0000'
                        @break
                    
                    @default
                        backgroundColor: '#ff0000'
                @endswitch
            },
            @endforeach
        ]
      });
      calendar.render();
    });
</script>
@endsection