<div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
    {!! Form::label('code', 'Code', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('code', $objet->code, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('objet_essai') ? 'has-error' : ''}}">
    {!! Form::label('objet_essai', 'Objet Essai', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('objet_essai', $objet->id, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('objet_essai', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('reference') ? 'has-error' : ''}}">
    {!! Form::label('reference', 'Reference', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('reference',  $objet->reference, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('reference', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('dci') ? 'has-error' : ''}}">
    {!! Form::label('dci', 'Dci', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('dci', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('dci', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('dosage') ? 'has-error' : ''}}">
    {!! Form::label('dosage', 'Dosage', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('dosage', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('dosage', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('etat') ? 'has-error' : ''}}">
    {!! Form::label('Responsable', 'Responsable', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <select name="responsable" class="form-control select2">
            @foreach($user as $user)
                <option value="{{ $user->id}}">{{ $user->name}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
