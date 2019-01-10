<div class="panel panel-info">
        <div class="panel-heading">UV Visible: </div>
        <div class="panel-wrapper collapse in" aria-expanded="true">
            <div class="panel-body">
                <form action="{{ route('spectrouv.store')}}" method="POST" role="form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Equipements</label>
                                    <select class="form-control select2">
                                        @foreach($equipement as $equipement)
                                            <option value="{{ $equip->id}}">{{ $equipement->name}}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Longueur d'onde</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="Ph" placeholder="Longueur d'onde">
                                </div>
    
                                <div class="form-group">
                                    <label>blanc</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="Ph" placeholder="blanc">
                                </div>
                            </div>
                        </div>
    
    
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">PhMetre</label>
                                <select class="form-control select2">
                                        {{-- @foreach($use as $use)
                                            <option value="{{ $use->id}}">{{ $use->name}}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Calibre</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="Calibre" placeholder="Nom du Test">
                                </div>
                            </div>
    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Valeure Lue</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="Value" placeholder="Nom du Test">
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Reactifs</label>
                                    <select name="reactif[]" class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choisir">
                                        {{-- @foreach($reactif as $reactif)
                                            <option value="{{ $reactif->nomProduit}}">{{ $reactif->nomProduit}}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Quantite utilisee</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder="Quantite utilisee">
                                </div>
                            </div>
                        </div>
                        <hr >
    
                        <div class="row">
                            <h3 class="box-title">Preparation de la solution standard</h3>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Sustances de References</label>
                                    <select name="reactif[]" class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choisir">
                                        {{-- @foreach($reactif as $reactif)
                                            <option value="{{ $reactif->nomProduit}}">{{ $reactif->nomProduit}}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Quantite utilisee</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder="Quantite utilisee">
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Titre</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder="Titre">
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Prise d'essai Sustances de References P1</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder="P1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Prise d'essai Sustances de References P2</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder="P2">
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Prise d'essai N1</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder="Essai 1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Prise d'essai N2</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder="Essai 2">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Prise d'essai N3</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder="Essai 3">
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="container-fluid">
                            <table class="table table-sm">
                            <thead>
                                <tr>
                                <th scope="col">Essais</th>
                                <th scope="col">DO</th>
                                <th scope="col">Resultat</th>
                                <th scope="col">Norme</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope="row">Moy WS</th>
                                <td><input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder=""></td>
                                <td><input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder=""></td>
                                <td><input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder=""></td>
                                </tr>
                                <tr>
                                <th scope="row">Moy CS</th>
                                <td><input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder=""></td>
                                <td><input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder=""></td>
                                <td><input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder=""></td>
                                </tr>
                                <tr>
                                <th scope="row">Moy Essai 1</th>
                                <td><input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder=""></td>
                                <td><input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder=""></td>
                                <td><input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder=""></td>
                                </tr>
                                <tr>
                                <th scope="row">Moy Essai 2</th>
                                <td><input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder=""></td>
                                <td><input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder=""></td>
                                <td><input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder=""></td>
                                </tr>
                                <tr>
                                <th scope="row">Moy Essai 3</th>
                                <td><input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder=""></td>
                                <td><input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder=""></td>
                                <td><input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder=""></td>
                                </tr>
                                <tr>
                                <th colspan="2" scope="row">Moy Dosage</th>
                                <td><input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder=""></td>
                                <td><input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder=""></td>
                                </tr>
                                <tr>
                                <th colspan="2" scope="row">Ecart Type</th>
                                <td><input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder=""></td>
                                <td><input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder=""></td>
                                </tr>
                                <tr>
                                <th colspan="2" scope="row">CV</th>
                                <td><input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder=""></td>
                                <td><input type="text" class="form-control" id="exampleInputEmail1" name="Qsed[]" placeholder=""></td>
                                </tr>
                            </tbody>
                            </table>
                            </div>
                        </div>
    
                        <div class="row">
                            <label>Conclusion</label>
                            <textarea class="form-control"></textarea>
                        </div>
                        <hr />
    
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Enregistrer</button>
                            <button type="button" class="btn btn-default">Annuler</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    