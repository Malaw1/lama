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
                    <h3 class="box-title pull-left">Activity Log</h3>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="row">
                        <div class="panel panel-primary ">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered width100" id="myTable" >
                                        <thead>
                                        <tr class="filters">
                                            <th>UserID</th>
                                            <th>User Name</th>
                                            <th>Description</th>
                                            <th>Created At</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
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
    <script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script>
        $(function() {
            var table = $('#myTable').DataTable({
                "order": [[3, "desc"]],
                processing: true,
                serverSide: true,
                ajax: '/activity-log/data',
                columns: [
                    { data: 'causer_id', name: 'causer_id' },
                    { data: 'log_name', name: 'log_name' },
                    { data: 'description', name: 'description' },
                    { data: 'created_at', name:'created_at'}
                ]
            });
        });
    </script>
@endpush