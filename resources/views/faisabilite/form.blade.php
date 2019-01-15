<div class="form-group {{ $errors->has('reference') ? 'has-error' : ''}}">
    <label for="reference" class="col-md-4 control-label">{{ 'Reference' }}</label>
    <div class="col-md-6">
      <select name="reference" class="form-control select2" id="reference">
            @foreach($pharma as $test)
                <option value="{{ $test->pharmacopee}}">{{ $test->pharmacopee}}</option>
            @endforeach
      </select>
        <!-- <input class="form-control" name="reference" type="text" id="reference" value="{{ $faisabilite->reference or ''}}" required> -->
        {!! $errors->first('reference', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('molecule') ? 'has-error' : ''}}">
    <label for="molecule" class="col-md-4 control-label">{{ 'Molecule' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="molecule" type="text" id="molecule" value="{{ $faisabilite->molecule or ''}}" required>
        {!! $errors->first('molecule', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('objet_essai') ? 'has-error' : ''}}">
    <label for="objet_essai" class="col-md-4 control-label">{{ 'Objet Essai' }}</label>
    <div class="col-md-6">
      <select name="objet_essai" class="form-control select2">
            @foreach($objet as $test)
                <option value="{{ $test->id}}">{{ $test->code}}</option>
            @endforeach
        </select>
        <!-- <input class="form-control" name="objet_essai" type="number" id="objet_essai" value="{{ $faisabilite->objet_essai or ''}}" required> -->
        {!! $errors->first('objet_essai', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<!-- <div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div> -->
