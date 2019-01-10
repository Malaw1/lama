<div class="form-group {{ $errors->has('parametre') ? 'has-error' : ''}}">
    {!! Form::label('parametre', 'Parametre', ['class' => 'col-md-4 control-label']) !!}
    <select name="parametre[]" class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choose">
        @foreach($parametre as $test)
            <option value="{{ $test->parametre}}">{{ $test->parametre}}</option>
        @endforeach
    </select>
</div>

{{--  <div class="form-group {{ $errors->has('demande_id') ? 'has-error' : ''}}">
    {!! Form::label('demande_id', 'Demande Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('demande_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('demande_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>  --}}

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
