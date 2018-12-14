@extends('layouts.app')

@section('content')
<div class="container-fluid">

<div>
<a href="{{url('objetEssai/create')}}" class="btn btn-app">
            <i class="fa fa-save fa-green"></i> Nouveau CLient
        </a>
</div>
        <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Liste des CLients</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nom Commerciale</th>
                      <th>Adresse</th>
                      <th>Telephone</th>
                      <th>Email</th>
                      <th>Details</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($client as $client)
                              <tr>
                              <th scope="row"><a href="{{url('echantillons/show/'.$client->id)}}">{{ $client->id }}</a></th>
                                <td><a href="{{url('reactifs/show/'.$client->id)}}">{{ $client->companyName }}</a></td>
                                <td>{{ $client->adresse }}</td>
                                <td>{{ $client->telephone }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->details }}</td>
                               <td> <a href="{{$client->id}}"><span class="glyphicon glyphicon-edit">edit</span></a> | <a href="/delete"><span class="glyphicon glyphicon-trash">del</span></a></td>
                              </tr>
                              @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nom Commerciale</th>
                        <th>Adresse</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <th>Details</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
</div>
@endsection
