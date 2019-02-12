<div class="form-group {{ $errors->has('designation') ? 'has-error' : ''}}">
    <label for="designation" class="col-md-4 control-label">{{ 'Designation' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="designation" type="text" id="designation" value="{{ $objet->designation or ''}}" required>
        {!! $errors->first('designation', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
    <label for="code" class="col-md-4 control-label">{{ 'Code' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="code" type="text" id="code" value="{{ $objet->code or ''}}" required>
        {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('dci') ? 'has-error' : ''}}">
    <label for="dci" class="col-md-4 control-label">{{ 'Dci' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="dci" type="text" id="dci" value="{{ $screening->dci or ''}}" required>
        {!! $errors->first('dci', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('date_exp') ? 'has-error' : ''}}">
    <label for="date_exp" class="col-md-4 control-label">{{ 'Date Exp' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="date_exp" type="date" id="date_exp" value="{{ $screening->date_exp or ''}}" required>
        {!! $errors->first('date_exp', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Delitement</label>
    <div class="radio-list">
        <label class="radio-inline p-0">
            <div class="radio radio-info">
                <input type="radio" name="radio" id="radio1" value="option1">
                <label for="radio1">Conforme</label>
            </div>
        </label>
        <label class="radio-inline">
            <div class="radio radio-info">
                <input type="radio" name="radio" id="radio2" value="option2">
                <label for="radio2">Non Conforme </label>
            </div>
        </label>
    </div>
</div>

@foreach($molecule as $mole)
<div class="form-group {{ $errors->has('molecule') ? 'has-error' : ''}}">
    <label for="molecule" class="col-md-4 control-label">{{ 'Principe Actif' }}</label>


      <div class="col-md-3">
        <input autocomplete="off" class="form-control" name="molecule[]" type="text" data-items="8" value="{{$mole->molecule}}"/>
      </div>

      <div class="col-md-3">
        <div class="radio-list">
            <label class="radio-inline p-0">
                <div class="radio radio-info">
                    <input type="radio" name="radio" id="radio3" value="option1">
                    <label for="radio3">Present</label>
                </div>
            </label>
            <label class="radio-inline">
                <div class="radio radio-info">
                    <input type="radio" name="radio" id="radio4" value="option2">
                    <label for="radio4">Absent </label>
                </div>
            </label>
        </div>
      </div>
      <div class="col-md-3">

      </div>
</div>
  @endforeach

  <div class="col-sm-12">
    <div class="white-box">
        <h3 class="box-title">Rapport Frontal</h3>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Molecule</th>
                    <th>RF < 5%</th>
                    <th>5% => RF < 10%</th>
                    <th>RF => 10%</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($molecule as $mole)
                <tr>

                    <td>1</td>
                    <td>{{$mole->molecule}}</td>
                    <td><input class="form-control" name="molecule[]" type="text" /></td>
                    <td><input class="form-control" name="molecule[]" type="text" /></td>
                    <td><input class="form-control" name="molecule[]" type="text" /></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

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
                        <td>{{$objet->code}}</td>
                        <td><input class="form-control" name="molecule[]" type="checkbox" /></td>
                        <td><input class="form-control" name="molecule[]" type="checkbox" /></td>
                        <td><input class="form-control" name="molecule[]" type="checkbox" /></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
