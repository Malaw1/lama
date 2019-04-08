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
  <div class="form-group {{ $errors->has('poids') ? 'has-error' : ''}}">
      <label for="poids" class="col-md-4 control-label">{{ 'Poids' }}</label>
      <div class="col-md-6">
          <input class="form-control" name="poids[]" type="number" id="poids" value="{{ $poid->poids or ''}}" required>
          {!! $errors->first('poids', '<p class="help-block">:message</p>') !!}
      </div>
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

        <input class="form-control" name="pesage_id" type="hidden" id="pesage_id" value="{{ $poid->pesage_id or ''}}" required>
        <input class="form-control" name="user_id" type="hidden" id="user_id" value="{{ auth()->user()->id }}" required>

<!-- <div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div> -->
