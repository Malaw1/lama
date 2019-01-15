<div class="form-group {{ $errors->has('designation') ? 'has-error' : ''}}">
    <label for="designation" class="col-md-4 control-label">{{ 'Produit Chimique' }}</label>
    <div class="col-md-6">
      <select name="pc[]" class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choose">
            @foreach($catalog as $catalog)
                <option value="{{ $catalog->designation}}">{{ $catalog->designation}}</option>
            @endforeach
      </select>
        <!-- <input class="form-control" name="designation" type="text" id="designation" value="{{ $fapc->designation or ''}}" required> -->
        {!! $errors->first('designation', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<!-- <div class="form-group {{ $errors->has('faisabilite_id') ? 'has-error' : ''}}">
    <label for="faisabilite_id" class="col-md-4 control-label">{{ 'Faisabilite Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="faisabilite_id" type="number" id="faisabilite_id" value="{{ $fapc->faisabilite_id or ''}}" required>
        {!! $errors->first('faisabilite_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div> -->