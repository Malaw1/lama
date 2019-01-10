@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New FaParaMethode</h3>
                    @can('view-'.str_slug('FaParaMethode'))
                        <a class="btn btn-success pull-right" href="{{url('/fa-para-methode/fa-para-methode')}}">
                            <i class="icon-arrow-left-circle"></i> View FaParaMethode</a>
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

                    {!! Form::open(['url' => '/fa-para-methode/fa-para-methode', 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include ('fa-para-methode.form')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
