@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Essai {{ $essai->id }}</h3>
                    @can('view-'.str_slug('Essai'))
                        <a class="btn btn-success pull-right" href="{{ url('/essai/essai') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $essai->id }}</td>
                            </tr>
                            <tr><th> Parametre </th><td> {{ $essai->parametre }} </td></tr><tr><th> Methode </th><td> {{ $essai->methode }} </td></tr><tr><th> Analyse Id </th><td> {{ $essai->analyse_id }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

