{{--  <div class="form-group {{ $errors->has('faisabilite_id') ? 'has-error' : ''}}">
    {!! Form::label('faisabilite_id', 'Faisabilite Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('faisabilite_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('faisabilite_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>  --}}

<div class="form-group {{ $errors->has('materiel') ? 'has-error' : ''}}">
    {!! Form::label('materiel', 'Materiel', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <select name="materiel[]" class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choose">
            @foreach($materiel as $test)
                <option value="{{ $test->designation}}">{{ $test->designation}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Valider', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
