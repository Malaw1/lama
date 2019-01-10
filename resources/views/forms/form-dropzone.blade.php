@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/dropzone-master/dist/dropzone.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Dropzone </h3>
                    <p class="text-muted m-b-30"> For multiple file upload</p>
                    <form action="#" class="dropzone">
                        <div class="fallback">
                            <input name="file" type="file" multiple /> </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
        @include('layouts.partials.right-sidebar')
    </div>
@endsection

@push('js')
    <script src="{{asset('plugins/components/dropzone-master/dist/dropzone.js')}}"></script>
@endpush
