<div class="form-group {{ $errors->has('substance') ? 'has-error' : ''}}">
    <label for="substance" class="col-md-4 control-label">{{ 'Substance' }}</label>
    <div class="col-md-6">
      <select name="substance[]" class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choose">
            @foreach($reactif as $test)
                <option value="{{ $test->designation}}">{{ $test->designation}}</option>
            @endforeach
        </select>
        <!-- <input class="form-control" name="substance" type="text" id="substance" value="{{ $fasubstance->substance or ''}}" required> -->
        {!! $errors->first('substance', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('faisabilite_id') ? 'has-error' : ''}}">
    <!-- <label for="faisabilite_id" class="col-md-4 control-label">{{ 'Faisabilite Id' }}</label> -->
    <div class="col-md-6">
        <input class="form-control" name="faisabilite_id" type="hidden" id="faisabilite_id" value="{{ $fasubstance->faisabilite_id or ''}}" required>
        {!! $errors->first('faisabilite_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<!-- <div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div> -->
