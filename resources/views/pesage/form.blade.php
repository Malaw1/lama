<div class="form-group {{ $errors->has('ptotal') ? 'has-error' : ''}}">
    {!! Form::label('ptotal', 'Ptotal', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('ptotal', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('ptotal', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('pm') ? 'has-error' : ''}}">
    {!! Form::label('pm', 'Pm', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('pm', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('pm', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('tolerance') ? 'has-error' : ''}}">
    {!! Form::label('tolerance', 'Tolerance', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('tolerance', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('tolerance', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('ecart_type') ? 'has-error' : ''}}">
    {!! Form::label('ecart_type', 'Ecart Type', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('ecart_type', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('ecart_type', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('uniformite_masse') ? 'has-error' : ''}}">
    {!! Form::label('uniformite_masse', 'Uniformite Masse', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('uniformite_masse', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('uniformite_masse', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('variation') ? 'has-error' : ''}}">
    {!! Form::label('variation', 'Variation', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('variation', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('variation', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('equipement') ? 'has-error' : ''}}">
    {!! Form::label('equipement', 'Equipement', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('equipement', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('equipement', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('analyse_id') ? 'has-error' : ''}}">
    {!! Form::label('analyse_id', 'Analyse Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('analyse_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('analyse_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
