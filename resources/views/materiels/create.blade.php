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
            <div class="panel-heading"> Enregistrement d'un Nouveau <strong>Materiel</strong></div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body col-md-6">
                    <form action="{{ route('materiels.store')}}" method="POST">
                            {{ csrf_field()}}
                        <div class="form-body">
                            <hr>
                                <div class="form-group ">
                                    <label class="control-label">Designation</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="nomMateriel" placeholder="Nom du Produit">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Type</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="type" placeholder="Type">
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">Date de Reception</label>
                                    <input type="date" class="form-control" id="exampleInputPassword1" name="dateRecep" placeholder="Date de Reception">
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

                                <!--/span-->
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
    </script>
@endpush

