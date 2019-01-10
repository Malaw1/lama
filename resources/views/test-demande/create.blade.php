@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New TestDemande</h3>
                    @can('view-'.str_slug('TestDemande'))
                        <a class="btn btn-success pull-right" href="{{url('/demande-test/test-demande')}}">
                            <i class="icon-arrow-left-circle"></i> View TestDemande</a>
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

                    {!! Form::open(['url' => '/demande-test/test-demande', 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include ('test-demande.form')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
