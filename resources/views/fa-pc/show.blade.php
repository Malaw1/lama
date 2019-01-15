@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">FaPc {{ $fapc->id }}</h3>
                    @can('view-'.str_slug('FaPc'))
                        <a class="btn btn-success pull-right" href="{{ url('/fa-pc/fa-pc') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $fapc->id }}</td>
                            </tr>
                            <tr><th> Designation </th><td> {{ $fapc->designation }} </td></tr><tr><th> Faisabilite Id </th><td> {{ $fapc->faisabilite_id }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

