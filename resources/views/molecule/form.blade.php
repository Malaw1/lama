@push('js')
<script>
$(document).ready(function(){
    var next = 1;
    $(".add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<input autocomplete="off" class="form-control" id="field' + next + '" name="molecule[]" type="text">';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);

            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });



});

</script>
@endpush
<div class="form-group {{ $errors->has('molecule') ? 'has-error' : ''}}">
    <label for="molecule" class="col-md-4 control-label">{{ 'Molecule' }}</label>
    <div id="field">
      <div class="col-md-5">
        <input autocomplete="off" class="form-control" id="field1" name="molecule[]" type="text" data-items="8"/>
      </div>
      <div class="col-md-1">
        <button id="add" class="btn add-more" type="button">+</button>
      </div>
        <!-- <input class="form-control" name="molecule" type="text" id="molecule" value="{{ $molecule->molecule or ''}}" required> -->
        {!! $errors->first('molecule', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('objet_essai') ? 'has-error' : ''}}">
    <!-- <label for="objet_essai" class="col-md-4 control-label">{{ 'Objet Essai' }}</label> -->
    <div class="col-md-6">
        <input class="form-control" name="objet_essai" type="hidden" id="objet_essai" value="{{ $molecule->objet_essai or ''}}" required>
        {!! $errors->first('objet_essai', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<!-- <div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div> -->
