@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">EqQualif {{ $eqqualif->id }}</h3>
                    @can('view-'.str_slug('EqQualif'))
                        <a class="btn btn-success pull-right" href="{{ url('/eq-qualif/eq-qualif') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $eqqualif->id }}</td>
                            </tr>
                            <tr><th> Equipement </th><td> {{ $eqqualif->equipement }} </td></tr><tr><th> Date Calib </th><td> {{ $eqqualif->date_calib }} </td></tr><tr><th> Next Calib </th><td> {{ $eqqualif->next_calib }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

