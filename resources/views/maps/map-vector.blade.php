@extends('layouts.master')
@push('css')
    <link href="{{asset('plugins/components/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">World Map</h3>
                    <div id="world-map-markers" style="height: 700px"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">India</h3>
                    <div id="india" style="height: 450px"></div>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">Usa</h3>
                    <div id="usa" style="height: 450px"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">Australia</h3>
                    <div id="australia" style="height: 450px"></div>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">Uk</h3>
                    <div id="uk" style="height: 450px"></div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        @include('layouts.partials.right-sidebar')
    </div>
@endsection

@push('js')
    <script src="{{asset('plugins/components/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('plugins/components/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('plugins/components/vectormap/jquery-jvectormap-in-mill.js')}}"></script>
    <script src="{{asset('plugins/components/vectormap/jquery-jvectormap-us-aea-en.js')}}"></script>
    <script src="{{asset('plugins/components/vectormap/jquery-jvectormap-uk-mill-en.js')}}"></script>
    <script src="{{asset('plugins/components/vectormap/jquery-jvectormap-au-mill.js')}}"></script>
    <script src="{{asset('plugins/components/vectormap/jvectormap.custom.js')}}"></script>
@endpush
