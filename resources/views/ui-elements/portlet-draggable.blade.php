@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/gridstack/gridstack.css')}}" rel="stylesheet">

@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title">Draggable Panel Portlets</h3> Thus is a widget layout jquery plugin. <a
                            href="http://troolee.github.io/gridstack.js/" target="_blank">gridstack.js</a> is used to
                    design this layout. This is drag-and-drop multi-column grid. It allows you to build draggable
                    responsive layouts.
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- .row -->
        <div class="row">
            <div class="grid-stack" data-gs-width="12" data-gs-animate="yes">
                <div class="grid-stack-item" data-gs-x="0" data-gs-y="0" data-gs-width="4" data-gs-height="2">
                    <div class="grid-stack-item-content">1</div>
                </div>
                <div class="grid-stack-item" data-gs-x="4" data-gs-y="0" data-gs-width="4" data-gs-height="4">
                    <div class="grid-stack-item-content">2</div>
                </div>
                <div class="grid-stack-item" data-gs-x="8" data-gs-y="0" data-gs-width="2" data-gs-height="2"
                     data-gs-min-width="2" data-gs-no-resize="yes">
                    <div class="grid-stack-item-content"><span class="fa fa-hand-o-up"></span> Drag me!</div>
                </div>
                <div class="grid-stack-item" data-gs-x="10" data-gs-y="0" data-gs-width="2" data-gs-height="2">
                    <div class="grid-stack-item-content">4</div>
                </div>
                <div class="grid-stack-item" data-gs-x="0" data-gs-y="2" data-gs-width="2" data-gs-height="2">
                    <div class="grid-stack-item-content">5</div>
                </div>
                <div class="grid-stack-item" data-gs-x="2" data-gs-y="2" data-gs-width="2" data-gs-height="4">
                    <div class="grid-stack-item-content">6</div>
                </div>
                <div class="grid-stack-item" data-gs-x="8" data-gs-y="2" data-gs-width="4" data-gs-height="2">
                    <div class="grid-stack-item-content">7</div>
                </div>
                <div class="grid-stack-item" data-gs-x="0" data-gs-y="4" data-gs-width="2" data-gs-height="2">
                    <div class="grid-stack-item-content">8</div>
                </div>
                <div class="grid-stack-item" data-gs-x="4" data-gs-y="4" data-gs-width="4" data-gs-height="2">
                    <div class="grid-stack-item-content">9</div>
                </div>
                <div class="grid-stack-item" data-gs-x="8" data-gs-y="4" data-gs-width="2" data-gs-height="2">
                    <div class="grid-stack-item-content">10</div>
                </div>
                <div class="grid-stack-item" data-gs-x="10" data-gs-y="4" data-gs-width="2" data-gs-height="2">
                    <div class="grid-stack-item-content">11</div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        @include('layouts.partials.right-sidebar')
    </div>
@endsection

@push('js')
    <script src="{{asset('plugins/components/jqueryui/jquery-ui.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.5.0/lodash.min.js"></script>

    <!-- Draggable-portlet -->
    <script src="{{asset('plugins/components/gridstack/gridstack.js')}}"></script>
    <script src="{{asset('plugins/components/gridstack/gridstack.jQueryUI.js')}}"></script>
    <script type="text/javascript">
        $(function () {
            $('.grid-stack').gridstack({
                width: 12,
                alwaysShowResizeHandle: /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
                resizable: {
                    handles: 'e, se, s, sw, w'
                }
            });
        });
    </script>
@endpush