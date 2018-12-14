@extends('layouts.master')
@push('css')
    <link href="{{asset('plugins/components/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/components/custom-select/custom-select.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/components/switchery/dist/switchery.min.css')}}" rel="stylesheet" />
    <link href="{{asset('plugins/components/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
    <link href="{{asset('plugins/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
    <link href="{{asset('plugins/components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
@endpush
@section('content')

<div class="container-fluid">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading"> Enregistrement d'un nouvel <strong>Equipement</strong></div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body col-md-6">
                    <form action="{{ route('equipements.store')}}" method="POST" role="form">
                        {{ csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nom de l'appareil</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="appareil" placeholder="Nom de l'appareil">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Date de Reception</label>
                            <input type="date" class="form-control" id="exampleInputPassword1" name="dateRecue" placeholder="Date de Reception">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Code</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="code" placeholder="Code">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Fabricant</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="fabricant" placeholder="Fabricant">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Type</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="type" placeholder="Type">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Serie</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="serie" placeholder="Serie">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Societe a Contacter</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="societeContacter" placeholder="Societe a Contacter">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Date d'Installation</label>
                            <input type="date" class="form-control" id="exampleInputPassword1" name="dateInstallation" placeholder="Date d'Installation">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Salle</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="salle" placeholder="Date d'Installation">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Etat</label>
                            <select class="form-control" name="etat">
                                <option value="Qualifie">Qualifie</option>
                                <option value="Non Qualifie">Non Qualifie</option>
                                <option value="Non Fonctionnel">Non Fonctionnel</option>
                            </select>

                        </div>

                        <div class="form-group">
                                <label for="exampleInputPassword1">Commentaire</label>
                                <textarea type="text" class="form-control" name="commentaire" placeholder="Commentaire..."></textarea>
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
