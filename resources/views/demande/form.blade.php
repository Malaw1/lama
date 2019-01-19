<div class="form-group {{ $errors->has('molecule') ? 'has-error' : ''}}">
    <label for="molecule" class="col-md-4 control-label">{{ 'Molecule' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="molecule" type="text" id="molecule" value="{{ $demande->molecule or ''}}" required>
        {!! $errors->first('molecule', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('client') ? 'has-error' : ''}}">
    <label for="client" class="col-md-4 control-label">{{ 'Client' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="client" type="number" id="client" value="{{ $demande->client or ''}}" required>
        {!! $errors->first('client', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="col-md-4 control-label">{{ 'Description' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="description" type="text" id="description" value="{{ $demande->description or ''}}" required>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('date_recue') ? 'has-error' : ''}}">
    <label for="date_recue" class="col-md-4 control-label">{{ 'Date Recue' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="date_recue" type="date" id="date_recue" value="{{ $demande->date_recue or ''}}" required>
        {!! $errors->first('date_recue', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="col-md-4 control-label">{{ 'User Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="user_id" type="number" id="user_id" value="{{ $demande->user_id or ''}}" required>
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
