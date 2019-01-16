@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Faisabilite N°: {{ $faisabilite->id }} | {{ $faisabilite->status}}</h3>
                    @can('view-'.str_slug('Faisabilite'))
                        <a class="btn btn-success pull-right" href="{{ url('/faisabilite/faisabilite') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Retour</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th><td>{{ $faisabilite->id }}</td>
                                <th> Reference </th><td> {{ $faisabilite->reference }} </td>
                                <th> Molecule </th><td> {{ $faisabilite->molecule }} </td>
                                <th> Objet Essai </th><td> {{ $faisabilite->code }} </td>
                            </tr>
                            <tr>
                              <th>Parametre</th>:
                              @foreach ($params as $key)
                                <td>{{ $key->parametre}}</td>
                              @endforeach
                            </tr>
                            <tr>
                              <th>Methodes</th>:
                              @foreach ($methode as $key)
                                <td>{{ $key->methode}}</td>
                              @endforeach
                            </tr>
                            <tr>
                              <th>Equipements</th>:
                              @foreach ($equip as $key)
                                <td>{{ $key->equipement}}</td>
                              @endforeach
                            </tr>
                            <tr>
                              <th>Consommables</th>:
                              @foreach ($cons as $key)
                                <td>{{ $key->consommable}}</td>
                              @endforeach
                            </tr>
                            <tr>
                              <th>Produits Chimiques</th>:
                              @foreach ($pc as $key)
                                <td>{{ $key->designation}}</td>
                              @endforeach
                            </tr>
                            <tr>
                              <th>status</th>:
                                <td colspan="7">{{ $faisabilite->status}}</td>
                            </tr>
                            <tr>
                              <th>Conclusion</th>:
                              <td><p>Les Produits Chimiques suivants ne sont pas dans votre stock: </p></td>
                              @foreach($err as $err)
                                <td>{{ $err->designation}}</td>
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
