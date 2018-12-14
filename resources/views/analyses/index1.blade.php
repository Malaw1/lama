@extends('layouts.master')

@push('css')
<style>
        input{
            display: block;
            }

        </style>
@endpush

@section('content')
<div class="tale">
<table id="example23" class="display nowrap" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Code</th>
        <th>Objet d'essai</th>
        <th>DCI: </th>
        <th>Referece Essai</th>
        <th>Dosage</th>
        <th>Lot</th>
        <th>Peremptio</th>
    </tr>
    </thead>
    <tbody>
        {{-- @foreach($essai as $essai)
            <td>{{ $essai->code}}</td>
            <td>{{ $essai->objetessai}}</td>
            <td>{{ $essai->dci}}</td>
            <td>{{ $essai->dosage}}</td>
            <td>{{ $essai->lot}}</td>
            <td>{{ $essai->Peremptio}}</td>
        @endforeach --}}
    </tbody>
</table>
<hr />
</div>

        <div class="col-md-6">
            @include("methodes.essais");
        </div>
        <div class="col-md-6">
            @include("methodes.pesage");
        </div>
        <div class="col-md-6">
            @include("methodes.uv");
        </div>
@endsection

@push('js')
    <script src="{{asset('js/db1.js')}}"></script>

    <script>
            (function() {
                var counter = 0;
                var btn = document.getElementById('btn');
                var form = document.getElementById('form');
                var addInput = function() {
                    counter++;
                    var input = document.createElement("input");
                    input.id = 'input-' + counter;
                    input.type = 'text';
                    input.name = 'name';
                    input.placeholder = 'Input number ' + counter;
                    form.appendChild(input);
                };
                btn.addEventListener('click', function() {
                    addInput();
                }.bind(this));
                })();

            </script>

@endpush
