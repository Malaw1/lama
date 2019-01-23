@foreach($molecule as $mole)
<div class="form-group {{ $errors->has('molecule') ? 'has-error' : ''}}">
    <label for="molecule" class="col-md-4 control-label">{{ 'Molecule / Dosage' }}</label>


      <div class="col-md-3">
        <input autocomplete="off" class="form-control" id="field1" name="molecule[]" type="text" data-items="8" value="{{$mole->molecule}}"/>
      </div>

      <div class="col-md-3">
        <input autocomplete="off" class="form-control" id="field1" name="molecule[]" type="text" data-items="8" value="{{$mole->dosage}}"/>
      </div>

        <!-- <input class="form-control" name="molecule" type="text" id="molecule" value="{{ $molecule->molecule or ''}}" required> -->
        {!! $errors->first('molecule', '<p class="help-block">:message</p>') !!}

</div>
  @endforeach

<div class="form-group {{ $errors->has('objet_essai') ? 'has-error' : ''}}">
    <!-- <label for="objet_essai" class="col-md-4 control-label">{{ 'Objet Essai' }}</label> -->
    <div class="col-md-6">
        <input class="form-control" name="objet_essai" type="hidden" id="objet_essai" value="{{ $molecule->objet_essai or ''}}" required>
        {!! $errors->first('objet_essai', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Enregistrer' }}">
    </div>
</div>
