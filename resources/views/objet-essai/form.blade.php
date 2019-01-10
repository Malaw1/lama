<div class="form-group {{ $errors->has('designation') ? 'has-error' : ''}}">
    {!! Form::label('designation', 'Designation', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('designation', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('designation', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('forme_galenique') ? 'has-error' : ''}}">
    {!! Form::label('forme_galenique', 'Forme Galenique', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
            <select name="forme_galenique" class="form-control select2">
                <option value="comprime">Comprime</option>
                <option value="gellule">Gellule</option>
                <option value="vaccin">Vaccin</option>
                <option value="sirop">Sirop</option>
                <option value="injectable">Injectable</option>
            </select>
        {!! $errors->first('forme_galenique', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('date_recue') ? 'has-error' : ''}}">
    {!! Form::label('date_recue', 'Date Recue', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('date_recue', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('date_recue', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('quantite_recue') ? 'has-error' : ''}}">
    {!! Form::label('quantite_recue', 'Quantite Recue', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('quantite_recue', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('quantite_recue', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('lot') ? 'has-error' : ''}}">
    {!! Form::label('lot', 'Lot', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('lot', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('lot', '<p class="help-block">:message</p>') !!}
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
</div><div class="form-group {{ $errors->has('provenance') ? 'has-error' : ''}}">
    {!! Form::label('provenance', 'Provenance', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('provenance', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('provenance', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('fabricant_id') ? 'has-error' : ''}}">
    {!! Form::label('fabricant_id', 'Fabricant Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
    <select name="fabricant_id" class="form-control select2">
        @foreach($fabricant as $fabricant)
            <option value="{{ $fabricant->id}}">{{ $fabricant->company_name}}</option>
        @endforeach
    </select>
    </div>
</div>
<div class="form-group {{ $errors->has('demande_id') ? 'has-error' : ''}}">
    {!! Form::label('demande_id', 'Demande Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
    <select name="demande_id" class="form-control select2">
        @foreach($demande as $demande)
            <option value="{{ $demande->id}}">{{ $demande->code}}</option>
        @endforeach
    </select>
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
