<div class="form-group {{ $errors->has('parametre') ? 'has-error' : ''}}">
    {!! Form::label('parametre', 'Parametre', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">

        <select name="parametre[]" data-dependent="methode" id="param" class="dynamic select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choose">
            @foreach($parametre as $test)
                <option value="{{ $test->parametre}}">{{ $test->parametre}}</option>
            @endforeach
        </select>
        
    </div>
</div>

{{--  <div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>  --}}
