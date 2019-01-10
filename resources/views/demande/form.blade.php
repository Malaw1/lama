<div class="form-group {{ $errors->has('molecule') ? 'has-error' : ''}}">
    {!! Form::label('molecule', 'Molecule', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('molecule', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('molecule', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('client_id') ? 'has-error' : ''}}">
    {!! Form::label('client_id', 'Client Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <select name="client_id" class="form-control select2">
            @foreach($client as $client)
                <option value="{{ $client->id}}">{{ $client->company_name}}</option>
            @endforeach
        </select>
    </div>
</div><div class="form-group {{ $errors->has('date_exp') ? 'has-error' : ''}}">
    {!! Form::label('date_exp', 'Date: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('date_exp', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('date_exp', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Description', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('description', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

{{--  <div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>  --}}
