<div class="form-group {{ $errors->has('company_name') ? 'has-error' : ''}}">
    <label for="company_name" class="col-md-4 control-label">{{ 'Company Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="company_name" type="text" id="company_name" value="{{ $fabricant->company_name or ''}}" required>
        {!! $errors->first('company_name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('adresse') ? 'has-error' : ''}}">
    <label for="adresse" class="col-md-4 control-label">{{ 'Adresse' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="adresse" type="text" id="adresse" value="{{ $fabricant->adresse or ''}}" required>
        {!! $errors->first('adresse', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('telephone') ? 'has-error' : ''}}">
    <label for="telephone" class="col-md-4 control-label">{{ 'Telephone' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="telephone" type="text" id="telephone" value="{{ $fabricant->telephone or ''}}" required>
        {!! $errors->first('telephone', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="email" type="text" id="email" value="{{ $fabricant->email or ''}}" required>
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="col-md-4 control-label">{{ 'Description' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="description" type="text" id="description" value="{{ $fabricant->description or ''}}" required>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
