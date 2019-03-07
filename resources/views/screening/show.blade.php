@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">screening {{ $screening->id }}</h3>
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
                            <tr><th> Designation </th><td> {{ $screening->designation }} </td></tr><tr><th> Code </th><td> {{ $screening->code }} </td></tr><tr><th> Dci </th><td> {{ $screening->dci }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
          <div class="white-box">
              <h3 class="box-title">Rapport Frontal</h3>
              <div class="table-responsive">
                  <table class="table">
                      <thead>
                      <tr>
                          <th>#</th>
                          <th>Molecule</th>
                          <th>RF < 5%</th>
                          <th>5% => RF < 10%</th>
                          <th>RF => 10%</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($rapportfrontal as $rap)
                      <tr>
                          <td>1</td>
                          <td>{{ $rap->molecule}}</td>
                          <td>{{ $rap->rf_inf_5}}</td>
                          <td>{{ $rap->rf_inf_10}}</td>
                          <td>{{ $rap->rf_sup_10}}</td>
                          <input class="form-control" name="screening" type="hidden" id="screening" value="{{ $rapportfrontal->screening or ''}}" required>

                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>



    </div>
@endsection
