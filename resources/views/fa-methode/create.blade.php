@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New FaMethode</h3>
                    @can('view-'.str_slug('FaMethode'))
                    <a  class="btn btn-success pull-right" href="{{url('/fa-methode/fa-methode')}}"><i class="icon-arrow-left-circle"></i> Add FaMethode</a>
                    @endcan

                    <div class="clearfix"></div>
                    <hr>
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ url('/fa-methode/fa-methode') }}" accept-charset="UTF-8"
                          class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include ('fa-methode.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
