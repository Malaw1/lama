<div class="form-group {{ $errors->has('reference') ? 'has-error' : ''}}">
    <label for="reference" class="col-md-4 control-label">{{ "Reference d'essai" }}</label>
    <div class="col-md-6">
      <select name="reference" class="form-control select2">
            @foreach($refs as $test)
                <option value="{{ $test->pharmacopee}}">{{ $test->pharmacopee}}</option>
            @endforeach
        </select>
        <!-- <input class="form-control" name="reference" type="text" id="reference" value="{{ $faisabilite->reference or ''}}" required> -->
        {!! $errors->first('reference', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('objet_essais') ? 'has-error' : ''}}">
    <label for="objet_essais" class="col-md-4 control-label">{{ 'Objet Essais' }}</label>
    <div class="col-md-6">
      <select name="objet_essais" class="form-control select2" required>

                <option value="{{ $objet->id}}">{{ $objet->code}}</option>

        </select>
        <!-- <input class="form-control" name="objet_essais" type="number" id="objet_essais" value="{{ $faisabilite->objet_essais or ''}}" required> -->
        {!! $errors->first('objet_essais', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <!-- <label for="user_id" class="col-md-4 control-label">{{ 'User Id' }}</label> -->
    <div class="col-md-6">
        <input class="form-control" name="user_id" type="hidden" id="user_id" value="{{ auth()->user()->id}}" required>
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


@foreach($molecule as $test)
<div class="form-group {{ $errors->has('molecule') ? 'has-error' : ''}}">
    <label for="molecule" class="col-md-4 control-label">{{ 'Molecule/Dosage' }}</label>
      <div class="col-md-3">
        <input autocomplete="off" class="form-control col" id="molecule" name="molecule[]" value="{{$test->molecule}}" type="text" data-items="8" placeholder="Molecule"/>
      </div>
      <div class="col-md-3">
        <input autocomplete="off" class="form-control col" id="dosage" name="dosage[]" value="{{$test->dosage}}" type="text" data-items="8" placeholder="Dosage"/>
      </div>

        {!! $errors->first('molecule', '<p class="help-block">:message</p>') !!}
  </div>

@endforeach
