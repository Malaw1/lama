@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New FaEquipement</h3>
                    @can('view-'.str_slug('FaEquipement'))
                        <a class="btn btn-success pull-right" href="{{url('/fa-equipement/fa-equipement')}}">
                            <i class="icon-arrow-left-circle"></i> View FaEquipement</a>
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

                    {!! Form::open(['url' => '/fa-equipement/fa-equipement', 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include ('fa-equipement.form')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
