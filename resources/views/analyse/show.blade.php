@extends('layouts.master')
@push('js')
<script language="javascript">
    $('.price').keyup(function () {

        // initialize the sum (total price) to zero
        var sum = 0;
        var pm = 0;
        var n = 0;

        // we use jQuery each() to loop through all the textbox with 'price' class
        // and compute the sum for each loop
        $('.price').each(function() {
            sum += Number($(this).val());
            n += 1;
           int pm += Number($(this).val()) / 20;
        });

        // set the computed value to 'totalPrice' textbox
        $('#totalPrice').val(sum);
        $('#poidsMoyens').val(pm);

    });


</script>
@endpush
@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Analyse {{ $analyse->id }}</h3>
                    @can('view-'.str_slug('Analyse'))
                        <a class="btn btn-success pull-right" href="{{ url('/analyse/analyse') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Retour</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>


                   


                    @if ($forme != 'vaccin')
                        @include('/essai/pesage')
                    @else
                        @include('/essai/volume')
                    @endif

                   
                    @foreach ($faisabilite as $methode )
                        @include("/essai/".$methode->methode)
                    @endforeach 
                </div>
            </div>
        </div>
    </div>

@endsection

