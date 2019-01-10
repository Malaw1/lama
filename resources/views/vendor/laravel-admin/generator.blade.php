@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{url('/plugins/components/bootstrap-select/bootstrap-select.min.css')}}">
    {{--<link rel="stylesheet" href="{{url('/plugins/components/fontawesome-iconpicker/fontawesome-iconpicker.min.css')}}">--}}
    <style>

        .btn-default {
            background-color: #fff !important;
            border: 1px solid #e5ebec !important;
            border-radius: 0;
            box-shadow: none;
            color: #565656;
            outline: none;
            height: 38px;
            max-width: 100%;
            padding: 7px 12px;
            transition: all 300ms linear 0s;
        }

        select.form-control {
            -webkit-appearance: none;
            -moz-appearance: none;
            background-position: right 50%;
            background-repeat: no-repeat;
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAMCAYAAABSgIzaAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBNYWNpbnRvc2giIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NDZFNDEwNjlGNzFEMTFFMkJEQ0VDRTM1N0RCMzMyMkIiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NDZFNDEwNkFGNzFEMTFFMkJEQ0VDRTM1N0RCMzMyMkIiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo0NkU0MTA2N0Y3MUQxMUUyQkRDRUNFMzU3REIzMzIyQiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo0NkU0MTA2OEY3MUQxMUUyQkRDRUNFMzU3REIzMzIyQiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PuGsgwQAAAA5SURBVHjaYvz//z8DOYCJgUxAf42MQIzTk0D/M+KzkRGPoQSdykiKJrBGpOhgJFYTWNEIiEeAAAMAzNENEOH+do8AAAAASUVORK5CYII=);
            padding-right: 1.5em
        }

        .entry .form-control {
            margin-right: 20px;
        }

        .form-group.row label {
            line-height: 2.5;
        }

        .help-block.error {
            color: #dc0000;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title">CRUD Generator</h3>
                    <hr>
                    <form class="form-horizontal" method="post" action="{{ url('/crud-generator') }}">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="crud_name" class="col-md-4 col-form-label text-right">Name:</label>
                            <div class="col-md-6">
                                <input type="text" required name="crud_name" value="{{old('crud_name')}}"
                                       class="form-control" id="crud_name" placeholder="Eg. Book, Category, Author">
                                <p class="help-block">Provide a class name (singular and first letter caps) for the CRUD Model</p>
                                @if ($errors->has('crud_name'))
                                    <span class="help-block error">
                                        <strong>{{ $errors->first('crud_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="view_path" class="col-md-4 col-form-label text-right">View Group/Directory:</label>
                            <div class="col-md-6">
                                <input type="text" value="{{old('view_path')}}" name="view_path" class="form-control"
                                       id="view_path" placeholder="Eg. book, category, author">
                                <p class="help-block">Provide a directory name (singular and lowercase) for the CRUD Views</p>
                                @if ($errors->has('view_path'))
                                    <span class="help-block error">
                                        <strong>{{ $errors->first('view_path') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="controller_namespace" class="col-md-4 col-form-label text-right">Controller Group/Namespace:</label>
                            <div class="col-md-6">
                                <input type="text" value="{{old('controller_namespace')}}" name="controller_namespace"
                                       class="form-control" id="controller_namespace" placeholder="Eg. Admin, User, Api">
                                <p class="help-block">Provide a group name (Namespace) for the CRUD Controller</p>
                                @if ($errors->has('controller_namespace'))
                                    <span class="help-block error">
                                        <strong>{{ $errors->first('controller_namespace') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="route_group" class="col-md-4 col-form-label text-right">URL Group/Prefix:</label>
                            <div class="col-md-6">
                                <input type="text" value="{{old('route_group')}}" name="route_group"
                                       class="form-control" id="route_group" placeholder="Eg. book, category, author">
                                <p class="help-block">Provide a url prefix (URL Friendly) for the CRUD Routes</p>
                                @if ($errors->has('route_group'))
                                    <span class="help-block error">
                                        <strong>{{ $errors->first('route_group') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <legend>Menu</legend>
                        <div class="form-group row">
                            <label for="route" class="col-md-4 col-form-label text-right">Generate routes and sidebar menu?</label>
                            <div class="col-md-6">
                                <select name="route" class="form-control" id="route">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                                @if ($errors->has('route'))
                                    <span class="help-block error">
                                        <strong>{{ $errors->first('route') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="menu_icon" class="col-md-4 col-form-label text-right">Menu Icon:</label>
                            <div class="col-md-6">
                                <button data-rows="5" data-cols="10" class="btn btn-default" id="menu_ico"
                                        name="menu_icon" role="iconpicker"></button>
                                @if ($errors->has('menu_icon'))
                                    <span class="help-block error">
                                        <strong>{{ $errors->first('menu_icon') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <legend>Schema</legend>
                        <p class="text-center"><b>Note</b>: Id (Primary key and Auto increment), created_at, and updated at will be added by default.</p>
                        <div class="form-group table-fields">
                            <div class="entry col-md-10 col-md-offset-1 form-inline text-center">
                                <input required class="form-control" name="fields[]" type="text"
                                       placeholder="field_name">
                                <select name="fields_type[]" class="form-control">
                                    <option value="string">string</option>
                                    <option value="char">char</option>
                                    <option value="varchar">varchar</option>
                                    <option value="password">password</option>
                                    <option value="email">email</option>
                                    <option value="date">date</option>
                                    <option value="datetime">datetime</option>
                                    <option value="time">time</option>
                                    <option value="timestamp">timestamp</option>
                                    <option value="text">text</option>
                                    <option value="mediumtext">mediumtext</option>
                                    <option value="longtext">longtext</option>
                                    <option value="json">json</option>
                                    <option value="jsonb">jsonb</option>
                                    <option value="binary">binary</option>
                                    <option value="number">number</option>
                                    <option value="integer">integer</option>
                                    <option value="bigint">bigint</option>
                                    <option value="mediumint">mediumint</option>
                                    <option value="tinyint">tinyint</option>
                                    <option value="smallint">smallint</option>
                                    <option value="boolean">boolean</option>
                                    <option value="decimal">decimal</option>
                                    <option value="double">double</option>
                                    <option value="float">float</option>
                                </select>

                                <label>Required</label>
                                <select name="fields_required[]" class="form-control">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>

                                <button class="btn btn-success btn-add inline" type="button">
                                    <span class="fa fa-plus"></span>
                                </button>
                            </div>
                        </div>
                        @if ($errors->has('fields'))
                            <span class="help-block error">
                                <strong>{{ $errors->first('fields') }}</strong>
                            </span>
                        @endif

                        <legend>Advance</legend>
                        <div class="form-group row">
                            <label for="relationships" class="col-md-4 col-form-label text-right">Relationships</label>
                            <div class="col-md-6">
                                <input type="text" value="{{old('relationships')}}" name="relationships"
                                       class="form-control" id="relationships"
                                       placeholder="Eg category#belongsTo#App\Category;author#belongsTo#App\Author">
                                <p class="help-block">List relationships as method#relationType#Model;</p>
                                @if ($errors->has('relationships'))
                                    <span class="help-block error">
                                        <strong>{{ $errors->first('relationships') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="soft_deletes" class="col-md-4 col-form-label text-right">Soft deletes?</label>
                            <div class="col-md-6">
                                <select name="soft_deletes" class="form-control" id="soft_deletes">
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="form_helper" class="col-md-4 col-form-label text-right">Forms using</label>
                            <div class="col-md-6">
                                <select name="form_helper" class="form-control" id="form_helper">
                                    <option value="laravelcollective">laravelcollective</option>
                                    <option value="html">html</option>
                                </select>
                                @if ($errors->has('form_helper'))
                                    <span class="help-block error">
                                        <strong>{{ $errors->first('form_helper') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" name="generate">Generate</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        @include('layouts.partials.right-sidebar')
    </div>
@endsection

@push('js')
    <script src="{{url('/plugins/components/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {

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


            $(document).on('click', '.btn-add', function (e) {
                e.preventDefault();

                var tableFields = $('.table-fields'),
                    currentEntry = $(this).parents('.entry:first'),
                    newEntry = $(currentEntry.clone()).appendTo(tableFields);

                newEntry.find('input').val('');
                tableFields.find('.entry:not(:last) .btn-add')
                    .removeClass('btn-add').addClass('btn-remove')
                    .removeClass('btn-success').addClass('btn-danger')
                    .html('<span class="fa fa-minus"></span>');
            }).on('click', '.btn-remove', function (e) {
                $(this).parents('.entry:first').remove();

                e.preventDefault();
                return false;
            });

        });
    </script>
@endpush
