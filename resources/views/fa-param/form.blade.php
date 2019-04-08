@foreach($parametre as $test)
<div class="form-group {{ $errors->has('molecule') ? 'has-error' : ''}}">
    <label for="molecule" class="col-md-4 control-label">{{ 'Parametre/Methode' }}</label>
      <div class="col-md-3">
        <input class="form-control" name="parametre[]" type="text" id="parametre" value="{{ $test->parametre}}" required> <br />
      </div>
      <div class="col-md-3">
        <select name="methode[]" class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choose">
            @foreach($methode as $test)
                <option value="{{ $test->methode}}">{{ $test->methode}}</option>
            @endforeach
        </select>
      </div>

        {!! $errors->first('molecule', '<p class="help-block">:message</p>') !!}
  </div>

@endforeach

<div class="form-group {{ $errors->has('faisabilite_id') ? 'has-error' : ''}}">
    <!-- <label for="faisabilite_id" class="col-md-4 control-label">{{ 'Faisabilite Id' }}</label> -->
    <div class="col-md-6">
        <input class="form-control" name="faisabilite_id" type="hidden" id="faisabilite_id" value="{{ $faparam->faisabilite_id or ''}}" required>
        {!! $errors->first('faisabilite_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
