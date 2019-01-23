@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Faisabilite {{ $faisabilite->id }}</h3>
                    @can('view-'.str_slug('Faisabilite'))
                        <a class="btn btn-success pull-right" href="{{ url('/faisabilite/faisabilite') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
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
                            <td>{{ $key->appareil}}</td>
                          @endforeach
                        </tr>
                        <tr>
                          <th>Consommables</th>:
                          @foreach ($cons as $key)
                            <td>{{ $key->designation}}</td>
                          @endforeach
                        </tr>
                        <tr>
                          <th>Reactifs</th>:
                          @foreach ($reactif as $key)
                            <td>{{ $key->reactif}}</td>
                          @endforeach
                        </tr>
                        <tr>
                          <th>status</th>:
                            <td colspan="7">{{ $faisabilite->etat}}</td>
                        </tr>
                        <tr>
                          <th>Conclusion</th>:
                          <td><p>Les Produits Chimiques suivants ne sont pas dans votre stock: </p></td>
                          @foreach($err as $err)
                            <td>{{ $err->designation}}</td>
                            @endforeach
                        </tr>

                        <tr>
                          <th>Revue de Contrat</th>:
                            @if($err == null)
                            <td>
                              <a class="btn btn-success pull-right" href="">
                                  <i class="icon-arrow-left-circle" aria-hidden="true"></i> Revue de Contrat</a></td>
                            @endif
                        </tr>
                        </tbody>

                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
