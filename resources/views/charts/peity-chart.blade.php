@extends('layouts.master')
@push('css')
@endpush

@section('content')
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xs-12">
                <div class="white-box">
                    <h3>Pie Chart</h3>
                    <p class="text-muted m-b-30">Add code in span <code> class="pie"</code> plus for colors <code>data-peity='{ "fill": ["#0078bc", "#f2f2f2"]}'</code></p>
                    <div class="row">
                        <div class="col-sm-2 col-xs-6"><span class="pie" data-peity='{ "fill": ["#0078bc", "#f2f2f2"]}'>1/5</span>
                            <div>Data : 1/5</div>
                        </div>
                        <div class="col-sm-2 col-xs-6"><span class="pie" data-peity='{ "fill": ["#4a23ad", "#f2f2f2"]}'>226/360</span>
                            <div>Data : 226/360</div>
                        </div>
                        <div class="col-sm-2 col-xs-6"><span class="pie" data-peity='{ "fill": ["#2ecc71", "#f2f2f2"]}'>0.52/1.561</span>
                            <div>Data : 0.52/1.561</div>
                        </div>
                        <div class="col-sm-2 col-xs-6"><span class="pie" data-peity='{ "fill": ["#e74a25", "#f2f2f2"]}'>1,4</span>
                            <div>Data : 1,4</div>
                        </div>
                        <div class="col-sm-2 col-xs-6"><span class="pie" data-peity='{ "fill": ["#ffb136", "#f2f2f2"]}'>226,134</span>
                            <div>Data : 226,134</div>
                        </div>
                        <div class="col-sm-2 col-xs-6"><span class="pie" data-peity='{ "fill": ["#282f32", "#f2f2f2"]}'>0.52,1.041</span>
                            <div>Data : 0.52, 1.041</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3>Donut Chart</h3>
                    <p class="text-muted m-b-30">Just add in span<code> class="donut"</code></p>
                    <div class="row">
                        <div class="col-sm-2 col-xs-6"><span class="donut" data-peity='{ "fill": ["#0078bc", "#f2f2f2"]}'>1/5</span>
                            <div>Data : 1/5</div>
                        </div>
                        <div class="col-sm-2 col-xs-6"><span class="donut" data-peity='{ "fill": ["#4a23ad", "#f2f2f2"]}'>226/360</span>
                            <div>Data : 226/360</div>
                        </div>
                        <div class="col-sm-2 col-xs-6"><span class="donut" data-peity='{ "fill": ["#2ecc71", "#f2f2f2"], "innerRadius": 16, "radius": 32 }'>0.52/1.561</span>
                            <div>Data : 0.52/1.561</div>
                        </div>
                        <div class="col-sm-2 col-xs-6"><span class="donut" data-peity='{ "fill": ["#e74a25", "#f2f2f2"], "innerRadius": 20, "radius": 32 }'>1,4</span>
                            <div>Data : 1,4</div>
                        </div>
                        <div class="col-sm-2 col-xs-6"><span class="donut" data-peity='{ "fill": ["#ffb136", "#f2f2f2"], "innerRadius": 23, "radius": 32 }'>226,134</span>
                            <div>Data : 226,134</div>
                        </div>
                        <div class="col-sm-2 col-xs-6"><span class="donut" data-peity='{ "fill": ["#282f32", "#f2f2f2"], "innerRadius": 8, "radius": 32 }'>0.52,1.041</span>
                            <div>Data : 0.52, 1.041</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                    <h3> Bar Chart</h3>
                    <p class="text-muted m-b-30">Add class in span<code> peity-bar</code></p>
                    <div class="row">
                        <div class="col-sm-4 col-xs-6"><span class="peity-bar" data-peity='{ "fill": ["#00bbd9", "#4a23ad"]}' data-width="100%" data-height="60">6,2,8,4,3,8,1,3,6,5,9,2,8,1,4,8,9,8,2,1</span></div>
                        <div class="col-sm-4 col-xs-6"><span class="peity-bar" data-peity='{ "fill": ["#e74a25", "#f2f2f2"]}' data-width="100%" data-height="60">6,2,8,4,-3,8,1,-3,6,-5,9,2,-8,1,4,8,9,8,2,1</span></div>
                        <div class="col-sm-4 col-xs-6"><span class="peity-bar" data-peity='{ "fill": ["#282f32", "#2ecc71"]}' data-width="100%" data-height="60">6,2,8,4,3,8,1,3,6,5,9,2,8,1,4,8,9,8,2,1</span></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="white-box">
                    <h3>Line Chart</h3>
                    <p class="text-muted m-b-30">Add class in span<code> peity-line</code></p>
                    <div class="row">
                        <div class="col-sm-4 col-xs-6"><span class="peity-line" data-width="100%" data-height="60">6,2,8,4,3,8,1,3,6,5,9,2,8,1,4,8,9,8,2,1</span></div>
                        <div class="col-sm-4 col-xs-6"><span class="peity-line" data-width="100%" data-height="60">6,2,8,4,-3,8,1,-3,6,-5,9,2,-8,1,4,8,9,8,2,1</span></div>
                        <div class="col-sm-4 col-xs-6"><span class="peity-line" data-width="100%" data-height="60">6,2,8,4,3,8,1,3,6,5,9,2,8,1,4,8,9,8,2,1</span></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        @include('layouts.partials.right-sidebar')
    </div>
@endsection

@push('js')
    <script src="{{asset('plugins/components/peity/jquery.peity.min.js')}}"></script>
    <script src="{{asset('plugins/components/peity/jquery.peity.init.js')}}"></script>
@endpush
