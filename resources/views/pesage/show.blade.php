@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Pesage {{ $pesage->id }}</h3>
                    @can('view-'.str_slug('Pesage'))
                        <a class="btn btn-success pull-right" href="{{ url('/pesage/pesage') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $pesage->id }}</td>
                            </tr>
                            <tr><th> Poids Total </th><td> {{ $pesage->poids_total }} </td></tr><tr><th> Poids Moyen </th><td> {{ $pesage->poids_moyen }} </td></tr><tr><th> Tolerance </th><td> {{ $pesage->tolerance }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

