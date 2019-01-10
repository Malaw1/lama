@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New Consommable</h3>
                    @can('view-'.str_slug('Consommable'))
                        <a class="btn btn-success pull-right" href="{{url('/consommable/consommable')}}">
                            <i class="icon-arrow-left-circle"></i> View Consommable</a>
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

                    {!! Form::open(['url' => '/consommable/consommable', 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include ('consommable.form')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection