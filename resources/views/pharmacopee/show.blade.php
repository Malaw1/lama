@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Pharmacopee {{ $pharmacopee->id }}</h3>
                    @can('view-'.str_slug('Pharmacopee'))
                        <a class="btn btn-success pull-right" href="{{ url('/pharmacopee/pharmacopee') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $pharmacopee->id }}</td>
                            </tr>
                            <tr><th> Pharmacopee </th><td> {{ $pharmacopee->pharmacopee }} </td></tr><tr><th> Lien </th><td> {{ $pharmacopee->lien }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

