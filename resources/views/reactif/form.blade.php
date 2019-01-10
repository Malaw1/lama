<div class="form-group {{ $errors->has('designation') ? 'has-error' : ''}}">
    {!! Form::label('designation', 'Designation', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('designation', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('designation', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('depositaire') ? 'has-error' : ''}}">
    {!! Form::label('depositaire', 'Depositaire', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('depositaire', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('depositaire', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('quantite') ? 'has-error' : ''}}">
    {!! Form::label('quantite', 'Quantite', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('quantite', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('quantite', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fabricant') ? 'has-error' : ''}}">
    {!! Form::label('fabricant', 'Fabricant', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('fabricant', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('fabricant', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('lot') ? 'has-error' : ''}}">
    {!! Form::label('lot', 'Lot', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('lot', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('lot', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('conditionnement') ? 'has-error' : ''}}">
    {!! Form::label('conditionnement', 'Conditionnement', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('conditionnement', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('conditionnement', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('catalog') ? 'has-error' : ''}}">
    {!! Form::label('catalog', 'Catalog', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('catalog', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('catalog', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cas') ? 'has-error' : ''}}">
    {!! Form::label('cas', 'Cas', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('cas', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('cas', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('date_fab') ? 'has-error' : ''}}">
    {!! Form::label('date_fab', 'Date Fab', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('date_fab', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('date_fab', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('date_exp') ? 'has-error' : ''}}">
    {!! Form::label('date_exp', 'Date Exp', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('date_exp', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('date_exp', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
