@extends('layouts.master')

@push('css')
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title">Session Timeout Notification Control</h3>
                    <p>After a set amount of time, a dialog is shown to the user with the option to either log out now,
                        or stay connected. If log out now is selected, the page is redirected to a logout URL. If stay
                        connected is selected, a keep-alive URL is requested through AJAX. If no options is selected
                        after another set amount of time, the page is automatically redirected to a timeout URL.</p>
                </div>
            </div>
        </div>
        @include('layouts.partials.right-sidebar')
    </div>

@endsection
@push('js')
    <script src="{{asset('plugins/components/session-timeout/jquery.sessionTimeout.min.js')}}"></script>
    <script src="{{asset('plugins/components/session-timeout/session-timeout-init.js')}}"></script>
@endpush