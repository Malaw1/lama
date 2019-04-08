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
<div class="form-group {{ $errors->has('parametre') ? 'has-error' : ''}}">
    <label for="parametre" class="col-md-4 control-label">{{ 'Parametre / Methode' }}</label>
    <div class="col-md-3">

      <select name="parametre[]" class="form-control select2">
        @foreach($param as $param)
            <option value="{{$param->parametre}}">{{$param->parametre}}</option>
            @endforeach
        </select>
        <!-- <input class="form-control" name="parametre" type="text" id="parametre" value="{{ $essai->parametre or ''}}" required> -->
        {!! $errors->first('parametre', '<p class="help-block">:message</p>') !!}

    </div>
    <div class="col-md-3">
      <select name="methode[]" class="form-control select2">
      @foreach($methode as $param)
          <option value="{{$param->methode}}">{{$param->methode}}</option>
          @endforeach
      </select>
      <!-- <input class="form-control" name="methode" type="text" id="methode" value="{{ $essai->methode or ''}}" required> -->
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

<!-- <div class="form-group {{ $errors->has('methode') ? 'has-error' : ''}}">
    <label for="methode" class="col-md-4 control-label">{{ 'Methode' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="methode" type="text" id="methode" value="{{ $essai->methode or ''}}" required>
        {!! $errors->first('methode', '<p class="help-block">:message</p>') !!}
    </div>
</div> -->

<div class="form-group {{ $errors->has('analyse_id') ? 'has-error' : ''}}">
    <!-- <label for="analyse_id" class="col-md-4 control-label">{{ 'Analyse Id' }}</label> -->
    <div class="col-md-6">
        <input class="form-control" name="analyse_id" type="hidden" id="analyse_id" value="{{ $essai->analyse_id or ''}}" required>
        {!! $errors->first('analyse_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<!-- <div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Enregistrer' }}">
    </div>
</div> -->
