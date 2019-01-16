@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/switchery/dist/switchery.min.css')}}" rel="stylesheet"/>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create Blog Category</h3>
                    @can('view-blog-category')
                        <a class="btn btn-success pull-right" href="{{url('blog-category')}}"><i class="icon-eye"></i>
                            &nbsp; View Blog Category</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            @can('add-blog-category')
                                <form class="form-horizontal" method="post" action="{{url('blog-category/create')}}">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="name" class="col-sm-3 control-label">Blog Category Title</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                   class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                                   name="title" value="{{ old('title') }}" autofocus>
                                            @if ($errors->has('title'))
                                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-b-0">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">
                                                Create
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @include('layouts.partials.right-sidebar')
    </div>
@endsection

@push('js')
    <script src="{{asset('plugins/components/switchery/dist/switchery.min.js')}}"></script>
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>

    {{--<script src="{{asset('js/toastr.js')}}"></script>--}}
    <script>

        @if(\Session::has('message'))
        $.toast({
            heading: 'Success!',
            position: 'top-center',
            text: '{{session()->get('message')}}',
            loaderBg: '#ff6849',
            icon: 'success',
            hideAfter: 3000,
            stack: 6
        });
        @endif


    </script>
@endpush