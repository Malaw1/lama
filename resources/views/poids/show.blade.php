@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Poid {{ $poid->id }}</h3>
                    @can('view-'.str_slug('Poid'))
                        <a class="btn btn-success pull-right" href="{{ url('/poids/poids') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $poid->id }}</td>
                            </tr>
                            <tr><th> Poids </th><td> {{ $poid->poids }} </td></tr><tr><th> Pesage Id </th><td> {{ $poid->pesage_id }} </td></tr><tr><th> User Id </th><td> {{ $poid->user_id }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

