<div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
    {!! Form::label('code', 'Code', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('code', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('appareil') ? 'has-error' : ''}}">
    {!! Form::label('appareil', 'Appareil', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('appareil', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('appareil', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fabricant') ? 'has-error' : ''}}">
    {!! Form::label('fabricant', 'Fabricant', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('fabricant', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('fabricant', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    {!! Form::label('type', 'Type', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('type', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('serie') ? 'has-error' : ''}}">
    {!! Form::label('serie', 'Serie', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('serie', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('serie', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('date_installation') ? 'has-error' : ''}}">
    {!! Form::label('date_installation', 'Date Installation', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('date_installation', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('date_installation', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('salle') ? 'has-error' : ''}}">
    {!! Form::label('salle', 'Salle', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('salle', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('salle', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('etat') ? 'has-error' : ''}}">
    {!! Form::label('etat', 'Etat', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('etat', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('etat', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('document_technique') ? 'has-error' : ''}}">
    {!! Form::label('document_technique', 'Document Technique', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="checkbox">
    <label>{!! Form::radio('%1$s', '1') !!} Yes</label>
</div>
<div class="checkbox">
    <label>{!! Form::radio('%1$s', '0', true) !!} No</label>
</div>
        {!! $errors->first('document_technique', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
