@push('js')
  //Ajout et Retrait pour le Les reactifs
  <script>
        function addRemove() {
            if ($('div.uv').length == 1) {
                $('#remove').hide();
            } else {
                $('#remove').show();
            }
        };
        $(document).ready(function() {
            addRemove()
            $('#add').click(function() {
                $('div.uv:last').after($('div.uv:first').clone());
                addRemove();
            });
            $('#remove').click(function() {
                $('div.uv:last').remove();
                addRemove();
            });
        });
    </script>  
@endpush


<div class="panel panel-info">
        <div class="panel-heading">UV Visible: </div>
        <div class="panel-wrapper collapse in" aria-expanded="true">
            <div class="panel-body">
                <form action="{{  route('spectro-uv.store')}}" method="POST" role="form">
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
                                    <label>Longueur d'onde</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="onde" placeholder="Longueur d'onde">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>blanc</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="blanc" placeholder="blanc">
                                </div>
                            </div>
                        </div>
    
    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">PhMetre</label>
                                    <select name="ph" class="form-control select2">
                                        @foreach($ph as $ph)
                                            <option value="{{ $ph->id }}">{{ $ph->code}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Balance</label>
                                    <select name="balance" class="form-control select2">
                                        @foreach($balance as $balance)
                                            <option value="{{ $balance->id}}">{{ $balance->code}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row uv">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label class="control-label">Reactifs</label>
                                    <select name="reactif[]" class="form-control select2">
                                        @foreach($reactif1 as $reactif)
                                            <option value="{{ $reactif->id}}">{{ $reactif->designation}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Quantite utilisee</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="qse[]" placeholder="Quantite utilisee">
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


                        <hr >
    
                        <div class="row">
                            <h3 class="box-title">Preparation de la solution standard</h3>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Substances de References</label>
                                <select name="substance_id" class="form-control select2">
                                    @foreach($reactif1 as $reactif)
                                        <option value="{{ $reactif->id}}">{{ $reactif->designation}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Quantite utilisee</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="qsed[]" placeholder="Quantite utilisee">
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
                                    <th scope="col">DO</th>
                                    <th scope="col">Resultat</th>
                                    <th scope="col">Norme</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope="row">Moy WS</th>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="do_ws" placeholder=""></td>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="result_ws" placeholder=""></td>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="norm_ws" placeholder=""></td>
                                </tr>
                                <tr>
                                <th scope="row">Moy CS</th>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="do_cs" placeholder=""></td>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="result_cs" placeholder=""></td>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="norm_cs" placeholder=""></td>
                                </tr>
                                <tr>
                                <th scope="row">Moy Essai 1</th>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="densite_optique[]" placeholder=""></td>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="resultat[]" placeholder=""></td>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="norme[]" placeholder=""></td>
                                </tr>
                                <tr>
                                <th scope="row">Moy Essai 2</th>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="densite_optique[]" placeholder=""></td>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="resultat[]" placeholder=""></td>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="norme[]" placeholder=""></td>
                                </tr>
                                <tr>
                                <th scope="row">Moy Essai 3</th>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="densite_optique[]" placeholder=""></td>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="resultat[]" placeholder=""></td>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="norme[]" placeholder=""></td>
                                </tr>
                                <tr>
                                <th colspan="2" scope="row">Moy Dosage</th>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="moy_dosage" placeholder=""></td>
                                </tr>
                                <tr>
                                <th colspan="2" scope="row">Ecart Type</th>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="ecart_type" placeholder=""></td>
                                </tr>
                                <tr>
                                    <th colspan="2" scope="row">CV</th>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="cv" placeholder=""></td>
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
    