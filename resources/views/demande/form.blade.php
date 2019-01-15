<div class="form-group {{ $errors->has('molecule') ? 'has-error' : ''}}">
    <label for="molecule" class="col-md-4 control-label">{{ 'Molecule' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="molecule" type="text" id="molecule" value="{{ $demande->molecule or ''}}" required>
        {!! $errors->first('molecule', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('date_demande') ? 'has-error' : ''}}">
    <label for="date_demande" class="col-md-4 control-label">{{ 'Date Demande' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="date_demande" type="date" id="date_demande" value="{{ $demande->date_demande or ''}}" required>
        {!! $errors->first('date_demande', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('client_id') ? 'has-error' : ''}}">
    <label for="client_id" class="col-md-4 control-label">{{ 'Client Id' }}</label>
    <div class="col-md-6">
      <select class="form-control select2" name="client_id" type="number" id="client_id" required>
          @foreach($client as $client)
              <option  value="{{ $client->id}}">{{ $client->company_name}}</option>
          @endforeach
      </select>
        <!-- <input class="form-control" name="client_id" type="number" id="client_id" value="{{ $demande->client_id or ''}}" required> -->
        {!! $errors->first('client_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="col-md-4 control-label">{{ 'Description' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="description" type="textarea" id="description" required>{{ $demande->description or ''}}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
      <input class="form-control" name="user_id" type="hidden" id="type" value="{{ auth()->user()->id }}" required>
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Enregistrer' }}">
    </div>
</div>
