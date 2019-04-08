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

<div class="col-sm-12">
  <div class="white-box">
      <h3 class="box-title">Inspections Physique et Visuellle</h3>
      <div class="table-responsive">
          <table class="table">
              <thead>
                <th>Fabricant</th>
                <th>Description du prospectus: langue, lisibilite, conditions de stockage(T°C, humidite, lumiere...), mode d'emploi...)</th>
                <th>Decrire l'emballage, l'aspect, la forme, la couleur de l'objet d'essai, et autres observations(fissures, particules etrangeres, etancheite, odeur, gout..)</th>
              </thead>
              <tbody>
                <tr>
                <td>{{ $objet->fabricant}}</td>
                <td><textarea class="form-control" name="prospectus" type="text" id="fabricant" value="{{ $objet->prospectus or ''}}" required></textarea></td>
                <td><textarea class="form-control" name="desc_physique" type="text" id="fabricant" value="{{ $objet->desc_physique or ''}}" required></textarea></td>
              </tr>
              <tr>
                <td>Conclusion</td>
                <td colspan="2">
                    <select class="form-control" data-placeholder="Choose a Category" tabindex="1" name="ipv">
                        <option value="Conforme">Conforme</option>
                        <option value="Non Conforme">Non Conforme</option>
                        <option value="Douteux">Douteux</option>
                    </select>
                </td>
              </tr>
              </tbody>
          </table>

      </div>
  </div>
</div>

<div class="col-sm-12">
  <div class="white-box">
      <h3 class="box-title">Delitement</h3>
      <div class="table-responsive">
          <table class="table">
            <tr>
              <td>Delitement</td>
              <td><input class="form-control" name="duree_delitement" type="text" id="user_id" placeholder="Duree" required></td>
              <td>
                <select class="form-control" data-placeholder="Choose a Category" tabindex="1" name="delitement" required>
                    <option value="Conforme">Conforme</option>
                    <option value="Non Conforme">Non Conforme</option>
                    <option value="Douteux">Douteux</option>
                </select>
              </td>
            </tr>
          </table>
      </div>
  </div>
</div>

@include('rapport-frontal.form')
<!-- Dosage  -->

<div class="col-sm-12">
  <div class="white-box">
      <h3 class="box-title">Dosage</h3>
      <div class="table-responsive">
          <table class="table">
            <tr>
                <th>Principe Actif</th>
                <th>Teneur</th>
                <th>Observation</th>
            </tr>

            @foreach($molecule as $mole)
          <tr>
              <td><input class="form-control" name="molecule[]" type="text" id="molecule" value="{{ $rapportfrontal->molecule or $mole->molecule}}" ></td>
              <td>
                <select class="form-control" data-placeholder="Choose a Category" tabindex="1" name="teneur[]">
                    <option value="-80"> < 80% </option>
                    <option value="80-100">80 - 100</option>
                    <option value=">100"> > 100 </option>
                </select>
              </td>
              <input class="form-control" name="screening" type="hidden" id="screening" value="{{ $rapportfrontal->screening or ''}}" >
              <td>
                <select class="form-control" data-placeholder="Choose a Category" tabindex="1" name="etat[]">
                    <option value="Present">Present</option>
                    <option value="Absent">Absent</option>
                    <option value="Douteux">Douteux</option>
                </select>
              </td>
          </tr>
          @endforeach

            <tr>
              <td>Conclusion</td>
              <td colspan="2">
                  <select class="form-control" data-placeholder="Choose a Category" tabindex="1" name="dosage">
                      <option value="Conforme">Conforme</option>
                      <option value="Non Conforme">Non Conforme</option>
                      <option value="Douteux">Douteux</option>
                  </select>
              </td>
            </tr>
          </table>

      </div>
    </div>
</div>

<!--/Dosage  -->

<!-- Conclusion Finale  -->

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
