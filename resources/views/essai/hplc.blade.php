@push('js')

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>

    //Ajout et Retrait pour le Les reactifs
        <script>
            function checkRemove() {
                if ($('div.react').length == 1) {
                    $('#remove').hide();
                } else {
                    $('#remove').show();
                }
            };
            $(document).ready(function() {
                checkRemove()
                $('#add').click(function() {
                    $('div.react:last').after($('div.react:first').clone());
                    checkRemove();
                });
                $('#remove').click(function() {
                    $('div.react:last').remove();
                    checkRemove();
                });
            });
        </script>

        // Ajout et Retait de Substances de Refs pour le diluant
        <script>
            function checkRemoveDiluant() {
                if ($('div.diluant').length == 1) {
                    $('#removeDiluant').hide();
                } else {
                    $('#removeDiluant').show();
                }
            };
            $(document).ready(function() {
                checkRemoveDiluant()
                $('#addDiluant').click(function() {
                    $('div.diluant:last').after($('div.diluant:first').clone());
                    checkRemoveDiluant();
                });
                $('#removeDiluant').click(function() {
                    $('div.diluant:last').remove();
                    checkRemoveDiluant();
                });
            });
        </script>

        //Ajout et Retrait pour les Substances de refs

        <script>
            function checkRemoveSubs() {
                if ($('div.subs').length == 1) {
                    $('#removeSubs').hide();
                } else {
                    $('#removeSubs').show();
                }
            };
            $(document).ready(function() {
                checkRemoveDiluant()
                $('#addSubs').click(function() {
                    $('div.subs:last').after($('div.subs:first').clone());
                    checkRemoveDiluant();
                });
                $('#removeSubs').click(function() {
                    $('div.subs:last').remove();
                    checkRemoveSubs();
                });
            });
        </script>

@endpush

<div class="panel panel-info">
    <div class="panel-heading"> HPLC</div>
    <div class="panel-wrapper collapse in" aria-expanded="true">
        <div class="panel-body">
            <form action="{{ route('hplc.store')}}" method="POST">
                    {{ csrf_field()}}
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Equipements</label>
                                <select name="equipement_id" class="form-control select2">
                                    @foreach($equip as $equip)
                                        <option value="{{ $equip->id}}">{{ $equip->code}}</option>
                                     @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">PhMetre</label>
                                <select name="pHmetre" class="form-control select2">
                                    @foreach($ph as $ph)
                                        <option value="{{ $ph->code }}">{{ $ph->code}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Balance</label>
                            <select name="balance" class="form-control select2">
                                    @foreach($balance as $balance)
                                        <option value="{{ $balance->code}}">{{ $balance->code}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="row react">

                        <div class="col-md-7">
                            <div class="form-group">
                                <label class="control-label">Reactifs</label>
                                <select name="reactif[]" class="form-control select2">
                                    @foreach($reactif1 as $reactif)
                                        <option value="{{ $reactif->id}}">{{ $reactif->designation}}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Quantite utilisee</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="qsed[]" placeholder="Quantite utilisee">
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <a type="button" class="fcbtn btn btn-outline btn-success btn-1b col-md-2" id='add'>
                            <i class="fa fa-plus"></i>
                        </a>
                        <a type="button" class="fcbtn btn btn-outline btn-danger btn-1b col-md-2" id='remove'>
                                <i class="fa fa-remove"></i>
                        </a>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h2 for="exampleInputEmail1">Condition Chromatographique</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Volume d’injection :</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="volume_injection" placeholder="Volume d’injection :">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Débit :</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="debit" placeholder="Débit :">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Longueur d’onde :</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="longueur_onde" placeholder="Longueur d’onde :">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Détection :</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="detection" placeholder="Détection :">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Température :</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="temperature" placeholder="Température :">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Colonne :</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="colonne" placeholder="Colonne :">
                            </div>
                        </div>
                    </div>

                    <div class="row diluant">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Diluant :</label>
                                <select name="diluant[]" class="form-control select2">
                                    @foreach($subsRef as $subsRef)
                                        <option value="{{ $subsRef->id}}">{{ $subsRef->designation}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Quantite utilisee</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="qt[]" placeholder="Quantite utilisee">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <a type="button"  class="btn btn-success col-md-2" id='addDiluant'>Ajouter</a>
                        <a type="button" class="btn btn-danger col-md-2" id='removeDiluant'>Enlever</a>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phase mobile :</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="substance" placeholder="Phase mobile :">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">pH: </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="pH" placeholder="pH :">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ajustage :</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="ajustage" placeholder="Ajustage :">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                            <h3 class="box-title">Preparation de la solution standard</h3>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Sustances de References</label>
                                    <select name="substance_id" class="form-control select2">
                                        @foreach($reactif1 as $reactif)
                                            <option value="{{ $reactif->id}}">{{ $reactif->designation}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Quantite utilisee</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="qtUsed" placeholder="Quantite utilisee">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Titre</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="titre" placeholder="Titre">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Prise d'essai Sustances de References P1</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="pesr1" placeholder="P1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Prise d'essai Sustances de References P2</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="pesr2" placeholder="P2">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Prise d'essai N1</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="essai1" placeholder="Essai 1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Prise d'essai N2</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="essai2" placeholder="Essai 2">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Prise d'essai N3</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="essai3" placeholder="Essai 3">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="container-fluid">
                            <table class="table table-sm">
                            <thead>
                                <tr>
                                <th scope="col">Essais</th>
                                <th scope="col">Resultat</th>
                                <th scope="col">Norme</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope="row">1</th>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="resultat[]" placeholder=""></td>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="norme[]" placeholder=""></td>
                                </tr>
                                <tr>
                                <th scope="row">2</th>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="resultat[]" placeholder=""></td>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="norme[]" placeholder=""></td>
                                </tr>
                                <tr>
                                <th scope="row">3</th>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="resultat[]" placeholder=""></td>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="norme[]" placeholder=""></td>
                                </tr>

                                <tr>
                                <th scope="row">Moyenne</th>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="moyenne" placeholder=""></td>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" disabled  placeholder=""></td>
                                </tr>
                                <tr>
                                <th scope="row">Ecart Type</th>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="ecart_type" placeholder=""></td>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" disabled  placeholder=""></td>
                                </tr>
                                <tr>
                                <th scope="row">CV (%)</th>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="cv" placeholder=""></td>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" disabled  placeholder=""></td>
                                </tr>
                            </tbody>
                            </table>
                            </div>
                        </div>

                        <div class="row">
                            <label>Conclusion</label>
                            <textarea name="conclusion" class="form-control"></textarea>
                        </div>
                        <hr />

                        <div class="form-actions">
                                <td><input type="hidden" class="form-control" value="{{ $analyse->id }}" name="analyse_id" placeholder=""></td>
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Enregistrer</button>
                            <button type="button" class="btn btn-default">Annuler</button>
                        </div>
                    </div>




            </form>
        </div>
    </div>
</div>
