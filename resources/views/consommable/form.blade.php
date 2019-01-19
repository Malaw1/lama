<div class="form-group {{ $errors->has('designation') ? 'has-error' : ''}}">
    <label for="designation" class="col-md-4 control-label">{{ 'Designation' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="designation" type="text" id="designation" value="{{ $consommable->designation or ''}}" required>
        {!! $errors->first('designation', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="col-md-4 control-label">{{ 'Type' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="type" type="text" id="type" value="{{ $consommable->type or ''}}" required>
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fabricant') ? 'has-error' : ''}}">
    <label for="fabricant" class="col-md-4 control-label">{{ 'Fabricant' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="fabricant" type="text" id="fabricant" value="{{ $consommable->fabricant or ''}}" required>
        {!! $errors->first('fabricant', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('date_recue') ? 'has-error' : ''}}">
    <label for="date_recue" class="col-md-4 control-label">{{ 'Date Recue' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="date_recue" type="date" id="date_recue" value="{{ $consommable->date_recue or ''}}" required>
        {!! $errors->first('date_recue', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('quantite') ? 'has-error' : ''}}">
    <label for="quantite" class="col-md-4 control-label">{{ 'Quantite' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="quantite" type="number" id="quantite" value="{{ $consommable->quantite or ''}}" required>
        {!! $errors->first('quantite', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
