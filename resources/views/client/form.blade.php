<div class="form-group {{ $errors->has('company_name') ? 'has-error' : ''}}">
    {!! Form::label('company_name', 'Company Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('company_name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('company_name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('adresse') ? 'has-error' : ''}}">
    {!! Form::label('adresse', 'Adresse', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('adresse', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('adresse', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('telephone') ? 'has-error' : ''}}">
    {!! Form::label('telephone', 'Telephone', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('telephone', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('telephone', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('email', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Description', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('description', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
