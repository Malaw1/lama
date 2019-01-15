@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Equipement {{ $equipement->id }}</h3>
                    @can('view-'.str_slug('Equipement'))
                        <a class="btn btn-success pull-right" href="{{ url('/equipement/equipement') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $equipement->id }}</td>
                            </tr>
                            <tr><th> Code </th><td> {{ $equipement->code }} </td></tr><tr><th> Appareil </th><td> {{ $equipement->appareil }} </td></tr><tr><th> Fabricant </th><td> {{ $equipement->fabricant }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

