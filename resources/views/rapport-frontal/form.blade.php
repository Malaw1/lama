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
                  <td><input class="form-control" name="molecule[]" type="text" id="molecule" value="{{ $rapportfrontal->molecule or $mole->molecule}}" required></td>
                  <td><input class="form-control" name="rf_inf_5[]" type="text" id="rf_inf_5" value="{{ $rapportfrontal->rf_inf_5 or ''}}" required></td>
                  <td><input class="form-control" name="rf_inf_10[]" type="text" id="rf_inf_10" value="{{ $rapportfrontal->rf_inf_10 or ''}}" required></td>
                  <td><input class="form-control" name="rf_sup_10[]" type="text" id="rf_sup_10" value="{{ $rapportfrontal->rf_sup_10 or ''}}" required></td>
                  <input class="form-control" name="screening" type="hidden" id="screening" value="{{ $rapportfrontal->screening or ''}}" required>

              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>




<!-- <div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div> -->
