<div class="form-group {{ $errors->has('reference') ? 'has-error' : ''}}">
    {!! Form::label('reference', 'Reference', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('reference', array('USP' => 'USP', 'BP' => 'BP'), 'USP', ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('reference', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('objet_essai') ? 'has-error' : ''}}">
    {!! Form::label('objet_essai', 'Objet Essai', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <select name="objet_essai" class="form-control select2">
            @foreach($objet as $test)
                <option value="{{ $test->id}}">{{ $test->code}}</option>
            @endforeach
        </select>
    </div>
</div><div class="form-group {{ $errors->has('molecule') ? 'has-error' : ''}}">
    {!! Form::label('molecule', 'Molecule', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('molecule', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('molecule', '<p class="help-block">:message</p>') !!}
    </div>
</div>

{{--  <div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>  --}}
