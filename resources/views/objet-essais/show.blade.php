@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Objet Essai N° {{ $objetessai->id }} :  {{ $objetessai->designation }}</h3>
                    @can('view-'.str_slug('ObjetEssai'))
                        <a class="btn btn-success pull-right" href="{{ url('/objet-essais/objet-essais') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <!-- <tr>
                                <th>ID</th>
                                <td>{{ $objetessai->id }}</td>
                            </tr> -->
                            <tr><th> Code </th><td> {{ $objetessai->code }} </td></tr>
                            <tr><th> Client </th><td> {{ $objetessai->company_name }} </td></tr>
                            <tr><th> Fabricant </th><td> {{ $objetessai->fabricant }} </td></tr>
                            <tr><th> Designation </th><td> {{ $objetessai->designation }} </td></tr>
                            <tr><th> Molecules </th>

                              @foreach($molecule as $mole)
                              <td>{{ $mole->molecule }}</td>
                              <td>{{ $mole->dosage }}</td>

                              @endforeach

                            </tr>

                            <tr><th> Forme Galenique </th><td> {{ $objetessai->forme_galenique }} </td></tr>
                            <tr><th> Date de Recept. </th><td> {{ $objetessai->date_recue }} </td></tr>
                            <tr><th> Motif </th><td> {{ $objetessai->motif }} </td></tr>
                            <tr><th> Num. Lot </th><td> {{ $objetessai->lot }} </td></tr>
                            <tr><th> Lieu de Prelevement </th><td> {{ $objetessai->provenance }} </td></tr>
                            <tr><th> Action </th>
                              <td>
                                <a class="btn btn-success pull-center" href="{{ url('/faisabilite/faisabilite/create'.'?code='.$objetessai->code) }}">Faisabilite</a>
                              @if($objetessai->motif == 'spm' || $objetessai->motif == 'Surveillance Post Marketing')

                                <a class="btn btn-success pull-center" href="{{ url('screening/screening/create'.'?code='.$objetessai->code) }}">
                                    <i class="icon-arrow-up-circle" aria-hidden="true"></i> Screening</a>

                              @endif
                              </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
