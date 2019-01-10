@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Edit FaReactif #{{ $fareactif->id }}</h3>
                    @can('view-'.str_slug('FaReactif'))
                        <a class="btn btn-success pull-right" href="{{ url('/fa-reactif/fa-reactif') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
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

                    {!! Form::model($fareactif, [
                        'method' => 'PATCH',
                        'url' => ['/fa-reactif/fa-reactif', $fareactif->id],
                        'class' => 'form-horizontal',
                        'files' => true
                    ]) !!}

                    @include ('fa-reactif.form', ['submitButtonText' => 'Update'])

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
