@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Client {{ $client->id }}</h3>
                    @can('view-'.str_slug('Client'))
                        <a class="btn btn-success pull-right" href="{{ url('/client/client') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $client->id }}</td>
                            </tr>
                            <tr><th> Company Name </th><td> {{ $client->company_name }} </td></tr><tr><th> Adresse </th><td> {{ $client->adresse }} </td></tr><tr><th> Telephone </th><td> {{ $client->telephone }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

