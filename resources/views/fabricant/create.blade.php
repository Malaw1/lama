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
        <!-- .row -->
        <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading"> Fiche de Faisailite</div>
                        <div class="panel-wrapper collapse in" aria-expanded="true">
                            <div class="panel-body">
                                <form action="{{route('faisabilites.store')}}" method="POST">
                                    <div class="form-body">
                                        <h3 class="box-title"></h3>
                                        <hr>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">References</label>
                                                    <select name="ref" class="form-control select2">
                                                        <option>USP</option>
                                                        <option>BP</option>
                                                        <option>Autre</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Objet d'Essai</label>
                                                    <select name="objet" class="form-control select2">
                                                        <option>Choisir</option>
                                                        @foreach($objet as $objet)
                                                            <option value="{{ $objet->code}}">{{ $objet->code}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Code Molecule</label>
                                                    <input type="text" id="lastName" class="form-control" name="codeMolecule" placeholder="Code Molecule"> <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Parametres</label>
                                                    <select name="reactif" class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choisir">
                                                            @foreach($test as $test)
                                                                <option value="{{ $test->nomTest}}">{{ $test->nomTest}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Methodes</label>
                                                    <select name="reactif" class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choisir">
                                                        @foreach($method as $method)
                                                            <option value="{{ $method->nomMethode}}">{{ $method->nomMethode}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Substances de References</label>
                                                    <select name="reactif" class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choisir">
                                                            @foreach($subsRef as $subsRef)
                                                                <option value="{{ $subsRef->nomProduit}}">{{ $subsRef->nomProduit}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Reactifs</label>
                                                    <select name="reactif" class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choisir">
                                                            @foreach($reactif as $reactif)
                                                                <option value="{{ $reactif->nomProduit}}">{{ $reactif->nomProduit}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <h3 class="box-title m-t-40">Materiels et Equipements</h3>
                                        <hr>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Materiels</label>
                                                    <select name="reactif" class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choisir">
                                                            @foreach($matos as $matos)
                                                                <option value="{{ $matos->nomMateriel}}">{{ $matos->nomMateriel}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Equipement</label>
                                                    <select name="reactif" class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choisir">
                                                            @foreach($equip as $equip)
                                                                <option value="{{ $equip->appareil}}">{{ $equip->appareil}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>

                                        <!--/row-->
                                        <h3 class="box-title m-t-40">Personel Qualifie et Responsabilite</h3>
                                        <hr>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Personel</label>
                                                    <select name="reactif" class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choisir">
                                                            @foreach($user as $user)
                                                                <option value="{{ $user->id}}">{{ $user->role}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Responsable</label>
                                                    <select class="form-control select2">                                                        @foreach($use as $use)
                                                            <option value="{{ $use->id}}">{{ $use->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>

                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Verifier</button>
                                        <button type="button" class="btn btn-default">Annuler</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @include('layouts.partials.right-sidebar')
    </div>
@endsection

@push('js')
    <script src="{{asset('plugins/components/switchery/dist/switchery.min.js')}}"></script>
    <script src="{{asset('plugins/components/custom-select/custom-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/components/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('plugins/components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}" type="text/javascript"></script>
    <script>
        jQuery(document).ready(function() {
            // Switchery
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
            $('.js-switch').each(function() {
                new Switchery($(this)[0], $(this).data());
            });
            // For select 2
            $(".select2").select2();
            $('.selectpicker').selectpicker();
            //Bootstrap-TouchSpin
            $(".vertical-spin").TouchSpin({
                verticalbuttons: true,
                verticalupclass: 'ti-plus',
                verticaldownclass: 'ti-minus'
            });
            var vspinTrue = $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            if (vspinTrue) {
                $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
            }
            $("input[name='tch1']").TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '%'
            });
            $("input[name='tch2']").TouchSpin({
                min: -1000000000,
                max: 1000000000,
                stepinterval: 50,
                maxboostedstep: 10000000,
                prefix: '$'
            });
            $("input[name='tch3']").TouchSpin();
            $("input[name='tch3_22']").TouchSpin({
                initval: 40
            });
            $("input[name='tch5']").TouchSpin({
                prefix: "pre",
                postfix: "post"
            });

        });
    </script>
@endpush

{{--
<select name="reactif" class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choose">
        @foreach($reactif as $reactif)
            <option value="{{ $reactif->nomProduit}}">{{ $reactif->nomProduit}}</option>
        @endforeach
</select> --}}
                         </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Details</label>
                                                    <textarea type="text" class="form-control" id="exampleInputPassword1" name="details" placeholder="Description du client..."></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                                </div>
                                        </form>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@push('js')
    <script src="{{asset('plugins/components/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('plugins/components/sweetalert/jquery.sweet-alert.custom.js')}}"></script>
    <script src="{{asset('plugins/components/switchery/dist/switchery.min.js')}}"></script>
    <script src="{{asset('plugins/components/custom-select/custom-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/components/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('plugins/components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}" type="text/javascript"></script>
    <script>
        jQuery(document).ready(function() {
            // Switchery
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
            $('.js-switch').each(function() {
                new Switchery($(this)[0], $(this).data());
            });
            // For select 2
            $(".select2").select2();
            $('.selectpicker').selectpicker();
            //Bootstrap-TouchSpin
            $(".vertical-spin").TouchSpin({
                verticalbuttons: true,
                verticalupclass: 'ti-plus',
                verticaldownclass: 'ti-minus'
            });
            var vspinTrue = $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            if (vspinTrue) {
                $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
            }
            $("input[name='tch1']").TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '%'
            });
            $("input[name='tch2']").TouchSpin({
                min: -1000000000,
                max: 1000000000,
                stepinterval: 50,
                maxboostedstep: 10000000,
                prefix: '$'
            });
            $("input[name='tch3']").TouchSpin();
            $("input[name='tch3_22']").TouchSpin({
                initval: 40
            });
            $("input[name='tch5']").TouchSpin({
                prefix: "pre",
                postfix: "post"
            });

        });

           function yesnoCheck(that){
            if(that.value == "medicament"){
                alert("Vous allez analyser um medicament");
                document.getElementById("test").style.display = "block";
                document.getElementById("ifNo").style.display = "none";
            } else if(that.value == "vaccin"){
                alert("Another is selected");
                document.getElementById("ifNo").style.display = "block";
                document.getElementById("ifYes").style.display = "none";
            } else {
                document.getElementById("ifYes").style.display = "none";
                document.getElementById("ifNo").style.display = "none";
            }

        }
    </script>
@endpush

