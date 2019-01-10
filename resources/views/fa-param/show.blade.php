@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">FaParam {{ $faparam->id }}</h3>
                    @can('view-'.str_slug('FaParam'))
                        <a class="btn btn-success pull-right" href="{{ url('/fa-param/fa-param') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $faparam->id }}</td>
                            </tr>
                            <tr><th> Faisabilite Id </th><td> {{ $faparam->faisabilite_id }} </td></tr><tr><th> Parametre </th><td> {{ $faparam->parametre }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

