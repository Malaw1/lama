<div class="form-group {{ $errors->has('objet_essai') ? 'has-error' : ''}}">
    <label for="objet_essai" class="col-md-4 control-label">{{ 'Objet Essai' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="objet_essai" type="text" id="objet_essai" value="{{ $objet->code}}" required disabled>
        {!! $errors->first('objet_essai', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('reference') ? 'has-error' : ''}}">
    <label for="reference" class="col-md-4 control-label">{{ 'Reference' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="reference" type="text" id="reference" value="{{ $analyse->reference or ''}}" required>
        {!! $errors->first('reference', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('dci') ? 'has-error' : ''}}">
    <label for="dci" class="col-md-4 control-label">{{ 'Dci' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="dci" type="text" id="dci" value="{{ $analyse->dci or ''}}" required>
        {!! $errors->first('dci', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('dosage') ? 'has-error' : ''}}">
    <label for="dosage" class="col-md-4 control-label">{{ 'Dosage' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="dosage" type="text" id="dosage" value="{{ $analyse->dosage or ''}}" required>
        {!! $errors->first('dosage', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('etat') ? 'has-error' : ''}}">
    <!-- <label for="etat" class="col-md-4 control-label">{{ 'Etat' }}</label> -->
    <div class="col-md-6">
        <input class="form-control" name="etat" type="hidden" id="etat" value="{{ $analyse->etat or 'En cours'}}" required>
        {!! $errors->first('etat', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('responable') ? 'has-error' : ''}}">
    <label for="responable" class="col-md-4 control-label">{{ 'Responable' }}</label>
    <div class="col-md-6">
      <select name="responsable" class="form-control select2" >
          @foreach($user as $test)
            <option value="{{ $test->id}}">{{ $test->name}}</option>
            @endforeach
    </select>
        <!-- <input class="form-control" name="responable" type="text" id="responable" value="{{ $analyse->responable or ''}}" required> -->
        {!! $errors->first('responable', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Enregistrer' }}">
    </div>
</div>
