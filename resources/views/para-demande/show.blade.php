@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">ParaDemande {{ $parademande->id }}</h3>
                    @can('view-'.str_slug('ParaDemande'))
                        <a class="btn btn-success pull-right" href="{{ url('/para-demande/para-demande') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $parademande->id }}</td>
                            </tr>
                            <tr><th> Parametre </th><td> {{ $parademande->parametre }} </td></tr><tr><th> Demande </th><td> {{ $parademande->demande }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

