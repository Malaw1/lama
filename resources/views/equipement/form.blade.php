<div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
    <label for="code" class="col-md-4 control-label">{{ 'Code' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="code" type="text" id="code" value="{{ $equipement->code or ''}}" required>
        {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('appareil') ? 'has-error' : ''}}">
    <label for="appareil" class="col-md-4 control-label">{{ 'Appareil' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="appareil" type="text" id="appareil" value="{{ $equipement->appareil or ''}}" required>
        {!! $errors->first('appareil', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fabricant') ? 'has-error' : ''}}">
    <label for="fabricant" class="col-md-4 control-label">{{ 'Fabricant' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="fabricant" type="text" id="fabricant" value="{{ $equipement->fabricant or ''}}" required>
        {!! $errors->first('fabricant', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="col-md-4 control-label">{{ 'Type' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="type" type="text" id="type" value="{{ $equipement->type or ''}}" required>
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('serie') ? 'has-error' : ''}}">
    <label for="serie" class="col-md-4 control-label">{{ 'Serie' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="serie" type="text" id="serie" value="{{ $equipement->serie or ''}}" required>
        {!! $errors->first('serie', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('date_install') ? 'has-error' : ''}}">
    <label for="date_install" class="col-md-4 control-label">{{ 'Date Install' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="date_install" type="date" id="date_install" value="{{ $equipement->date_install or ''}}" required>
        {!! $errors->first('date_install', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('salle') ? 'has-error' : ''}}">
    <label for="salle" class="col-md-4 control-label">{{ 'Salle' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="salle" type="text" id="salle" value="{{ $equipement->salle or ''}}" required>
        {!! $errors->first('salle', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('etat') ? 'has-error' : ''}}">
    <label for="etat" class="col-md-4 control-label">{{ 'Etat' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="etat" type="text" id="etat" value="{{ $equipement->etat or ''}}" required>
        {!! $errors->first('etat', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('document') ? 'has-error' : ''}}">
    <label for="document" class="col-md-4 control-label">{{ 'Document' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="document" type="text" id="document" value="{{ $equipement->document or ''}}" required>
        {!! $errors->first('document', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="col-md-4 control-label">{{ 'User Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="user_id" type="number" id="user_id" value="{{ $equipement->user_id or ''}}" required>
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
