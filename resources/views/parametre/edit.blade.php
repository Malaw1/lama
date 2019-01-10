@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Edit Parametre #{{ $parametre->id }}</h3>
                    @can('view-'.str_slug('Parametre'))
                        <a class="btn btn-success pull-right" href="{{ url('/parametre/parametre') }}">
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

                    {!! Form::model($parametre, [
                        'method' => 'PATCH',
                        'url' => ['/parametre/parametre', $parametre->id],
                        'class' => 'form-horizontal',
                        'files' => true
                    ]) !!}

                    @include ('parametre.form', ['submitButtonText' => 'Update'])

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
