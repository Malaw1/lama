<div class="form-group {{ $errors->has('methode') ? 'has-error' : ''}}">
    <label for="methode" class="col-md-4 control-label">{{ 'Methode' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="methode" type="text" id="methode" value="{{ $famethode->methode or ''}}" required>
        {!! $errors->first('methode', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('faisabilite_id') ? 'has-error' : ''}}">
    <label for="faisabilite_id" class="col-md-4 control-label">{{ 'Faisabilite Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="faisabilite_id" type="number" id="faisabilite_id" value="{{ $famethode->faisabilite_id or ''}}" required>
        {!! $errors->first('faisabilite_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
