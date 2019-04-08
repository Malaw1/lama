@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Code: {{ $screening->code }} | {{ $screening->conclusion }}</h3>
                    @can('view-'.str_slug('screening'))
                        <a class="btn btn-success pull-right" href="{{ url('/screening/screening') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $screening->id }}</td>
                            </tr>
                              <tr><th> Designation </th><td> {{ $screening->designation }} </td></tr>
                              <tr><th> Code </th><td> {{ $screening->code }} </td></tr>
                              <tr><th> Dci </th><td> {{ $screening->dci }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
          <div class="white-box">
              <h3 class="box-title">Inspections Physique et Visuellle</h3>
              <div class="table-responsive">
                  <table class="table">
                      <thead>
                        <th>Fabricant</th>
                        <th>Description du prospectus: langue, lisibilite, conditions de stockage(T°C, humidite, lumiere...), mode d'emploi...)</th>
                        <th>Decrire l'emballage, l'aspect, la forme, la couleur de l'objet d'essai, et autres observations(fissures, particules etrangeres, etancheite, odeur, gout..)</th>
                      </thead>
                      <tbody>
                        <tr>
                        <td>{{ $screening->fabricant}}</td>
                        <td>{{ $screening->prospectus}}</td>
                        <td>{{ $screening->desc_physique}}</td>
                      </tr>
                      <tr>
                        <td>Conclusion</td>
                        <td colspan="2">{{$screening->ipv}}</td>
                      </tr>
                      </tbody>
                  </table>

              </div>
          </div>
        </div>


        <div class="col-sm-12">
          <div class="white-box">
              <h3 class="box-title">Identification</h3>
              <div class="table-responsive">
                  <table class="table">
                      <thead>
                      <tr>
                          <th>#</th>
                          <th>Molecule</th>
                          <th>RF<SUB>(Temoin)</SUB></th>
                          <th>RF<SUB>(Echantillon)</SUB></th>
                          <th>RF<SUB>(Erreur)</SUB></th>
                          <th>Impurete</th>
                          <th>Conclusion</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($rapportfrontal as $rap)
                      <tr>
                          <td>1</td>
                          <td>{{ $rap->molecule}}</td>
                          <td>{{ $rap->rf_temoin}}</td>
                          <td>{{ $rap->rf_echan}}</td>
                          <td>{{ $rap->rf_erreur}}</td>
                          <td>{{ $screening->impurete}}</td>
                          <td>{{ $screening->identification}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="col-sm-12">
              <div class="white-box">
                  <h3 class="box-title">Dosage</h3>
                  <div class="table-responsive">
                      <table class="table">
                          <thead>
                          <tr>
                              <th>#</th>
                              <th>Principe Actif</th>
                              <th>Teneur</th>
                              <th>Observation</th>
                              <th>Conclusion</th>
                          </tr>
                          </thead>
                          <tbody>
                            @foreach($pa as $rap)
                          <tr>
                              <td>1</td>
                              <td>{{ $rap->molecule}}</td>
                              <td>{{ $rap->teneur}}</td>
                              <td>{{ $rap->etat}}</td>
                              <td>{{ $screening->dosage}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>





    </div>
@endsection
