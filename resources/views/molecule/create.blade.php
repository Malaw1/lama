@extends('layouts.master')
@push('css')
<style>
input{
  display: block;
}
</style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New Molecule</h3>
                    @can('view-'.str_slug('Molecule'))
                    <a  class="btn btn-success pull-right" href="{{url('/molecule/molecule')}}"><i class="icon-arrow-left-circle"></i> Add Molecule</a>
                    @endcan

                    <div class="clearfix"></div>
                    <hr>
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ url('/molecule/molecule') }}" accept-charset="UTF-8"
                          class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include ('molecule.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script>
(function() {
  var counter = 0;
  var btn = document.getElementById('btn');
  var form = document.getElementById('form');
  var addInput = function() {
    counter++;
    var input = document.createElement("input");
    input.id = 'input-' + counter;
    input.type = 'text';
    input.name = 'name';
    input.placeholder = 'Input number ' + counter;
    form.appendChild(input);
  };
  btn.addEventListener('click', function() {
    addInput();
  }.bind(this));
})();

</script
@endpush
