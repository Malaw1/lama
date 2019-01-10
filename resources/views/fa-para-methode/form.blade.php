<div class="form-group {{ $errors->has('parametre') ? 'has-error' : ''}}">
    {!! Form::label('parametre', 'Parametre', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('parametre', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('parametre', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('methode') ? 'has-error' : ''}}">
    {!! Form::label('methode', 'Methode', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('methode', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('methode', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('faisabilite_id') ? 'has-error' : ''}}">
    {!! Form::label('faisabilite_id', 'Faisabilite Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('faisabilite_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('faisabilite_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
