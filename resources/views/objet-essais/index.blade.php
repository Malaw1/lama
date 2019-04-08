@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
          <div class="col-sm-12">
              <div class="white-box">
                <h3 class="box-title pull-left">Objet d'Essais</h3>

                <div class="clearfix"></div>
                <hr>
                  <h3 class="box-title m-b-0">Data Export</h3>
                  <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
                  <div class="table-responsive">
                      <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                          <thead>
                          <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Designation</th>
                            <th>Forme Galenique</th>
                            <th>Lot</th>
                            <th>Date Recue</th>
                            <th>Actions</th>
                          </tr>
                          </thead>
                          <tfoot>
                          <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Designation</th>
                            <th>Forme Galenique</th>
                            <th>Lot</th>
                            <th>Date Recue</th>
                            <th>Actions</th>
                          </tr>
                          </tfoot>
                          <tbody>
                            @foreach($objetessais as $item)
                                <tr>
                                    <td>{{ $loop->iteration or $item->id }}</td>
                                    <td>{{ $item->code }}</td>
                                    <td>{{ $item->designation }}</td>
                                    <td>{{ $item->forme_galenique }}</td>
                                    <td>{{ $item->lot }}</td>
                                    <td>{{ $item->date_recue }}</td>
                                    <td>
                                        @can('view-'.str_slug('ObjetEssais'))
                                            <a href="{{ url('/objet-essais/objet-essais/' . $item->code) }}"
                                               title="View ObjetEssai">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                        @endcan

                                        @can('edit-'.str_slug('ObjetEssais'))
                                            <a href="{{ url('/objet-essais/objet-essais/' . $item->code . '/edit') }}"
                                               title="Edit ObjetEssai">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </button>
                                            </a>
                                        @endcan

                                        @can('delete-'.str_slug('ObjetEssais'))
                                            <form method="POST"
                                                  action="{{ url('/objet-essais/objet-essais' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete ObjetEssai"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        @endcan


                                    </td>
                                </tr>
                            @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
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
            "displayLength": 10000,
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
