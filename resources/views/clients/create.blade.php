@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">

                <div class="col-md-3"></div>
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                    <h3 class="box-title">Enregistrement d'un nouveau <strong>Client</strong></h3>
                    </div>

                    <form action="{{ route('clients.store')}}" method="POST" role="form">
                            {{ csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nom Commercial</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="companyName" placeholder="Nom du Produit">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Adresse</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="adresse" placeholder="Date de Reception">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">N° Telephone</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="telephone" placeholder="Quantite Recue">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="email" class="form-control" id="exampleInputPassword1" name="email" placeholder="Date de Reception">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Details</label>
                                <textarea type="text" class="form-control" id="exampleInputPassword1" name="details" placeholder="Description du client..."></textarea>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary form-control" value="Enregistrer" />
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

