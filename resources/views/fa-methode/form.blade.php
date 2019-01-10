{{--  <div class="form-group {{ $errors->has('faisabilite_id') ? 'has-error' : ''}}">
    {!! Form::label('faisabilite_id', 'Faisabilite Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('faisabilite_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('faisabilite_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
--}}
<div class="form-group {{ $errors->has('methode') ? 'has-error' : ''}}"> 
    {!! Form::label('methode', 'Methode', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <select name="methode[]" id="methode" class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choose">
            @foreach($methode as $methode)
                <option value="{{ $methode->methode}}">{{ $methode->methode}}</option>
            @endforeach
        </select>
    </div>
</div>
{{--  
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>  --}}
