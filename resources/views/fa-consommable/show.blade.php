@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">FaConsommable {{ $faconsommable->id }}</h3>
                    @can('view-'.str_slug('FaConsommable'))
                        <a class="btn btn-success pull-right" href="{{ url('/fa-consommable/fa-consommable') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $faconsommable->id }}</td>
                            </tr>
                            <tr><th> Designation </th><td> {{ $faconsommable->designation }} </td></tr><tr><th> Faisabilite Id </th><td> {{ $faconsommable->faisabilite_id }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

