<div class="form-group {{ $errors->has('equipement') ? 'has-error' : ''}}">
    {!! Form::label('equipement', 'Equipement', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('equipement', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('equipement', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('balance') ? 'has-error' : ''}}">
    {!! Form::label('balance', 'Balance', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('balance', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('balance', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('pHmetre') ? 'has-error' : ''}}">
    {!! Form::label('pHmetre', 'Phmetre', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('pHmetre', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('pHmetre', '<p class="help-block">:message</p>') !!}
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
