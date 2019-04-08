<div class="form-group {{ $errors->has('designation') ? 'has-error' : ''}}">
    <label for="designation" class="col-md-4 control-label">{{ 'Designation' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="designation" type="text" id="designation" value="{{ $reactif->designation or ''}}" required>
        {!! $errors->first('designation', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('date_recep') ? 'has-error' : ''}}">
    <label for="date_recep" class="col-md-4 control-label">{{ 'Date Recep' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="date_recep" type="date" id="date_recep" value="{{ $reactif->date_recep or ''}}" required>
        {!! $errors->first('date_recep', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('depositaire') ? 'has-error' : ''}}">
    <label for="depositaire" class="col-md-4 control-label">{{ 'Depositaire' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="depositaire" type="text" id="depositaire" value="{{ $reactif->depositaire or ''}}" required>
        {!! $errors->first('depositaire', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('unite_recue') ? 'has-error' : ''}}">
    <label for="unite_recue" class="col-md-4 control-label">{{ 'Unite Recue' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="unite_recue" type="number" id="unite_recue" value="{{ $reactif->unite_recue or ''}}" required>
        {!! $errors->first('unite_recue', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('forme_galenique') ? 'has-error' : ''}}">
    <label for="forme_galenique" class="col-md-4 control-label">{{ 'Forme Galenique' }}</label>
    <div class="col-md-3">
      <select name="forme_galenique" class="form-control select2">
          <option value="Poudre">Poudre</option>
          <option value="Liquide">Liquide</option>
      </select>
        <!-- <input class="form-control" name="forme_galenique" type="text" id="forme_galenique" value="{{ $reactif->forme_galenique or ''}}" required> -->
        {!! $errors->first('forme_galenique', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-3">
      <select name="container" class="form-control select2">
          <option value="Bouteille">Bouteille</option>
          <option value="Flacon">Flacon</option>
          <option value="Ampoule">Ampoule</option>
      </select>
        <!-- <input class="form-control" name="forme_galenique" type="text" id="forme_galenique" value="{{ $reactif->forme_galenique or ''}}" required> -->
        {!! $errors->first('forme_galenique', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('quantite') ? 'has-error' : ''}}">
    <label for="quantite" class="col-md-4 control-label">{{ 'Quantite / Unite' }}</label>
    <div class="col-md-3">
        <input class="form-control" name="quantite" type="text" id="quantite" value="{{ $reactif->quantite or ''}}" required>
        {!! $errors->first('quantite', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-3">
        <input class="form-control" name="unite" type="text" id="unite" value="{{ $reactif->unite or ''}}" required>
        {!! $errors->first('quantite', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('fabricant') ? 'has-error' : ''}}">
    <label for="fabricant" class="col-md-4 control-label">{{ 'Fabricant' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="fabricant" type="text" id="fabricant" value="{{ $reactif->fabricant or ''}}" required>
        {!! $errors->first('fabricant', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('lot') ? 'has-error' : ''}}">
    <label for="lot" class="col-md-4 control-label">{{ 'Lot' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="lot" type="text" id="lot" value="{{ $reactif->lot or ''}}" required>
        {!! $errors->first('lot', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('date_fab') ? 'has-error' : ''}}">
    <label for="date_fab" class="col-md-4 control-label">{{ 'Date Fab' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="date_fab" type="date" id="date_fab" value="{{ $reactif->date_fab or ''}}" >
        {!! $errors->first('date_fab', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('date_exp') ? 'has-error' : ''}}">
    <label for="date_exp" class="col-md-4 control-label">{{ 'Date Exp' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="date_exp" type="date" id="date_exp" value="{{ $reactif->date_exp or ''}}" >
        {!! $errors->first('date_exp', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('catalog') ? 'has-error' : ''}}">
    <label for="catalog" class="col-md-4 control-label">{{ 'Catalog' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="catalog" type="text" id="catalog" value="{{ $reactif->catalog or ''}}"  >
        {!! $errors->first('catalog', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cas') ? 'has-error' : ''}}">
    <label for="cas" class="col-md-4 control-label">{{ 'Cas' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="cas" type="text" id="cas" value="{{ $reactif->cas or ''}}" >
        {!! $errors->first('cas', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('prix') ? 'has-error' : ''}}">
    <label for="prix" class="col-md-4 control-label">{{ 'Prix' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="prix" type="text" id="prix" value="{{ $reactif->prix or ''}}" >
        {!! $errors->first('prix', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <!-- <label for="user_id" class="col-md-4 control-label">{{ 'User Id' }}</label> -->
    <div class="col-md-6">
        <input class="form-control" name="user_id" type="hidden" id="user_id" value="{{ auth()->user()->id}}" required>
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('prix') ? 'has-error' : ''}}">
    <label for="prix" class="col-md-4 control-label">{{ 'Stockage' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="stockage" type="text" id="stockage" value="{{ $reactif->stockage or ''}}"  >
        {!! $errors->first('prix', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Enregistrer' }}">
    </div>
</div>
