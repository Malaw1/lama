<div class="form-group {{ $errors->has('equipement') ? 'has-error' : ''}}">
    <label for="equipement" class="col-md-4 control-label">{{ 'Equipement' }}</label>
    <div class="col-md-6">
      <select class="form-control" name="equipement" id="equipement" required>
        @foreach($equip as $equip)
            <option value="{{ $equip->id}}">{{ $equip->code}}</option>
        @endforeach
        <!-- <option value=""></option> -->
      </select>
        <!-- <input class="form-control" name="equipement" type="number" id="equipement" value="{{ $eqqualif->equipement or ''}}" required> -->
        {!! $errors->first('equipement', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('date_calib') ? 'has-error' : ''}}">
    <label for="date_calib" class="col-md-4 control-label">{{ 'Date Calib.' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="date_calib" type="date" id="date_calib" value="{{ $eqqualif->date_calib or ''}}" required>
        {!! $errors->first('date_calib', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('next_calib') ? 'has-error' : ''}}">
    <label for="next_calib" class="col-md-4 control-label">{{ 'Prochaine Calib.' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="next_calib" type="date" id="next_calib" value="{{ $eqqualif->next_calib or ''}}" required>
        {!! $errors->first('next_calib', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('auteur') ? 'has-error' : ''}}">
    <label for="auteur" class="col-md-4 control-label">{{ 'Auteur' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="auteur" type="text" id="auteur" value="{{ $eqqualif->auteur or ''}}" required>
        {!! $errors->first('auteur', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('details') ? 'has-error' : ''}}">
    <label for="details" class="col-md-4 control-label">{{ 'Details' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="details" type="textarea" id="details" required>{{ $eqqualif->details or ''}}</textarea>
        {!! $errors->first('details', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <!-- <label for="user_id" class="col-md-4 control-label">{{ 'User Id' }}</label> -->
    <div class="col-md-6">
        <input class="form-control" name="user_id" type="hidden" id="user_id" value="{{ auth()->user()->id }}" required>
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Enregistrer' }}">
    </div>
</div>
