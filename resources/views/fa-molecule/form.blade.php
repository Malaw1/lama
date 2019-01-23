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

<!--
<div class="form-group {{ $errors->has('dosage') ? 'has-error' : ''}}">
    <label for="dosage" class="col-md-4 control-label">{{ 'Dosage' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="dosage" type="text" id="dosage" value="{{ $famolecule->dosage or ''}}" required>
        {!! $errors->first('dosage', '<p class="help-block">:message</p>') !!}
    </div>
</div>
 -->
<!-- <div class="form-group {{ $errors->has('faisabilite_id') ? 'has-error' : ''}}">
    <label for="faisabilite_id" class="col-md-4 control-label">{{ 'Faisabilite Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="faisabilite_id" type="number" id="faisabilite_id" value="{{ $famolecule->faisabilite_id or ''}}" required>
        {!! $errors->first('faisabilite_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div> -->
