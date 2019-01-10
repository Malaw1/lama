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
                    <h3 class="box-title pull-left">Faisabilite</h3>
                    @can('add-'.str_slug('Faisabilite'))
                        <a class="btn btn-success pull-right" href="{{ url('/faisabilite/faisabilite/create') }}"><i
                                    class="icon-plus"></i> Add Faisabilite</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-borderless" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Reference</th><th>Objet Essai</th><th>Molecule</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($faisabilite as $item)
                                <tr>
                                    <td>{{ $loop->iteration or $item->id }}</td>
                                    <td>{{ $item->reference }}</td>
                                    <td>

                                            <form action="{{  route('analyse.create')}}" method="GET">
                                                    {{ csrf_field() }}
                                                <input type="hidden"   value="{{ $item->reference }}" name="ref">
                                                <input type="hidden"   value="{{ $item->objet_essai }}" name="objet">
                                                <input type="hidden"   value="{{ $item->molecule }}" name="codeMolecule">
                                                <button type="submit" class="btn btn-block btn-info">{{ $item->objet_essai }}</button>
                                            </form>
                                    </td>
                                    
                                    <td>{{ $item->molecule }}</td>
                                    <td>
                                        @can('view-'.str_slug('Faisabilite'))
                                            <a href="{{ url('/faisabilite/faisabilite/' . $item->id) }}"
                                               title="View Faisabilite">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                        @endcan

                                        @can('edit-'.str_slug('Faisabilite'))
                                            <a href="{{ url('/faisabilite/faisabilite/' . $item->id . '/edit') }}"
                                               title="Edit Faisabilite">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"> </i> Edit
                                                </button>
                                            </a>
                                        @endcan

                                        @can('delete-'.str_slug('Faisabilite'))
                                            {!! Form::open([
                                       'method'=>'DELETE',
                                       'url' => ['/faisabilite/faisabilite', $item->id],
                                       'style' => 'display:inline'
                                   ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-sm',
                                                    'title' => 'Delete Faisabilite',
                                                    'onclick'=>'return confirm("Confirm delete?")'
                                            )) !!}
                                        @endcan
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $faisabilite->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection



@push('js')
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>

    <script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
    <!-- start - This is for export functionality only -->
    <!-- end - This is for export functionality only -->
    <script>
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
        })

        $(function () {
            $('#myTable').DataTable({
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }]
            });

        });
    </script>

@endpush