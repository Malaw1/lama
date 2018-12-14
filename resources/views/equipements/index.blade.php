@extends('layouts.master')
@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- /row -->
        <div class="row">

            <div class="col-sm-12">
                <div class="white-box">
                        <a href="{{url('equipements/create')}}" class="btn btn-primary">Ajouter Reactif</a>
                    <h3 class="box-title m-b-0">Tableau des Reactifs</h3>
                    <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                        <th>ID</th>
                                        <th>Appareil</th>
                                        <th>Code</th>
                                        <th>Fabricant</th>
                                        <th>Type</th>
                                        <th>Serie</th>
                                        <th>societe a Contacter</th>
                                        <th>Date Installation</th>
                                        <th>Etat</th>
                                        <th>Salle</th>
                                        <th>Commentaires</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Appareil</th>
                                        <th>Code</th>
                                        <th>Fabricant</th>
                                        <th>Type</th>
                                        <th>Serie</th>
                                        <th>societe a Contacter</th>
                                        <th>Date Installation</th>
                                        <th>Etat</th>
                                        <th>Salle</th>
                                        <th>Commentaires</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                            <tbody>
                                    @foreach ($equip as $equip)
                                    <tr>
                                    <th scope="row"><a href="{{url('equipement/show/'.$equip->id)}}">{{ $equip->id }}</a></th>
                                        <td><a href="{{url('equipement/show/'.$equip->id)}}">{{ $equip->appareil }}</a></td>
                                        <td>{{ $equip->code }}</td>
                                        <td>{{ $equip->fabricant }}</td>
                                        <td>{{ $equip->type }}</td>
                                        <td>{{ $equip->serie }}</td>
                                        <td>{{ $equip->societeContacter}}</td>
                                        <td>{{ $equip->dateInstallation }}</td>
                                        <td>{{ $equip->etat }}</td>
                                        {{-- <td>{{ $equip->documentTechDispo }}</td> --}}
                                        <td>{{ $equip->salle }}</td>
                                        <td>{{ $equip->commentaires }}</td>

                                        <td> <a href="{{url('equipement/edit/'.$equip->id)}}"><span class="glyphicon glyphicon-edit">edit</span></a> | <a href="../equipement/delete"><span class="glyphicon glyphicon-trash">del</span></a></td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        @include('layouts.partials.right-sidebar')
    </div>

@endsection

@push('js')
    <script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
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
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>

@endpush
