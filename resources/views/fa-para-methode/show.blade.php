@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">FaParaMethode {{ $faparamethode->id }}</h3>
                    @can('view-'.str_slug('FaParaMethode'))
                        <a class="btn btn-success pull-right" href="{{ url('/fa-para-methode/fa-para-methode') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $faparamethode->id }}</td>
                            </tr>
                            <tr><th> Parametre </th><td> {{ $faparamethode->parametre }} </td></tr><tr><th> Methode </th><td> {{ $faparamethode->methode }} </td></tr><tr><th> Faisabilite Id </th><td> {{ $faparamethode->faisabilite_id }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

