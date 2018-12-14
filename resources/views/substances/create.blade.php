@extends('layouts.master')

@section('content')
<div class="container-fluid">
        <div class="panel panel-info">
            <div class="panel-heading"> Enregistrement d'un nouveau Substance de Reference</div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{ route('substances.store')}}" method="POST" role="form">
                            {{ csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nom du Produit</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="nomProduit" placeholder="Nom du Produit">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Date de Reception</label>
                                <input type="date" class="form-control" id="exampleInputPassword1" name="dateRecu" placeholder="Date de Reception">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Quantite Recue</label>
                                <input type="number" class="form-control" id="exampleInputPassword1" name="qtRecu" placeholder="Quantite Recue">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Fabricant</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="fabricant" placeholder="Date de Reception">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">N°. Lot</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="lot" placeholder="Numero du Lot">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">date de Fabrication</label>
                                <input type="date" class="form-control" id="exampleInputPassword1" name="dateFab" placeholder="Date de Fabrication">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">date de Peremption</label>
                                <input type="date" class="form-control" id="exampleInputPassword1" name="dateExp" placeholder="Date de Peremption">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Depositaire</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="depositaire" placeholder="Depositaire">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Certificat</label>
                                <input type="file" id="exampleInputFile" name="certificat">
                            </div>
                        </div>
                    <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
