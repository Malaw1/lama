<div class="form-group {{ $errors->has('designation') ? 'has-error' : ''}}">
    <label for="designation" class="col-md-4 control-label">{{ 'Designation' }}</label>
    <div class="col-md-6">
      <select name="designation" class="form-control select2" id="designation" required>
          @foreach($catalog as $cat)
              <option  value="{{ $cat->designation}}">{{ $cat->designation}}</option>
          @endforeach
      </select>
        <!-- <input class="form-control" name="designation" type="text" id="designation" value="{{ $produitchimique->designation or ''}}" required> -->
        {!! $errors->first('designation', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('date_recep') ? 'has-error' : ''}}">
    <label for="date_recep" class="col-md-4 control-label">{{ 'Date Recep' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="date_recep" type="date" id="date_recep" value="{{ $produitchimique->date_recep or ''}}" required>
        {!! $errors->first('date_recep', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('depositaire') ? 'has-error' : ''}}">
    <label for="depositaire" class="col-md-4 control-label">{{ 'Depositaire' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="depositaire" type="text" id="depositaire" value="{{ $produitchimique->depositaire or ''}}" required>
        {!! $errors->first('depositaire', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('unite_recu') ? 'has-error' : ''}}">
    <label for="unite_recu" class="col-md-4 control-label">{{ 'Unite Recu' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="unite_recu" type="number" id="unite_recu" value="{{ $produitchimique->unite_recu or ''}}" required>
        {!! $errors->first('unite_recu', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('quantite') ? 'has-error' : ''}}">
    <label for="quantite" class="col-md-4 control-label">{{ 'Quantite' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="quantite" type="text" id="quantite" value="{{ $produitchimique->quantite or ''}}" required>
        {!! $errors->first('quantite', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fabricant') ? 'has-error' : ''}}">
    <label for="fabricant" class="col-md-4 control-label">{{ 'Fabricant' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="fabricant" type="text" id="fabricant" value="{{ $produitchimique->fabricant or ''}}" required>
        {!! $errors->first('fabricant', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('lot') ? 'has-error' : ''}}">
    <label for="lot" class="col-md-4 control-label">{{ 'Lot' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="lot" type="text" id="lot" value="{{ $produitchimique->lot or ''}}" required>
        {!! $errors->first('lot', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('date_fab') ? 'has-error' : ''}}">
    <label for="date_fab" class="col-md-4 control-label">{{ 'Date Fab' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="date_fab" type="date" id="date_fab" value="{{ $produitchimique->date_fab or ''}}" required>
        {!! $errors->first('date_fab', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('date_exp') ? 'has-error' : ''}}">
    <label for="date_exp" class="col-md-4 control-label">{{ 'Date Exp' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="date_exp" type="date" id="date_exp" value="{{ $produitchimique->date_exp or ''}}" required>
        {!! $errors->first('date_exp', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('catalog') ? 'has-error' : ''}}">
    <label for="catalog" class="col-md-4 control-label">{{ 'Catalog' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="catalog" type="text" id="catalog" value="{{ $produitchimique->catalog or ''}}" >
        {!! $errors->first('catalog', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cas') ? 'has-error' : ''}}">
    <label for="cas" class="col-md-4 control-label">{{ 'Cas' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="cas" type="text" id="cas" value="{{ $produitchimique->cas or ''}}" >
        {!! $errors->first('cas', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('prix') ? 'has-error' : ''}}">
    <label for="prix" class="col-md-4 control-label">{{ 'Prix' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="prix" type="number" id="prix" value="{{ $produitchimique->prix or ''}}" required>
        {!! $errors->first('prix', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="col-md-4 control-label">{{ 'Type' }}</label>
    <div class="col-md-6">
        <!-- <input class="form-control" name="type" type="text" id="type" value="{{ $produitchimique->type or ''}}" required> -->

        <select name="type" class="form-control select2" id="type" required>
            <option  value="reactif">Reactif</option>
            <option  value="substance">Substance de Reference</option>
            <option  value="mat_premiere">Matiere Premiere</option>
        </select>
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

 <input class="form-control" name="user_id" type="hidden" id="type" value="{{ auth()->user()->id }}" required>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Enregistrer' }}">
    </div>
</div>
