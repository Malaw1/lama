@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/components/ion-rangeslider/css/ion.rangeSlider.skinModern.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <!-- .row -->
                    <div class="row">
                        <!-- .col-lg-12 -->
                        <div class="col-md-12">
                            <h3 class="box-title">Start without params</h3>
                            <div id="range_01"></div>
                        </div>
                        <!-- /.col-lg-12 -->
                        <div class="col-md-12 m-t-40 m-b-40">
                            <hr>
                        </div>
                        <!-- .col-lg-12 -->
                        <div class="col-md-12">
                            <h3 class="box-title">Set min value, max value and start point</h3>
                            <div id="range_02"></div>
                        </div>
                        <!-- /.col-lg-12 -->
                        <div class="col-md-12 m-t-40 m-b-40">
                            <hr>
                        </div>
                        <!-- .col-lg-12 -->
                        <div class="col-md-12">
                            <h3 class="box-title">Set type to double and specify range, also showing grid and adding
                                prefix "$"</h3>
                            <div id="range_03"></div>
                        </div>
                        <!-- /.col-lg-12 -->
                        <div class="col-md-12 m-t-40 m-b-40">
                            <hr>
                        </div>
                        <!-- .col-lg-12 -->
                        <div class="col-md-12">
                            <h3 class="box-title">Set up range with negative values</h3>
                            <div id="range_04"></div>
                        </div>
                        <!-- /.col-lg-12 -->
                        <div class="col-md-12 m-t-40 m-b-40">
                            <hr>
                        </div>
                        <!-- .col-lg-12 -->
                        <div class="col-md-12">
                            <h3 class="box-title">Whant to show that max number is not the biggest one?</h3>
                            <div id="range_16"></div>
                        </div>
                        <!-- /.col-lg-12 -->
                        <div class="col-md-12 m-t-40 m-b-40">
                            <hr>
                        </div>
                        <!-- .col-lg-12 -->
                        <div class="col-md-12">
                            <h3 class="box-title">Remove double decoration</h3>
                            <div id="range_18"></div>
                        </div>
                        <!-- /.col-lg-12 -->
                        <div class="col-md-12 m-t-40 m-b-40">
                            <hr>
                        </div>
                        <!-- .col-lg-12 -->
                        <div class="col-md-12">
                            <h3 class="box-title">Visual details</h3>
                            <div id="range_22"></div>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- .row -->
                </div>
            </div>
        </div>
        <!-- /.row -->
        @include('layouts.partials.right-sidebar')
    </div>

@endsection
@push('js')
    <script src="{{asset('plugins/components/ion-rangeslider/js/ion-rangeSlider/ion.rangeSlider.min.js')}}"></script>
    <script src="{{asset('plugins/components/ion-rangeslider/js/ion-rangeSlider/ion.rangeSlider-init.js')}}"></script>

@endpush