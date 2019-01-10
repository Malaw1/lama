@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New FaParam</h3>
                    @can('view-'.str_slug('FaParam'))
                        <a class="btn btn-success pull-right" href="{{url('/fa-param/fa-param')}}">
                            <i class="icon-arrow-left-circle"></i> View FaParam</a>
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

                    {!! Form::open(['url' => '/fa-param/fa-param', 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include ('fa-param.form')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
