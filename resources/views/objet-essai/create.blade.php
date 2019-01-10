@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New ObjetEssai</h3>
                    @can('view-'.str_slug('ObjetEssai'))
                        <a class="btn btn-success pull-right" href="{{url('/objetEssai/objet-essai')}}">
                            <i class="icon-arrow-left-circle"></i> View ObjetEssai</a>
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

                    {!! Form::open(['url' => '/objetEssai/objet-essai', 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include ('objet-essai.form')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
