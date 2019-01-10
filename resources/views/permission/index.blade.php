@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Permission Management</h3>
                    <a  class="btn btn-success pull-right" href="{{url('permission/create')}}"><i class="icon-plus"></i> Add Permission</a>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($permissions as $key=>$permission)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$permission->name}}</td>
                                            <th>
                                                <a class="btn btn-info btn-sm" href="{{url('permission/edit/'.$permission->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a> &nbsp;&nbsp;
                                                <a class="delete btn btn-danger btn-sm" href="{{url('permission/delete/'.$permission->id)}}"><i class="fa fa-trash-o"></i> Delete</a>

                                            </th>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.partials.right-sidebar')
    </div>
@endsection

@push('js')
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>

    <script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
    <!-- start - This is for export functionality only -->

    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function () {
            $(document).on('click','.delete',function (e) {
                if(confirm('Are you sure want to delete?'))
                {
                }
                else
                {
                    return false;
                }
            });
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
        })

        $(function() {
            $('#myTable').DataTable({
                "columns": [
                   null, null, {"orderable": false}
                   ]
            });

        });
    </script>

@endpush