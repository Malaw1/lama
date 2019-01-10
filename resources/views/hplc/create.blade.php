@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New Hplc</h3>
                    @can('view-'.str_slug('Hplc'))
                        <a class="btn btn-success pull-right" href="{{url('/hplc/hplc')}}">
                            <i class="icon-arrow-left-circle"></i> View Hplc</a>
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

                    {!! Form::open(['url' => '/hplc/hplc', 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include ('hplc.form')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
