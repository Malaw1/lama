<div class="form-group {{ $errors->has('equipement') ? 'has-error' : ''}}">
    <label for="equipement" class="col-md-4 control-label">{{ 'Equipement' }}</label>
    <div class="col-md-6">
      <select name="equipement[]" class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choose">
            @foreach($equipement as $test)
                <option value="{{ $test->appareil}}">{{ $test->code}}</option>
            @endforeach
      </select>
        <!-- <input class="form-control" name="equipement" type="text" id="equipement" value="{{ $faequipement->equipement or ''}}" required> -->
        {!! $errors->first('equipement', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<!-- <div class="form-group {{ $errors->has('faisabilite_id') ? 'has-error' : ''}}">
    <label for="faisabilite_id" class="col-md-4 control-label">{{ 'Faisabilite Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="faisabilite_id" type="number" id="faisabilite_id" value="{{ $faequipement->faisabilite_id or ''}}" >
        {!! $errors->first('faisabilite_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
-->
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Enregistrer' }}">
    </div>
</div>
