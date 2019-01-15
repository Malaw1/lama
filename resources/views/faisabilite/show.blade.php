@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Faisabilite {{ $faisabilite->id }}</h3>
                    @can('view-'.str_slug('Faisabilite'))
                        <a class="btn btn-success pull-right" href="{{ url('/faisabilite/faisabilite') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $faisabilite->id }}</td>
                            </tr>
                            <tr><th> Reference </th><td> {{ $faisabilite->reference }} </td></tr><tr><th> Molecule </th><td> {{ $faisabilite->molecule }} </td></tr><tr><th> Objet Essai </th><td> {{ $faisabilite->objet_essai }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

