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
                        <a href="{{url('objetEssai/create')}}" class="btn btn-primary">Ajouter Un nouvel Objet d'essai</a>
                    <h3 class="box-title m-b-0">Tableau des Objets d'essai</h3>
                    <br />
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <th>ID</th>
                                <th>Designation</th>
                                <th>Date Recue</th>
                                <th>Qte Recue</th>
                                <th>Forme Galenique</th>
                                <th>Fabricant</th>
                                <th>lot</th>
                                <th>date Fab.</th>
                                <th>date de Perem.</th>
                                <th>Actions</th>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Designation</th>
                                <th>Date Recue</th>
                                <th>Qte Recue</th>
                                <th>Forme Galenique</th>
                                <th>Fabricant</th>
                                <th>lot</th>
                                <th>date Fab.</th>
                                <th>date de Perem.</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($objet as $objet)
                                <tr>
                                <th scope="row"><a href="{{url('echantillons/show/'.$objet->id)}}">{{ $objet->id }}</a></th>
                                    <td><a href="{{url('reactifs/show/'.$objet->id)}}">{{ $objet->designation }}</a></td>
                                    <td>{{ $objet->dateRecue }}</td>
                                    <td>{{ $objet->qtRecue }}</td>
                                    <td>{{ $objet->formeGalenique }}</td>
                                    <td>{{ $objet->fabricant }}</td>
                                    <td>{{ $objet->lot }}</td>
                                    <td>{{ $objet->dateFab }}</td>
                                    <td>{{ $objet->dateExp }}</td>
                                    <td> <a href="{{$objet->id}}"><span class="glyphicon glyphicon-edit">edit</span></a> | <a href="/delete"><span class="glyphicon glyphicon-trash">del</span></a></td>
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
