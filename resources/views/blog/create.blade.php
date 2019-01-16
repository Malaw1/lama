@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/switchery/dist/switchery.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('plugins/components/summernote/summernote.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet">
    <style>
        select.form-control {
            -webkit-appearance: none;
            -moz-appearance: none;
            background-position: right 50%;
            background-repeat: no-repeat;
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAMCAYAAABSgIzaAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBNYWNpbnRvc2giIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NDZFNDEwNjlGNzFEMTFFMkJEQ0VDRTM1N0RCMzMyMkIiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NDZFNDEwNkFGNzFEMTFFMkJEQ0VDRTM1N0RCMzMyMkIiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo0NkU0MTA2N0Y3MUQxMUUyQkRDRUNFMzU3REIzMzIyQiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo0NkU0MTA2OEY3MUQxMUUyQkRDRUNFMzU3REIzMzIyQiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PuGsgwQAAAA5SURBVHjaYvz//z8DOYCJgUxAf42MQIzTk0D/M+KzkRGPoQSdykiKJrBGpOhgJFYTWNEIiEeAAAMAzNENEOH+do8AAAAASUVORK5CYII=);
            padding-right: 1.5em
        }

        .note-toolbar-wrapper {
            height: 50px !important;
            text-align: center;
        }

        .note-toolbar-wrapper .note-toolbar {
            background-color: #bfc5cf !important;
        }

        .note-btn-group .btn-default {
            background: #ffffff;
            border: 2px solid #ffffff;
        }

        .note-editor.note-frame {
            margin-bottom: 0px;
        }

        .help-block strong {
            color: inherit;
        }
        .checkbox label::before {
            background-color: #fff;
            border-radius: 4px;
            border: 0;
            content: none;
            display: inline-block;
            height: 23px;
            left: 0;
            margin-left: -20px;
            position: relative;
            width: auto;
            outline: 0!important;
        }
        .checkbox input[type=checkbox] {
            cursor: pointer;
            opacity: 1;
            z-index: 1;
            outline: 0!important;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    @can('add-blog')
                        <h3 class="box-title pull-left">Create Blog</h3>
                        @can('view-blog')

                            <a class="btn btn-success pull-right" href="{{url('blog')}}">
                                <i class="icon-eye"></i> &nbsp; View Blogs
                            </a>
                        @endcan
                        <div class="clearfix"></div>
                        <hr>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                @can('add-blog')
                                    <div class="row">
                                        <form class="form-horizontal" enctype="multipart/form-data" method="post"
                                              action="{{url('blog/create')}}">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <div class="col-sm-8 {{ $errors->first('title', 'has-error') }}">
                                                    <input type="text"
                                                           class="form-control"
                                                           name="title" value="{{ old('title') }}"
                                                           placeholder="Enter Blog Title"
                                                           autofocus>
                                                    @if ($errors->has('title'))
                                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                                    @endif </div>
                                                <div class="col-sm-4 {{ $errors->first('blog_category_id', 'has-error') }}">
                                                    <select class="form-control" name="blog_category_id">
                                                        <option value="">--Select Category--</option>
                                                        @foreach($blogcategory as $item)
                                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('blog_category_id'))
                                                        <span class="help-block">
                                        <strong>{{ $errors->first('blog_category_id') }}</strong>
                                    </span>
                                                    @endif </div>
                                            </div>
                                            <div class='box-body pad form-group {{ $errors->first('content', 'has-error') }}'>
                                                <div class="col-md-12">
                                                <textarea class="textarea form-control"
                                                          name="content">{{old('content')}}</textarea>
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('content', ':message') }}
                                                </strong>
                                            </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" data-role="tagsinput"
                                                           placeholder="Add tags here" value="{{old('tags')}}" name="tags">
                                                </div>
                                                <div class="col-md-3 text-right">
                                                    <button type="submit" class="btn btn-info waves-effect waves-light ">
                                                        Publish
                                                    </button>
                                                    <button type="reset" class="btn btn-danger waves-effect waves-light ">
                                                        Clear
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    @else
                        <h1 align="center">You are not authorised to View this page</h1>
                    @endcan
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
    <script src="{{asset('plugins/components/summernote/summernote.js')}}"></script>
    <script src="{{asset('plugins/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
    <script>

        @if(\Session::has('success'))
        $.toast({
            heading: 'Success!',
            position: 'top-center',
            text: '{{session()->get('success')}}',
            loaderBg: '#ff6849',
            icon: 'success',
            hideAfter: 3000,
            stack: 6
        });
        @elseif(\Session::has('error'))
        $.toast({
            heading: 'Error!',
            position: 'top-center',
            text: '{{session()->get('error')}}',
            loaderBg: '#ff6849',
            icon: 'error',
            hideAfter: 3000,
            stack: 6
        });
                @endif

        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function () {
            new Switchery($(this)[0], $(this).data());
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.form-group input[type=file]').attr("accept", "image/*");
            $('.textarea').summernote({
                placeholder: 'write content here...',
                fontNames: ['Lato', 'Arial', 'Courier New'],
                height: 300

            });
            $('body').on('click', '.btn-codeview', function (e) {

                if ($('.note-editor').hasClass("fullscreen")) {
                    var windowHeight = $(window).height();
                    $('.note-editable').css('min-height', windowHeight);
                } else {
                    $('.note-editable').css('min-height', '300px');
                }
            });
            $('body').on('click', '.btn-fullscreen', function (e) {
                setTimeout(function () {
                    if ($('.note-editor').hasClass("fullscreen")) {
                        var windowHeight = $(window).height();
                        $('.note-editable').css('min-height', windowHeight);
                    } else {
                        $('.note-editable').css('min-height', '300px');
                    }
                }, 500);

            });

            $('.note-link-url').on('keyup', function () {
                if ($('.note-link-text').val() != '') {
                    $('.note-link-btn').attr('disabled', false).removeClass('disabled');
                }
            });
        });
    </script>
@endpush