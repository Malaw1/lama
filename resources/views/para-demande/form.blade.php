@if($para == null)
<div class="form-group {{ $errors->has('parametre') ? 'has-error' : ''}}">
    <label for="parametre" class="col-md-4 control-label">{{ 'Tests' }}</label>
    <div class="col-md-6">
      <select name="parametre[]" class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choose">
        @foreach($parametre as $test)
            <option value="{{ $test->parametre}}">{{ $test->parametre}}</option>
        @endforeach
    </select>
        <!-- <input class="form-control" name="parametre" type="text" id="parametre" value="{{ $parademande->parametre or ''}}" required> -->
        {!! $errors->first('parametre', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('demande') ? 'has-error' : ''}}">
    <!-- <label for="demande" class="col-md-4 control-label">{{ 'Demande' }}</label> -->
    <div class="col-md-6">
        <input class="form-control" name="demande" type="hidden" id="demande" value="{{ $parademande->demande or ''}}" required>
        {!! $errors->first('demande', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Enregistrer' }}">
    </div>
</div>

@else

<div class="form-group {{ $errors->has('parametre') ? 'has-error' : ''}}">
    <label for="parametre" class="col-md-4 control-label">{{ 'Tests' }}</label>
    <div class="col-md-6">
      <select name="parametre[]" class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choose">
        @foreach($parametre as $test)
            <option value="{{ $test->parametre}}">{{ $test->parametre}}</option>
        @endforeach
      </select>
        <!-- <input class="form-control" name="parametre" type="text" id="parametre" value="{{ $parademande->parametre or ''}}" required> -->
        {!! $errors->first('parametre', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('demande') ? 'has-error' : ''}}">
    <!-- <label for="demande" class="col-md-4 control-label">{{ 'Demande' }}</label> -->
    <div class="col-md-6">
        <input class="form-control" name="demande" type="hidden" id="demande" value="{{ $parademande->demande or ''}}" required>
        {!! $errors->first('demande', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Enregistrer' }}">
    </div>
</div>

@endif
