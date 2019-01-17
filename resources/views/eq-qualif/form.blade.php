<div class="form-group {{ $errors->has('equipement') ? 'has-error' : ''}}">
    <label for="equipement" class="col-md-4 control-label">{{ 'Equipement' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="equipement" type="number" id="equipement" value="{{ $eqqualif->equipement or ''}}" required>
        {!! $errors->first('equipement', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('date_qualif') ? 'has-error' : ''}}">
    <label for="date_qualif" class="col-md-4 control-label">{{ 'Date Qualif' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="date_qualif" type="date" id="date_qualif" value="{{ $eqqualif->date_qualif or ''}}" required>
        {!! $errors->first('date_qualif', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('date_next') ? 'has-error' : ''}}">
    <label for="date_next" class="col-md-4 control-label">{{ 'Date Next' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="date_next" type="date" id="date_next" value="{{ $eqqualif->date_next or ''}}" required>
        {!! $errors->first('date_next', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('auteur') ? 'has-error' : ''}}">
    <label for="auteur" class="col-md-4 control-label">{{ 'Auteur' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="auteur" type="text" id="auteur" value="{{ $eqqualif->auteur or ''}}" required>
        {!! $errors->first('auteur', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('details') ? 'has-error' : ''}}">
    <label for="details" class="col-md-4 control-label">{{ 'Details' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="details" type="textarea" id="details" required>{{ $eqqualif->details or ''}}</textarea>
        {!! $errors->first('details', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="col-md-4 control-label">{{ 'User Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="user_id" type="number" id="user_id" value="{{ $eqqualif->user_id or ''}}" required>
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
