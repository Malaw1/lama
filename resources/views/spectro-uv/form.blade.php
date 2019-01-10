<div class="form-group {{ $errors->has('equipement') ? 'has-error' : ''}}">
    {!! Form::label('equipement', 'Equipement', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('equipement', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('equipement', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('longueure_onde') ? 'has-error' : ''}}">
    {!! Form::label('longueure_onde', 'Longueure Onde', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('longueure_onde', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('longueure_onde', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('blanc') ? 'has-error' : ''}}">
    {!! Form::label('blanc', 'Blanc', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('blanc', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('blanc', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('balance') ? 'has-error' : ''}}">
    {!! Form::label('balance', 'Balance', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('balance', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('balance', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('ph') ? 'has-error' : ''}}">
    {!! Form::label('ph', 'Ph', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('ph', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('ph', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
