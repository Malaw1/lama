@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="white-box">
                <div class="table-responsive">
                    <table class="table product-overview" id="myTable">
                        <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Order ID</th>
                            <th>Photo</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Steave Jobs</td>
                            <td>#85457898</td>
                            <td> <img src="{{asset('plugins/images/chair.jpg')}}" alt="iMac" width="80"> </td>
                            <td>Rounded Chair</td>
                            <td>20</td>
                            <td>10-7-2017</td>
                            <td> <span class="label label-success font-weight-100">Paid</span> </td>
                            <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
                        </tr>
                        <tr>
                            <td>Varun Dhavan</td>
                            <td>#95457898</td>
                            <td> <img src="{{asset('plugins/images/chair2.jpg')}}" alt="iPhone" width="80"> </td>
                            <td>Wooden Chair</td>
                            <td>25</td>
                            <td>09-7-2017</td>
                            <td> <span class="label label-warning font-weight-100">Pending</span> </td>
                            <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
                        </tr>
                        <tr>
                            <td>Ritesh Desh</td>
                            <td>#68457898</td>
                            <td> <img src="{{asset('plugins/images/chair3.jpg')}}" alt="apple_watch" width="80"> </td>
                            <td>Gray Chair</td>
                            <td>12</td>
                            <td>08-7-2017</td>
                            <td> <span class="label label-success font-weight-100">Paid</span> </td>
                            <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
                        </tr>
                        <tr>
                            <td>Hrithik</td>
                            <td>#45457898</td>
                            <td> <img src="{{asset('plugins/images/chair4.jpg')}}" alt="mac_mouse" width="80"> </td>
                            <td>Pure Wooden chair</td>
                            <td>18</td>
                            <td>02-7-2017</td>
                            <td> <span class="label label-danger font-weight-100">Failed</span> </td>
                            <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
                        </tr>
                        <tr>
                            <td>Genelia Jobs</td>
                            <td>#65257898</td>
                            <td> <img src="{{asset('plugins/images/chair.jpg')}}" alt="iMac" width="80"> </td>
                            <td>Globe Rounded Chair</td>
                            <td>25</td>
                            <td>08-7-2017</td>
                            <td> <span class="label label-success font-weight-100">Paid</span> </td>
                            <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
                        </tr>
                        <tr>
                            <td>Sonu Nigam</td>
                            <td>#15457898</td>
                            <td> <img src="{{asset('plugins/images/chair2.jpg')}}" alt="iPhone" width="80"> </td>
                            <td>Gold Wooden Chair</td>
                            <td>15</td>
                            <td>06-7-2017</td>
                            <td> <span class="label label-warning font-weight-100">Pending</span> </td>
                            <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
                        </tr>
                        <tr>
                            <td>Pawan Trivedi</td>
                            <td>#56457898</td>
                            <td> <img src="{{asset('plugins/images/chair3.jpg')}}" alt="apple_watch" width="80"> </td>
                            <td>Still Gray Chair</td>
                            <td>11</td>
                            <td>05-7-2017</td>
                            <td> <span class="label label-success font-weight-100">Paid</span> </td>
                            <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
                        </tr>
                        <tr>
                            <td>Ranbir kapoor</td>
                            <td>#35457898</td>
                            <td> <img src="{{asset('plugins/images/chair4.jpg')}}" alt="mac_mouse" width="80"> </td>
                            <td>Comfirtable chair</td>
                            <td>28</td>
                            <td>01-7-2017</td>
                            <td> <span class="label label-danger font-weight-100">Failed</span> </td>
                            <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--row -->
        @include('layouts.partials.right-sidebar')
    </div>
@endsection

@push('js')
    <script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
    <script>
        $(function() {
            $('#myTable').DataTable();

            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });

        });
    </script>
@endpush