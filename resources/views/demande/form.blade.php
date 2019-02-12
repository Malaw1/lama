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

<div class="form-group {{ $errors->has('molecule') ? 'has-error' : ''}}">
    <label for="molecule" class="col-md-4 control-label">{{ "Designation objet d'essai" }}</label>
    <div class="col-md-6">
        <input class="form-control" name="designation" type="text" id="molecule" value="{{ $demande->designation or ''}}" required>
        {!! $errors->first('molecule', '<p class="help-block">:message</p>') !!}
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

<div class="form-group {{ $errors->has('fabricant') ? 'has-error' : ''}}">
    <label for="fabricant" class="col-md-4 control-label">{{ 'Fabricant' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="fabricant" type="text" id="fabricant" value="{{ $demande->fabricant or ''}}" required>
        {!! $errors->first('fabricant', '<p class="help-block">:message</p>') !!}
    </div>
</div>



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

<div class="form-group {{ $errors->has('lot') ? 'has-error' : ''}}">
    <label for="lot" class="col-md-4 control-label">{{ 'Nombre de Lots Recue' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="lot" type="text" id="lot" value="{{ $demande->lot or ''}}" required>
        {!! $errors->first('lot', '<p class="help-block">:message</p>') !!}
    </div>
</div>
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
</div><div class="form-group {{ $errors->has('date_recue') ? 'has-error' : ''}}">
    <label for="date_recue" class="col-md-4 control-label">{{ 'Date Reception' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="date_recue" type="date" id="date_recue" value="{{ $demande->date_recue or ''}}" required>
        {!! $errors->first('date_recue', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <!-- <label for="user_id" class="col-md-4 control-label">{{ 'User Id' }}</label> -->
    <div class="col-md-6">
        <input class="form-control" name="user_id" type="hidden" id="user_id" value="{{ auth()->user()->id}}" required>
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="col-md-4 control-label">{{ 'Commentaires' }}</label>
    <div class="col-md-6">
      <textarea class="form-control" name="description" type="text" id="description" value="{{ $demande->description or ''}}" required></textarea>
        <!-- <input class="form-control" name="description" type="text" id="description" value="{{ $demande->description or ''}}" required> -->
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('motif') ? 'has-error' : ''}}">
    <label for="motif" class="col-md-4 control-label">{{ 'Motif' }}</label>
    <div class="col-md-6">
          <select name="motif" class="form-control select2">
                <option value="amm">AMM</option>
                <option value="approvisonnement">Approvisonnement</option>
                <option value="inspection_reglementee">Inspection reglementée</option>
                <option value="spm">Surveillence Post Marketing</option>
                <option value="spv">Suivi Pharmaco Vigilance</option>
            </select>
        <!-- <input class="form-control" name="forme_galenique" type="text" id="forme_galenique" value="{{ $objetessai->forme_galenique or ''}}" required> -->
        {!! $errors->first('motif', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<!-- <div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Enregistrer' }}">
    </div>
</div> -->
