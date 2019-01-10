@extends('layouts.master')

@push('css')
    <style type="text/css">
        #idletimeout {
            background: #CC5100;
            border: 3px solid #FF6500;
            color: #fff;
            font-family: arial, sans-serif;
            text-align: center;
            font-size: 12px;
            padding: 10px;
            position: relative;
            top: 0px;
            left: 0;
            right: 0;
            z-index: 100000;
            display: none;
        }

        #idletimeout a {
            color: #fff;
            font-weight: bold
        }

        #idletimeout span {
            font-weight: bold
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title">Session Idle Timeout Notification Control</h3>
                    <p>This plugin allows you to detect whether a user is idle on website or working. It will notify the user if he/she is idle for the time specified in the plugin's settings. The user will be given a choice whether he/she wants to continue working or not. If not than screen will be locked after the specified time. User will have to enter the password to continue working after that. Here, for the demo purpose, notifying time is set to 5s and timeout time is set to 30s. In real time application it should be much higher number.</p>
                    <div id="idle-timeout-dialog" data-backdrop="static" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Your session is expiring soon</h4> </div>
                                <div class="modal-body">
                                    <p>
                                        <i class="fa fa-warning font-red"></i> You session will be locked in
                                        <span id="idle-timeout-counter"></span> seconds.</p>
                                    <p> Do you want to continue your session? </p>
                                </div>
                                <div class="modal-footer text-center">
                                    <button id="idle-timeout-dialog-keepalive" type="button" class="btn btn-outline btn-success" data-dismiss="modal">Yes, Keep Working</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.partials.right-sidebar')
    </div>
@endsection

@push('js')
    <script src="{{asset('plugins/components/session-timeout/idle/jquery.idletimeout.js')}}"></script>
    <script src="{{asset('plugins/components/session-timeout/idle/jquery.idletimer.js')}}"></script>
    <script src="{{asset('plugins/components/session-timeout/idle/session-timeout-idle-init.js')}}"></script>
@endpush