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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!


                    <div class="col-md-6">
                        <select name="parametre" id="parametre" class="dynamic form-control select2" data-placeholder="Choose">
                            @foreach($parametre as $parametre)
                                <option value="{{ $parametre->parametre}}">{{ $parametre->parametre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <select name="methode" id="methode" class="form-control select2" data-placeholder="Choose">
                           <option value=""> select Methode</option>
                        </select>
                    </div>

                    <div
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('js')
    <script src="{{asset('plugins/components/switchery/dist/switchery.min.js')}}"></script>
    <script src="{{asset('plugins/components/custom-select/custom-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/components/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('plugins/components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}" type="text/javascript"></script>
    <script>

       
        $(document).ready(function(){
            $('.dynamic').change(function(){
                if($(this).val() != '')
                {
                    var select = $(this).attr("id");
                    var  value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        url:"{{ route('dynamic.fetch') }}",
                        method: "POST",
                        data: {select:select, value:value, _token:token, dependent:dependent},
                        success:function(result){
                            $('#'+dependent).html(result);
                        }
                    })
                }
            });
        });


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
