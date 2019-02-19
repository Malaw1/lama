@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">RapportFrontal {{ $rapportfrontal->id }}</h3>
                    @can('view-'.str_slug('RapportFrontal'))
                        <a class="btn btn-success pull-right" href="{{ url('/rapportFrontal/rapport-frontal') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $rapportfrontal->id }}</td>
                            </tr>
                            <tr><th> Molecule </th><td> {{ $rapportfrontal->molecule }} </td></tr><tr><th> Rf Inf 5 </th><td> {{ $rapportfrontal->rf_inf_5 }} </td></tr><tr><th> Rf Inf 10 </th><td> {{ $rapportfrontal->rf_inf_10 }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

