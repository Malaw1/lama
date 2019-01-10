@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Hplc {{ $hplc->id }}</h3>
                    @can('view-'.str_slug('Hplc'))
                        <a class="btn btn-success pull-right" href="{{ url('/hplc/hplc') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $hplc->id }}</td>
                            </tr>
                            <tr><th> Equipement </th><td> {{ $hplc->equipement }} </td></tr><tr><th> Balance </th><td> {{ $hplc->balance }} </td></tr><tr><th> PHmetre </th><td> {{ $hplc->pHmetre }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

