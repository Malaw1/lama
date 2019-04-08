@push('js')
<script>
            function checkRemove() {
                if ($('div.react').length == 1) {
                    $('#remove').hide();
                } else {
                    $('#remove').show();
                }
            };
            $(document).ready(function() {
                checkRemove()
                $('#add').click(function() {
                    $('div.react:last').after($('div.react:first').clone());
                    checkRemove();
                });
                $('#remove').click(function() {
                    $('div.react:last').remove();
                    checkRemove();
                });
            });
        </script>
@endpush

<div class="form-group {{ $errors->has('demandeur') ? 'has-error' : ''}}">
    <label for="demandeur" class="col-md-4 control-label">{{ 'Demande' }}</label>
    <div class="col-md-6">
      <select name="demandeur" class="form-control select2" >
            <option value="{{ $demande->id}}">{{ $demande->code}}</option>
    </select>
        <input class="form-control" name="demand" type="hidden" id="demandeur" value="{{ $demande->code}}" >
        {!! $errors->first('demandeur', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
    <!-- <label for="code" class="col-md-4 control-label">{{ 'Code' }}</label> -->
    <div class="col-md-6">
        <input class="form-control" name="code" type="hidden" id="code" value="{{ $objetessai->code or ''}}" required>
        <!-- {!! $errors->first('code', '<p class="help-block">:message</p>') !!} -->
    </div>
</div>

<div class="form-group {{ $errors->has('date_recue') ? 'has-error' : ''}}">
    <label for="date_recue" class="col-md-4 control-label">{{ 'Date Reception' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="date_recue" type="date" id="date_recue" value="{{ $demande->date_recue or ''}}" required>
        {!! $errors->first('date_recue', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('designation') ? 'has-error' : ''}}">
    <label for="designation" class="col-md-4 control-label">{{ 'Designation' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="designation" type="text" id="designation" value="{{ $objetessai->designation or ''}}" required>
        {!! $errors->first('designation', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('forme_galenique') ? 'has-error' : ''}}">
    <label for="forme_galenique" class="col-md-4 control-label">{{ 'Forme Galenique' }}</label>
    <div class="col-md-6">
          <select name="forme_galenique" class="form-control select2">
                <option value="comprime">Comprime</option>
                <option value="gellule">Gellule</option>
                <option value="vaccin">Vaccin</option>
                <option value="sirop">Sirop</option>
                <option value="injectable">Injectable</option>
            </select>
        <!-- <input class="form-control" name="forme_galenique" type="text" id="forme_galenique" value="{{ $objetessai->forme_galenique or ''}}" required> -->
        {!! $errors->first('forme_galenique', '<p class="help-block">:message</p>') !!}
    </div>
</div>
  @if($molecule == null)
<div class="row react">
<div class="form-group {{ $errors->has('molecule') ? 'has-error' : ''}}">
    <label for="molecule" class="col-md-4 control-label">{{ 'Molecule/Dosage' }}</label>
      <div class="col-md-3">
        <input autocomplete="off" class="form-control col" id="molecule" name="molecule[]" type="text" data-items="8" placeholder="Molecule"/>
      </div>
      <div class="col-md-3">
        <input autocomplete="off" class="form-control col" id="dosage" name="dosage[]" type="text" data-items="8" placeholder="Dosage"/>
      </div>

        {!! $errors->first('molecule', '<p class="help-block">:message</p>') !!}
  </div>
</div>
<div class="form-group {{ $errors->has('molecule') ? 'has-error' : ''}}">
    <label for="molecule" class="col-md-4 control-label"></label>
      <div class="col-md-3">
      <div class="d-flex justify-content-center">
          <button id="add" class="btn add-more btn-success" type="button">+</button>
          <button id="remove" class="btn add-more btn-danger" type="button">-</button>
        </div>
      </div>
    </div>
@else

@foreach($molecule as $mole)
<div class="row react">

<div class="form-group {{ $errors->has('molecule') ? 'has-error' : ''}}">
    <label for="molecule" class="col-md-4 control-label">{{ 'Molecule/Dosage' }}</label>
      <div class="col-md-3">
        <input autocomplete="off" class="form-control col" id="molecule" name="molecule[]" type="text" data-items="8" placeholder="Molecule" value="{{ $mole->molecule }}"/>
      </div>
      <div class="col-md-3">
        <input autocomplete="off" class="form-control col" id="dosage" name="dosage[]" type="text" data-items="8" placeholder="Dosage" value="{{ $mole->dosage }}"/>
      </div>

        {!! $errors->first('molecule', '<p class="help-block">:message</p>') !!}
  </div>

</div>
@endforeach
<div class="form-group {{ $errors->has('molecule') ? 'has-error' : ''}}">
    <label for="molecule" class="col-md-4 control-label"></label>
      <div class="col-md-3">
      <div class="d-flex justify-content-center">
          <button id="add" class="btn add-more btn-success" type="button">+</button>
          <button id="remove" class="btn add-more btn-danger" type="button">-</button>
        </div>
      </div>
    </div>

@endif

<div class="form-group {{ $errors->has('quantite') ? 'has-error' : ''}}">
    <label for="quantite" class="col-md-4 control-label">{{ 'Quantite' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="quantite" type="text" id="quantite" value="{{ $objetessai->quantite or ''}}" required>
        {!! $errors->first('quantite', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('conditionnement') ? 'has-error' : ''}}">
    <label for="conditionnement" class="col-md-4 control-label">{{ 'Conditionnement' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="conditionnement" type="text" id="conditionnement" value="{{ $objetessai->conditionnement or ''}}"  required>
        {!! $errors->first('conditionnement', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('lot') ? 'has-error' : ''}}">
    <label for="lot" class="col-md-4 control-label">{{ 'Lot' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="lot" type="text" id="lot" value="{{ $objetessai->lot or ''}}" required>
        {!! $errors->first('lot', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('date_fab') ? 'has-error' : ''}}">
    <label for="date_fab" class="col-md-4 control-label">{{ 'Date Fab' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="date_fab" type="date" id="date_fab" value="{{ $objetessai->date_fab or ''}}" required>
        {!! $errors->first('date_fab', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('date_exp') ? 'has-error' : ''}}">
    <label for="date_exp" class="col-md-4 control-label">{{ 'Date de Perempt.' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="date_exp" type="date" id="date_exp" value="{{ $objetessai->date_exp or ''}}" required>
        {!! $errors->first('date_exp', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('provenance') ? 'has-error' : ''}}">
    <label for="provenance" class="col-md-4 control-label">{{ 'Provenance' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="provenance" type="text" id="provenance" value="{{ $objetessai->provenance or ''}}" required>
        {!! $errors->first('provenance', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('fabricant') ? 'has-error' : ''}}">
    <label for="fabricant" class="col-md-4 control-label">{{ 'Fabricant' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="fabricant" type="text" id="fabricant" value="{{ $objetessai->fabricant or ''}}" required>
        {!! $errors->first('fabricant', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<input class="form-control" name="user_id" type="hidden" id="user_id" value="{{ auth()->user()->id}}" required>

<!-- <div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Enregistrer' }}">
    </div>
</div> -->
