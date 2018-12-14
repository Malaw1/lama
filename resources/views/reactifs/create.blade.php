@extends('layouts.master')
@section('content')

<div class="container-fluid">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading"> Enregistrement de nouveau reactif</div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <form action="{{ route('reactifs.store')}}" method="POST">
                            {{ csrf_field()}}
                        <div class="form-body">
                            <h3 class="box-title"></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Date de Reception</label>
                                        <input type="date" class="form-control" name="dateRecu" placeholder="Date de Reception" >
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">om du Produit</label>
                                        <input type="text" class="form-control" placeholder="Nom du Produit" name="nomProduit">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>

                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Depositaire</label>
                                        <input type="text" class="form-control" placeholder="Depositaire" name="depositaire">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Quantite Recu</label>
                                        <input type="text" class="form-control" placeholder="Quantite Recu" name="qtRecu">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>

                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Fabricant</label>
                                        <input type="text" class="form-control" placeholder="Fabricant" name="fabricant">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Lot</label>
                                        <input type="text" class="form-control" placeholder="Lot" name="lot">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>

                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Date de Fabrication</label>
                                        <input type="date" class="form-control" placeholder="Date de Fabrication" name="dateFab">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Date de Peremption</label>
                                        <input type="date" class="form-control" placeholder="Date de Peremption" name="expDate">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>

                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Conditionnement</label>
                                        <input type="text" class="form-control" placeholder="Conditionnement" name="conditionnement">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"></label>
                                        <input type="hidden" id="lastName" class="form-control" placeholder="Code Analyse"> <span class="help-block"> </span>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Enregistrer</button>
                            <button type="button" class="btn btn-default">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
