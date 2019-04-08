<div class="col-sm-12">
  <div class="white-box">
      <h3 class="box-title">Identification</h3>
      <div class="table-responsive">
          <table class="table">
            <tr>
                <th>Molecule</th>
                <th>RF(temoin)</th>
                <th>Rf(echantillon)</th>
                <th>RF(erreur)</th>
            </tr>

            @foreach($molecule as $mole)
          <tr>
              <td>{{ $rapportfrontal->molecule or $mole->molecule}}</td>
              <input class="form-control" name="molecule[]" type="hidden" id="molecule" value="{{ $rapportfrontal->molecule or $mole->molecule}}" >
              <td><input class="form-control" name="rf_temoin[]" type="text" id="rf_temoin" value="{{ $rapportfrontal->rf_temoin or ''}}" ></td>
              <td><input class="form-control" name="rf_echan[]" type="text" id="rf_echan" value="{{ $rapportfrontal->rf_echan or ''}}" ></td>
              <td><input class="form-control" name="rf_erreur[]" type="text" id="rf_erreur" value="{{ $rapportfrontal->rf_erreur or ''}}"  disabled></td>
              <input class="form-control" name="screening" type="hidden" id="screening" value="{{ $rapportfrontal->screening or ''}}" >

          </tr>
          @endforeach

          <tr>
            <th>Impurete</th>
            <td colspan="2">
              <select class="form-control" data-placeholder="Choose a Category" tabindex="1" name="impurete">
                  <option value="Present">Present</option>
                  <option value="Absent">Absent</option>
              </select>
            </td>
            <td colspan="2">
              <textarea class="form-control" name="prospectus" type="text" id="fabricant" value="{{ $objet->desc_impurete or ''}}" required></textarea>
            </td>
          </tr>

            <tr>
              <th>Conclusion</th>
              <td colspan="2">
                  <select class="form-control" data-placeholder="Choose a Category" tabindex="1" name="identification">
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
