@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">FaEquipement {{ $faequipement->id }}</h3>
                    @can('view-'.str_slug('FaEquipement'))
                        <a class="btn btn-success pull-right" href="{{ url('/fa-equipement/fa-equipement') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $faequipement->id }}</td>
                            </tr>
                            <tr><th> Faisabilite Id </th><td> {{ $faequipement->faisabilite_id }} </td></tr><tr><th> Equipement </th><td> {{ $faequipement->equipement }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

