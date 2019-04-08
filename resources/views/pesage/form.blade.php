<div class="form-group {{ $errors->has('poids_total') ? 'has-error' : ''}}">
    <label for="poids_total" class="col-md-4 control-label">{{ 'Poids Total' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="poids_total" type="number" id="poids_total" value="{{ $pesage->poids_total or ''}}" required>
        {!! $errors->first('poids_total', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('poids_moyen') ? 'has-error' : ''}}">
    <label for="poids_moyen" class="col-md-4 control-label">{{ 'Poids Moyen' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="poids_moyen" type="number" id="poids_moyen" value="{{ $pesage->poids_moyen or ''}}" required>
        {!! $errors->first('poids_moyen', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('tolerance') ? 'has-error' : ''}}">
    <label for="tolerance" class="col-md-4 control-label">{{ 'Tolerance' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="tolerance" type="number" id="tolerance" value="{{ $pesage->tolerance or ''}}" required>
        {!! $errors->first('tolerance', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('ecart_type') ? 'has-error' : ''}}">
    <label for="ecart_type" class="col-md-4 control-label">{{ 'Ecart Type' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="ecart_type" type="number" id="ecart_type" value="{{ $pesage->ecart_type or ''}}" required>
        {!! $errors->first('ecart_type', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('uniformite_masse') ? 'has-error' : ''}}">
    <label for="uniformite_masse" class="col-md-4 control-label">{{ 'Uniformite Masse' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="uniformite_masse" type="text" id="uniformite_masse" value="{{ $pesage->uniformite_masse or ''}}" required>
        {!! $errors->first('uniformite_masse', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('variation') ? 'has-error' : ''}}">
    <label for="variation" class="col-md-4 control-label">{{ 'Variation' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="variation" type="number" id="variation" value="{{ $pesage->variation or ''}}" required>
        {!! $errors->first('variation', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('appareil') ? 'has-error' : ''}}">
    <label for="appareil" class="col-md-4 control-label">{{ 'Appareil' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="appareil" type="text" id="appareil" value="{{ $pesage->appareil or ''}}" required>
        {!! $errors->first('appareil', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<input class="form-control" name="user_id" type="hidden" id="user_id" value="{{ $pesage->user_id or auth()->user()->id}}" required>
<input class="form-control" name="analyse_id" type="hidden" id="analyse_id" value="{{ $_GET['id'] or ''}}" required>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
