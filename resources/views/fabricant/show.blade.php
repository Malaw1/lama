@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Fabricant {{ $fabricant->id }}</h3>
                    @can('view-'.str_slug('Fabricant'))
                        <a class="btn btn-success pull-right" href="{{ url('/fabricant/fabricant') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $fabricant->id }}</td>
                            </tr>
                            <tr><th> Company Name </th><td> {{ $fabricant->company_name }} </td></tr><tr><th> Adresse </th><td> {{ $fabricant->adresse }} </td></tr><tr><th> Telephone </th><td> {{ $fabricant->telephone }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

