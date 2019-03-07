<div class="form-group {{ $errors->has('designation') ? 'has-error' : ''}}">
    <label for="designation" class="col-md-4 control-label">{{ 'Designation' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="designation" type="text" id="designation" value="{{ $objet->designation or ''}}" required>
        {!! $errors->first('designation', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
    <label for="code" class="col-md-4 control-label">{{ 'Code' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="code" type="text" id="code" value="{{ $_GET['code'] or ''}}" required>
        {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('dci') ? 'has-error' : ''}}">
    <label for="dci" class="col-md-4 control-label">{{ 'Dci' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="dci" type="text" id="dci" value="{{ $screening->dci or ''}}" required>
        {!! $errors->first('dci', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('date_exp') ? 'has-error' : ''}}">
    <label for="date_exp" class="col-md-4 control-label">{{ 'Date de Peremtion' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="date_exp" type="date" id="date_exp" value="{{ $objet->date_exp or ''}}" required>
        {!! $errors->first('date_exp', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Fabricant') ? 'has-error' : ''}}">
    <label for="fabricant" class="col-md-4 control-label">{{ 'Nom et Adresse du Fabricant et si possible du responsable de la mise sur le marché' }}</label>
    <div class="col-md-6">
      <input class="form-control" name="description" type="text" id="fabricant" value="{{ $objet->fabricant or ''}}" required />
        <!-- <input class="form-control" name="description" type="text" id="description" value="{{ $demande->description or ''}}" required> -->
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Fabricant') ? 'has-error' : ''}}">
    <label for="fabricant" class="col-md-4 control-label">{{ "Description du prospectus: langue, lisibilite, conditions de stockage(T°C, humidite, lumiere...), mode d'emploi...)" }}</label>
    <div class="col-md-6">
      <textarea class="form-control" name="description" type="text" id="fabricant" value="{{ $objet->prospectus or ''}}" required></textarea>
        <!-- <input class="form-control" name="description" type="text" id="description" value="{{ $demande->description or ''}}" required> -->
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Fabricant') ? 'has-error' : ''}}">
    <label for="fabricant" class="col-md-4 control-label">{{ "Decrire l'emballage, l'aspect, la forme, la couleur de l'objet d'essai, et autres observations(fissures, particules etrangeres, etancheite, odeur, gout..)"}}</label>
    <div class="col-md-6">
      <textarea class="form-control" name="description" type="text" id="fabricant" value="{{ $objet->desc_physique or ''}}" required></textarea>
        <!-- <input class="form-control" name="description" type="text" id="description" value="{{ $demande->description or ''}}" required> -->
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label">Delitement</label>
    <div class="radio-list">
        <label class="radio-inline p-0">
            <div class="radio radio-info">
                <input type="radio" name="delitement" id="radio2" value="conforme" required>
                <label for="radio2">Conforme</label>
            </div>
        </label>
        <label class="radio-inline">
            <div class="radio radio-info">
                <input type="radio" name="delitement" id="radio2" value="Non conforme" required>
                <label for="radio2">Non Conforme </label>
            </div>
        </label>
    </div>
</div>

@include ('principe-actif.form')
<div class="form-group {{ $errors->has('molecule') ? 'has-error' : ''}}">
    <label for="molecule" class="col-md-4 control-label">{{ 'impurete' }}</label>
      <div class="form-group col-md-6">
          <select class="form-control" data-placeholder="Choose a Category" tabindex="1" name="impurete">
              <option value="Present">Present</option>
              <option value="Absent">Absent</option>
          </select>
      </div>
</div>
@include ('rapport-frontal.form')

      <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title">Conclusion</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Objet d'Essai</th>
                        <th>Conforme</th>
                        <th>Non Conforme</th>
                        <th>Douteux</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$_GET['code']}}</td>
                            <div class="form-group">
                                <div class="radio-list">
                        <td><label class="radio-inline">
                            <div class="radio radio-info">
                                <input type="radio" name="conclusion" id="radio1" value="conforme" required>
                                <label for="radio1">Conforme </label>
                            </div>
                        </label></td>
                        <td><label class="radio-inline">
                            <div class="radio radio-info">
                                <input type="radio" name="conclusion" id="radio2" value="Non Conforme" required>
                                <label for="radio2">Non Conforme </label>
                            </div>
                        </label></td>
                        <td><label class="radio-inline">
                            <div class="radio radio-info">
                                <input type="radio" name="conclusion" id="radio3" value="Douteux" required>
                                <label for="radio3">Douteux </label>
                            </div>
                        </label></td>
                      </div>
                  </div>

                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <input class="form-control" name="user_id" type="hidden" id="user_id" value="{{ auth()->user()->id}}" required>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Enregistrer' }}">
    </div>
</div>
