@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Analyse {{ $analyse->id }}</h3>
                    @can('view-'.str_slug('Analyse'))
                        <a class="btn btn-success pull-right" href="{{ url('/analyse/analyse') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $analyse->id }}</td>
                            </tr>
                            <tr><th> Objet Essai </th><td> {{ $analyse->objet_essai }} </td></tr>
                            <tr><th> Reference </th><td> {{ $analyse->reference }} </td></tr>
                            <tr><th> Dci </th><td> {{ $analyse->dci }} </td></tr>
                            <tr><th> Etat </th><td> {{ $analyse->etat }} </td></tr>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
