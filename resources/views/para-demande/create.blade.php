@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New ParaDemande</h3>
                    @can('view-'.str_slug('ParaDemande'))
                    <a  class="btn btn-success pull-right" href="{{url('/para-demande/para-demande')}}"><i class="icon-arrow-left-circle"></i> Add ParaDemande</a>
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

                    <form method="POST" action="{{ url('/para-demande/para-demande') }}" accept-charset="UTF-8"
                          class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include ('para-demande.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection