@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">FaMolecule {{ $famolecule->id }}</h3>
                    @can('view-'.str_slug('FaMolecule'))
                        <a class="btn btn-success pull-right" href="{{ url('/fa-molecule/fa-molecule') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $famolecule->id }}</td>
                            </tr>
                            <tr><th> Molecule </th><td> {{ $famolecule->molecule }} </td></tr><tr><th> Dosage </th><td> {{ $famolecule->dosage }} </td></tr><tr><th> Faisabilite Id </th><td> {{ $famolecule->faisabilite_id }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

