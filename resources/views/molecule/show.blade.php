@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Molecule {{ $molecule->id }}</h3>
                    @can('view-'.str_slug('Molecule'))
                        <a class="btn btn-success pull-right" href="{{ url('/molecule/molecule') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $molecule->id }}</td>
                            </tr>
                            <tr><th> Molecule </th><td> {{ $molecule->molecule }} </td></tr><tr><th> Objet Essai </th><td> {{ $molecule->objet_essai }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

