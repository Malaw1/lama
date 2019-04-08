@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Analyse: </h3>
                    @can('view-'.str_slug('Essai'))
                    <a  class="btn btn-success pull-right" href="{{url('/essai/essai')}}"><i class="icon-arrow-left-circle"></i> Add Essai</a>
                    @endcan

                    <div class="clearfix"></div>
                    <hr>

                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr><th> Objet Essai </th><td> {{ $objet->code }} </td></tr>
                            <tr><th> Reference </th><td>  {{ $objet->reference }} </td></tr>
                            <tr><th> Dci </th><td> {{ $objet->dci }} </td></tr>
                            <tr><th> Etat </th><td> {{ $objet->etat }} </td></tr>

                            </tbody>
                        </table>

                    </div>

                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                              <tr>
                                @foreach($essai as $essai)
                                  <td> <a href="{{url($essai->methode.'/'.$essai->methode.'?code='.$objet->code)}}" class="btn btn-success btn-outline">{{ $essai->methode}}</a></td>
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
