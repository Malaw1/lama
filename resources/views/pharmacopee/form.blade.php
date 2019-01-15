<div class="form-group {{ $errors->has('pharmacopee') ? 'has-error' : ''}}">
    <label for="pharmacopee" class="col-md-4 control-label">{{ 'Pharmacopee' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="pharmacopee" type="text" id="pharmacopee" value="{{ $pharmacopee->pharmacopee or ''}}" required>
        {!! $errors->first('pharmacopee', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('lien') ? 'has-error' : ''}}">
    <label for="lien" class="col-md-4 control-label">{{ 'Lien' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="lien" type="text" id="lien" value="{{ $pharmacopee->lien or ''}}" required>
        {!! $errors->first('lien', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
