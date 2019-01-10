@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">ObjetEssai {{ $objetessai->id }}</h3>
                    @can('view-'.str_slug('ObjetEssai'))
                        <a class="btn btn-success pull-right" href="{{ url('/objetEssai/objet-essai') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $objetessai->id }}</td>
                            </tr>
                            <tr><th> Code </th><td> {{ $objetessai->code }} </td></tr><tr><th> Designation </th><td> {{ $objetessai->designation }} </td></tr><tr><th> Forme Galenique </th><td> {{ $objetessai->forme_galenique }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

