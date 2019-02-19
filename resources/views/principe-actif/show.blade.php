@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">PrincipeActif {{ $principeactif->id }}</h3>
                    @can('view-'.str_slug('PrincipeActif'))
                        <a class="btn btn-success pull-right" href="{{ url('/principe-actif/principe-actif') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $principeactif->id }}</td>
                            </tr>
                            <tr><th> Molecule </th><td> {{ $principeactif->molecule }} </td></tr><tr><th> Etat </th><td> {{ $principeactif->etat }} </td></tr><tr><th> Screening </th><td> {{ $principeactif->screening }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

