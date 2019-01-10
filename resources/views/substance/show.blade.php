@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Substance {{ $substance->id }}</h3>
                    @can('view-'.str_slug('Substance'))
                        <a class="btn btn-success pull-right" href="{{ url('/substance/substance') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $substance->id }}</td>
                            </tr>
                            <tr><th> Designation </th><td> {{ $substance->designation }} </td></tr><tr><th> Quantite </th><td> {{ $substance->quantite }} </td></tr><tr><th> Date Fab </th><td> {{ $substance->date_fab }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

