@extends('layouts.master')

@push('css')
<style>
        input{
            display: block;
            }

        </style>
@endpush

@section('content')
<h2 class="title">Tableau des Analyses en cours</h2>
<hr />
<div class="table">
<table class="table table-striped">
        <thead>
          <tr>
            <th scope="col" >#</th>
            <th scope="col">Code</th>
            <th scope="col">Objet d'essai</th>
            <th scope="col">DCI: </th>
            <th scope="col">Reference Essai</th>
            <th scope="col">Dosage</th>
            <th scope="col">Lot</th>
            <th scope="col">Peremptio</th>
          </tr>
        </thead>
        <tbody>
          <tr>
                @foreach($essai as $essai)
                <tr scope="row">
                   <td><a href="#">{{ $essai->id}} </a></td>
                   <td><a href="#">{{ $essai->code}} </a></td>
                   <td>{{ $essai->objetessai}}</td>
                   <td>{{ $essai->dci}}</td>
                   <td>{{ $essai->reference}}</td>
                   <td>{{ $essai->dosage}}</td>
                   <td>{{ $essai->lot}}</td>
                   <td>{{ $essai->peremption}}</td>
                </tr>
               @endforeach
          </tr>

        </tbody>
      </table>
<hr />
</div>
@endsection
