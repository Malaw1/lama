<div class="form-group {{ $errors->has('reactif') ? 'has-error' : ''}}">
    <label for="reactif" class="col-md-4 control-label">{{ 'Reactif' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="reactif" type="text" id="reactif" value="{{ $fareactif->reactif or ''}}" required>
        {!! $errors->first('reactif', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('faisabilite_id') ? 'has-error' : ''}}">
    <label for="faisabilite_id" class="col-md-4 control-label">{{ 'Faisabilite Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="faisabilite_id" type="number" id="faisabilite_id" value="{{ $fareactif->faisabilite_id or ''}}" required>
        {!! $errors->first('faisabilite_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
