@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">TestDemande {{ $testdemande->id }}</h3>
                    @can('view-'.str_slug('TestDemande'))
                        <a class="btn btn-success pull-right" href="{{ url('/demande-test/test-demande') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $testdemande->id }}</td>
                            </tr>
                            <tr><th> Parametre </th><td> {{ $testdemande->parametre }} </td></tr><tr><th> Demande Id </th><td> {{ $testdemande->demande_id }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

