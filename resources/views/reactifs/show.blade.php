@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Reactif {{ $reactif->id }}</h3>
                    @can('view-'.str_slug('Reactif'))
                        <a class="btn btn-success pull-right" href="{{ url('/reactif/reactifs') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $reactif->id }}</td>
                            </tr>
                            <tr><th> Designation </th><td> {{ $reactif->designation }} </td></tr><tr><th> Date Recep </th><td> {{ $reactif->date_recep }} </td></tr><tr><th> Depositaire </th><td> {{ $reactif->depositaire }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

