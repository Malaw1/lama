@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Methode {{ $methode->id }}</h3>
                    @can('view-'.str_slug('Methode'))
                        <a class="btn btn-success pull-right" href="{{ url('/methode/methode') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $methode->id }}</td>
                            </tr>
                            <tr><th> Methode </th><td> {{ $methode->methode }} </td></tr><tr><th> Parametre Id </th><td> {{ $methode->parametre_id }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

