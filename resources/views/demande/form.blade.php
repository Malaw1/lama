<div class="form-group {{ $errors->has('client') ? 'has-error' : ''}}">
    <label for="client" class="col-md-4 control-label">{{ 'Client' }}</label>
    <div class="col-md-6">
      <select name="client" class="form-control select2" id="client" value="{{ $demande->client or ''}}" required>
            @foreach($client as $client)
                <option value="{{ $client->id}}">{{ $client->company_name}}</option>
            @endforeach
        </select>
        <!-- <input class="form-control" name="client" type="number" id="client" value="{{ $demande->client or ''}}" required> -->
        {!! $errors->first('client', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('date_recue') ? 'has-error' : ''}}">
    <label for="date_recue" class="col-md-4 control-label">{{ 'Date Reception' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="date_recue" type="date" id="date_recue" value="{{ $demande->date_recue or ''}}" required>
        {!! $errors->first('date_recue', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('nombre_lot') ? 'has-error' : ''}}">
    <label for="date_recue" class="col-md-4 control-label">{{ 'Nombre de lot recu' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="nombre_lot" type="number" id="nombre_lot" value="{{ $demande->nombre_lot or ''}}" required>
        {!! $errors->first('nombre_lot', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('motif') ? 'has-error' : ''}}">
    <label for="motif" class="col-md-4 control-label">{{ 'Motif' }}</label>
    <div class="col-md-6">
          <select name="motif" class="form-control select2">
                <option value="Amm">AMM</option>
                <option value="Approvisonnement">Approvisonnement</option>
                <option value="Inspection Reglementee">Inspection reglementée</option>
                <option value="Surveillance Post Marketing">Surveillance Post Marketing</option>
                <option value="Suivi Pharmaco Vigilance">Suivi Pharmaco Vigilance</option>
            </select>
        <!-- <input class="form-control" name="forme_galenique" type="text" id="forme_galenique" value="{{ $objetessai->forme_galenique or ''}}" required> -->
        {!! $errors->first('motif', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="col-md-4 control-label">{{ 'Observation' }}</label>
    <div class="col-md-6">
      <textarea class="form-control" name="description" type="text" id="description" value="{{ $demande->description or ''}}" required></textarea>
        <!-- <input class="form-control" name="description" type="text" id="description" value="{{ $demande->description or ''}}" required> -->
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<input class="form-control" name="user_id" type="hidden" id="client" value="{{ Auth()->user()->id }}" required>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Enregistrer' }}">
    </div>
</div>
