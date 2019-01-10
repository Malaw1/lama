@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">SpectroUv {{ $spectrouv->id }}</h3>
                    @can('view-'.str_slug('SpectroUv'))
                        <a class="btn btn-success pull-right" href="{{ url('/spectro-uv/spectro-uv') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $spectrouv->id }}</td>
                            </tr>
                            <tr><th> Equipement </th><td> {{ $spectrouv->equipement }} </td></tr><tr><th> Longueure Onde </th><td> {{ $spectrouv->longueure_onde }} </td></tr><tr><th> Blanc </th><td> {{ $spectrouv->blanc }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

