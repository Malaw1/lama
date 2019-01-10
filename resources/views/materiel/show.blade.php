@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Materiel {{ $materiel->id }}</h3>
                    @can('view-'.str_slug('Materiel'))
                        <a class="btn btn-success pull-right" href="{{ url('/materiel/materiel') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $materiel->id }}</td>
                            </tr>
                            <tr><th> Designation </th><td> {{ $materiel->designation }} </td></tr><tr><th> Type </th><td> {{ $materiel->type }} </td></tr><tr><th> Fabricant </th><td> {{ $materiel->fabricant }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

