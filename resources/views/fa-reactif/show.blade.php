@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">FaReactif {{ $fareactif->id }}</h3>
                    @can('view-'.str_slug('FaReactif'))
                        <a class="btn btn-success pull-right" href="{{ url('/fa-reactif/fa-reactif') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $fareactif->id }}</td>
                            </tr>
                            <tr><th> Reactif </th><td> {{ $fareactif->reactif }} </td></tr><tr><th> Faisabilite Id </th><td> {{ $fareactif->faisabilite_id }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

