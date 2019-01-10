@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Demande {{ $demande->id }}</h3>
                    @can('view-'.str_slug('Demande'))
                        <a class="btn btn-success pull-right" href="{{ url('/demande/demande') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $demande->id }}</td>
                            </tr>
                            <tr><th> Molecule </th><td> {{ $demande->molecule }} </td></tr><tr><th> Client Id </th><td> {{ $demande->client_id }} </td></tr><tr><th> Date Exp </th><td> {{ $demande->date_exp }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
