@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Consommable {{ $consommable->id }}</h3>
                    @can('view-'.str_slug('Consommable'))
                        <a class="btn btn-success pull-right" href="{{ url('/consommable/consommable') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $consommable->id }}</td>
                            </tr>
                            <tr><th> Designation </th><td> {{ $consommable->designation }} </td></tr><tr><th> Type </th><td> {{ $consommable->type }} </td></tr><tr><th> Fabricant </th><td> {{ $consommable->fabricant }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

