@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/owl.carousel/owl.carousel.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('plugins/components/owl.carousel/owl.theme.default.css')}}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Slide show with owl Carousel</div>
                    <div class="panel-wrapper p-b-10 collapse in">
                        <div id="owl-demo" class="owl-carousel owl-theme">
                            <div class="item"><img src="{{asset('plugins/images/heading-bg/slide2.jpg')}}" alt="Owl Image"></div>
                            <div class="item"><img src="{{asset('plugins/images/heading-bg/slide3.jpg')}}" alt="Owl Image"></div>
                            <div class="item"><img src="{{asset('plugins/images/heading-bg/slide4.jpg')}}" alt="Owl Image"></div>
                            <div class="item"><img src="{{asset('plugins/images/heading-bg/slide6.jpg')}}" alt="Owl Image"></div>
                            <div class="item"><img src="{{asset('plugins/images/heading-bg/slide1.jpg')}}" alt="Owl Image"></div>
                            <div class="item"><img src="{{asset('plugins/images/heading-bg/slide3.jpg')}}" alt="Owl Image"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- .row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">With Multi iteam</div>
                    <div class="panel-wrapper p-b-10 collapse in">
                        <div id="owl-demo2" class="owl-carousel owl-theme">
                            <div class="item"><img src="{{asset('plugins/images/big/img1.jpg')}}" alt="Owl Image"></div>
                            <div class="item"><img src="{{asset('plugins/images/big/img2.jpg')}}" alt="Owl Image"></div>
                            <div class="item"><img src="{{asset('plugins/images/big/img3.jpg')}}" alt="Owl Image"></div>
                            <div class="item"><img src="{{asset('plugins/images/big/img4.jpg')}}" alt="Owl Image"></div>
                            <div class="item"><img src="{{asset('plugins/images/big/img5.jpg')}}" alt="Owl Image"></div>
                            <div class="item"><img src="{{asset('plugins/images/big/img6.jpg')}}" alt="Owl Image"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- .row -->
        <div class="row">
            <div class="col-md-6">
                <div class="white-box">
                    <h3 class="box-title">Bootstrap carouse2 <code class="font-12">.carousel-caption</code></h3>
                    <!-- START carousel-->
                    <div id="carousel-example-captions" data-ride="carousel" class="carousel slide">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-captions" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-captions" data-slide-to="1"></li>
                            <li data-target="#carousel-example-captions" data-slide-to="2"></li>
                        </ol>
                        <div role="listbox" class="carousel-inner">
                            <div class="item active"><img src="{{asset('plugins/images/big/img1.jpg')}}" alt="First slide image">
                                <div class="carousel-caption">
                                    <h3 class="text-white font-600">Model Showing off</h3>
                                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                                </div>
                            </div>
                            <div class="item"><img src="{{asset('plugins/images/big/img2.jpg')}}" alt="Second slide image">
                                <div class="carousel-caption">
                                    <h3 class="text-white font-600">Mountaing Climbing</h3>
                                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                                </div>
                            </div>
                            <div class="item"><img src="{{asset('plugins/images/big/img3.jpg')}}" alt="Third slide image">
                                <div class="carousel-caption">
                                    <h3 class="text-white font-600">Fire camp on hill</h3>
                                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                                </div>
                            </div>
                        </div>
                        <a href="#carousel-example-captions" role="button" data-slide="prev"
                           class="left carousel-control"> <span aria-hidden="true" class="fa fa-angle-left"></span>
                            <span class="sr-only">Previous</span> </a>
                        <a href="#carousel-example-captions" role="button" data-slide="next"
                           class="right carousel-control"> <span aria-hidden="true" class="fa fa-angle-right"></span>
                            <span class="sr-only">Next</span> </a>
                    </div>
                    <!-- END carousel-->
                </div>
            </div>
            <div class="col-md-6">
                <div class="white-box">
                    <h3 class="box-title">Bootstrap carouse2</h3>
                    <!-- START carousel-->
                    <div id="carousel-example-captions-1" data-ride="carousel" class="carousel slide">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-captions-1" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-captions-1" data-slide-to="1"></li>
                            <li data-target="#carousel-example-captions-1" data-slide-to="2"></li>
                        </ol>
                        <div role="listbox" class="carousel-inner">
                            <div class="item active"><img src="{{asset('plugins/images/big/img4.jpg')}}" alt="First slide image">
                            </div>
                            <div class="item"><img src="{{asset('plugins/images/big/img5.jpg')}}" alt="Second slide image"></div>
                            <div class="item"><img src="{{asset('plugins/images/big/img6.jpg')}}" alt="Third slide image"></div>
                        </div>
                    </div>
                    <!-- END carousel-->
                </div>
            </div>
        </div>
        <!-- /.row -->
        @include('layouts.partials.right-sidebar')
    </div>

@endsection

@push('js')
    <script src="{{asset('plugins/components/owl.carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('plugins/components/owl.carousel/owl.custom.js')}}"></script>
@endpush