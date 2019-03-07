@foreach($molecule as $mole)
<div class="form-group {{ $errors->has('molecule') ? 'has-error' : ''}}">
    <label for="molecule" class="col-md-4 control-label">{{ 'Principe Actif' }}</label>
      <div class="col-md-3">
        <input class="form-control" name="molecule[]" type="text" id="molecule" value="{{ $principeactif->molecule or $mole->molecule}}" required>
      </div>

      <div class="form-group col-md-3">
          <select class="form-control" data-placeholder="Choose a Category" tabindex="1" name="etat[]">
              <option value="Present">Present</option>
              <option value="Absent">Absent</option>
          </select>
      </div>


</div>


  @endforeach


<!--
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div> -->
