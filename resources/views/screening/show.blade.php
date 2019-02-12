@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">screening {{ $screening->id }}</h3>
                    @can('view-'.str_slug('screening'))
                        <a class="btn btn-success pull-right" href="{{ url('/screening/screening') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $screening->id }}</td>
                            </tr>
                            <tr><th> Designation </th><td> {{ $screening->designation }} </td></tr><tr><th> Code </th><td> {{ $screening->code }} </td></tr><tr><th> Dci </th><td> {{ $screening->dci }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

