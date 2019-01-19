<div class="form-group {{ $errors->has('parametre') ? 'has-error' : ''}}">
    <label for="parametre" class="col-md-4 control-label">{{ 'Parametre' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="parametre" type="text" id="parametre" value="{{ $parademande->parametre or ''}}" required>
        {!! $errors->first('parametre', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('demande') ? 'has-error' : ''}}">
    <label for="demande" class="col-md-4 control-label">{{ 'Demande' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="demande" type="number" id="demande" value="{{ $parademande->demande or ''}}" required>
        {!! $errors->first('demande', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
