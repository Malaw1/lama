{{--  <div class="form-group {{ $errors->has('faisabilite_id') ? 'has-error' : ''}}">
    {!! Form::label('faisabilite_id', 'Faisabilite Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('faisabilite_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('faisabilite_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>  --}}

<div class="form-group {{ $errors->has('reactif') ? 'has-error' : ''}}">
    {!! Form::label('reactif', 'Reactif', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <select name="reactif[]" class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choose">
            @foreach($reactif as $reactif)
                <option value="{{ $reactif->designation}}">{{ $reactif->designation}}</option>
            @endforeach
        </select>
    </div>
</div>

{{--  <div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>  --}}
