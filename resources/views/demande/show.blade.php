@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Demande:  {{ $demande->code }}</h3>
                    @can('view-'.str_slug('Demande'))
                        <a class="btn btn-success pull-right" href="{{ url('/demande/demande') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $demande->id }}</td>
                            </tr>
                            <tr><th> Code </th><td> {{ $demande->code }} </td></tr>
                            <tr><th> Designation </th><td> {{ $demande->designation }} </td></tr>
                            <tr><th> Client </th><td> {{ $demande->company_name }} </td></tr>
                            <tr><th> Fabricant </th><td> {{ $demande->fabricant }} </td></tr>
                            <tr><th> Nombre de Lots </th><td> {{ $demande->nombre_lot }} </td></tr>
                            <tr><th> Forme Galenique </th><td> {{ $demande->forme_galenique }} </td></tr>
                            <tr><th> Motif </th><td> {{ $demande->motif }} </td></tr>
                            <tr><th> Commentaires </th><td> {{ $demande->description }} </td></tr>
                            <tr><th>Parametres</th>
                                @foreach($param as $param)
                              <td>{{$param->parametre}}</td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
