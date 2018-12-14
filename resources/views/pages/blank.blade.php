@extends('layouts.master')

@push('css')
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">Blank Page</h3> </div>
        </div>
    </div>
    @include('layouts.partials.right-sidebar')
</div>
@endsection

@push('js')
@endpush