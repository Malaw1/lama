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
</div><div class="form-group {{ $errors->has('date_installation') ? 'has-error' : ''}}">
    <label for="date_installation" class="col-md-4 control-label">{{ 'Date Installation' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="date_installation" type="date" id="date_installation" value="{{ $equipement->date_installation or ''}}" required>
        {!! $errors->first('date_installation', '<p class="help-block">:message</p>') !!}
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
</div><div class="form-group {{ $errors->has('document_technique') ? 'has-error' : ''}}">
    <label for="document_technique" class="col-md-4 control-label">{{ 'Document Technique' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="document_technique" type="text" id="document_technique" value="{{ $equipement->document_technique or ''}}" required>
        {!! $errors->first('document_technique', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
