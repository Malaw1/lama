<div class="form-group {{ $errors->has('designation') ? 'has-error' : ''}}">
    {!! Form::label('designation', 'Designation', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('designation', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('designation', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    {!! Form::label('type', 'Type', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('type', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fabricant') ? 'has-error' : ''}}">
    {!! Form::label('fabricant', 'Fabricant', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('fabricant', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('fabricant', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('unite_recu') ? 'has-error' : ''}}">
    {!! Form::label('unite_recu', 'Unite Recu', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('unite_recu', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('unite_recu', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('date_recue') ? 'has-error' : ''}}">
    {!! Form::label('date_recue', 'Date Recue', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('date_recue', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('date_recue', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
