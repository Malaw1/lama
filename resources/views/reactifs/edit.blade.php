@extends('layouts.master')
@section('content')

<div class="container-fluid">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading"> Mise a jour du Reactifs N°: {{$reactif->id}}</div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <form action="{{ route('reactifs.update', [$reactif->id])}}" method="POST">
                            {{ csrf_field()}}
                        <div class="form-body">
                            <h3 class="box-title"></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Date de Reception</label>
                                        <input type="date" class="form-control" name="dateRecu" value="{{ $reactif->dateRecu}}" placeholder="Date de Reception" >
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nom du Produit</label>
                                        <input type="text" class="form-control" placeholder="Nom du Produit" value="{{ $reactif->nomProduit}}" name="nomProduit">
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
                                        <input type="text" class="form-control" placeholder="Depositaire" value="{{ $reactif->depositaire}}" name="depositaire">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Quantite Recu</label>
                                        <input type="text" class="form-control" placeholder="Quantite Recu" value="{{ $reactif->qtRecu}}" name="qtRecu">
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
                                        <input type="text" class="form-control" placeholder="Fabricant" value="{{ $reactif->fabricant}}" name="fabricant">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Lot</label>
                                        <input type="text" class="form-control" placeholder="Lot" value="{{ $reactif->lot}}" name="lot">
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
                                    <input type="date" class="form-control" placeholder="Date de Fabrication" value="{{ $reactif->dateFab}}" name="dateFab">
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Date de Peremption</label>
                                    <input type="date" class="form-control" placeholder="Date de Peremption" value="{{ $reactif->expDate}}" name="expDate">
                                </div>
                            </div>
                                <!--/span-->

                            <!--/row-->
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">#Catalog</label>
                                    <input type="text" class="form-control" placeholder="#Catalog" value="{{ $reactif->catalog}}" name="dateFab">
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">#Cas</label>
                                    <input type="text" class="form-control" placeholder="#Cas" value="{{ $reactif->cas}}" name="expDate">
                                </div>
                            </div>
                                <!--/span-->

                            <!--/row-->
                        </div>

                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Conditionnement</label>
                                        <input type="text" class="form-control" placeholder="Conditionnement" value="{{ $reactif->conditionnement}}" name="conditionnement">
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
