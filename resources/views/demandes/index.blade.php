@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <p> {{ $id->id}} </p>

    <p> {{ $date->date}} </p>
</div>
@endsection
