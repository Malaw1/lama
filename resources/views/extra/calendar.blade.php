@extends('layouts.master')
@push('css')
    <link href="{{asset('plugins/components/calendar/dist/fullcalendar.css')}}" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box cal-event">
                    <h3 class="box-title">Drag and drop your event</h3>
                    <div class="m-t-20">
                        <div class="calendar-event" data-class="bg-primary">My Event One <a href="javascript:void(0);" class="remove-calendar-event"><i class="ti-close"></i></a></div>
                        <div class="calendar-event" data-class="bg-success">My Event Two <a href="javascript:void(0);" class="remove-calendar-event"><i class="ti-close"></i></a></div>
                        <div class="calendar-event" data-class="bg-warning">My Event Three <a href="javascript:void(0);" class="remove-calendar-event"><i class="ti-close"></i></a></div>
                        <div class="calendar-event" data-class="bg-custom">My Event Four <a href="javascript:void(0);" class="remove-calendar-event"><i class="ti-close"></i></a></div>
                        <input type="text" placeholder="Add Event and hit enter" class="form-control add-event m-t-20"> </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="white-box">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
        @include('layouts.partials.right-sidebar')
    </div>
@endsection

@push('js')
    <script src="{{asset('plugins/components/calendar/jquery-ui.min.js')}}"></script>
    <script src="{{asset('plugins/components/moment/moment.js')}}"></script>
    <script src='{{asset('plugins/components/calendar/dist/fullcalendar.min.js')}}'></script>
    <script src="{{asset('plugins/components/calendar/dist/jquery.fullcalendar.js')}}"></script>

@endpush