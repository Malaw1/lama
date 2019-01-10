@push('js')



@endpush

<div class="panel panel-info">
    <div class="panel-heading"> Pesage analyse: {{ $analyse->id }} </div>
    <div class="panel-wrapper collapse in" aria-expanded="true">
        <div class="panel-body">
                <div class="alert alert-success" style="display:none"></div>
            <form action="{{ route('pesage.store')}}" method="POST">
                    {{ csrf_field()}}

                <div class="form-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Equipement</label>
                                <select name="equipement_id" class="select2 m-b-10 select2" data-placeholder="Choisir">
                                        @foreach($equip as $equip)
                                            <option value="{{ $equip->id}}">{{ $equip->appareil}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="control-label">PM 1</label>
                            <input type="text" class="form-control price" id="poids" name="poids[]" placeholder="PM">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">PM 2</label>
                            <input  type="text" class="form-control price" id="poids" name="poids[]" placeholder="PM">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">PM 3</label>
                            <input type="hidden" name="total" value="100" />
                            <input type="text" class="form-control price" id="poids" name="poids[]" placeholder="PM">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">PM 4</label>
                            <input type="text" class="form-control price" id="poids" name="poids[]" placeholder="PM">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">PM 5</label>
                            <input type="text" class="form-control price" id="poids" name="poids[]" placeholder="PM">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">PM 6</label>
                            <input type="text" class="form-control price" id="poids" name="poids[]" placeholder="PM">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">PM 7</label>
                            <input type="text" class="form-control price" id="poids" name="poids[]" placeholder="PM">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">PM 8</label>
                            <input type="text" class="form-control price" id="poids" name="poids[]" placeholder="PM">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">PM 9</label>
                            <input type="text" class="form-control price" id="poids" name="poids[]" placeholder="PM">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">PM 10</label>
                            <input type="text" class="form-control price" id="poids" name="poids[]" placeholder="PM">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">PM 11</label>
                            <input type="text" class="form-control price" id="poids" name="poids[]" placeholder="PM">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">PM 12</label>
                            <input type="text" class="form-control price" id="poids" name="poids[]" placeholder="PM">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">PM 13</label>
                            <input type="text" class="form-control price" id="poids" name="poids[]" placeholder="PM">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">PM 14</label>
                            <input type="text" class="form-control price" id="poids" name="poids[]" placeholder="PM">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">PM 15</label>
                            <input type="text" class="form-control price" id="poids" name="poids[]" placeholder="PM">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">PM 16</label>
                            <input type="text" class="form-control price" id="poids" name="poids[]" placeholder="PM">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">PM 17</label>
                            <input type="text" class="form-control price" id="poids" name="poids[]" placeholder="PM">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">PM 18</label>
                            <input type="text" class="form-control price" id="poids" name="poids[]" placeholder="PM">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">PM 19</label>
                            <input type="text" class="form-control price" id="poids" name="poids[]" placeholder="PM">
                        </div>

                        <input type="hidden" value="{{ $analyse->id }}" name="analyse_id" >

                        <div class="form-group col-md-3">
                            <label class="control-label">PM 20</label>
                            <input type="text" class="form-control price" id="poids" name="poids[]" placeholder="PM">
                        </div>
                    </div>

                        <!--/span-->
                    <!--/row-->
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label class="control-label">Poids Total :</label>
                        <input type="text" class="form-control"  id="totalPrice" name="ptotal" placeholder="Poids toal  :">
                        <span id="totalPrice"></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">Tolerance  :</label>
                        <input type="text" class="form-control" id="tolerance" name="tolerance" placeholder="Tolerance  :">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">Ecart Type :</label>
                        <input type="text" class="form-control" id="ecartType" name="ecartType" placeholder="Ecart Type :">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label class="control-label">% d’uniformité de masse :</label>
                        <input type="text" class="form-control" id="uniformite_masse" name="uniformite_masse" placeholder="% d’uniformité de masse :">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">Coefficient de variation :</label>
                        <input type="text" class="form-control" id="variation" name="variation" placeholder="Coefficient de variation :">
                    </div>


                    <div class="form-group col-md-4">
                        <label class="control-label"> Pm =</label>
                        <input type="hidden" value="{{ $analyse->id }}" name="analyse_id"  />
                        <input type="text" class="form-control" id="poidsMoyens"  name="pm" placeholder="Poids moyen d’un comprimé :">
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Enregistrer</button>
                    <button type="button" class="btn btn-default">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('js')
<script>
    jQuery(document).ready(function(){
       jQuery('#ajaxSubmit').click(function(e){
          e.preventDefault();
          $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
             }
         });
          jQuery.ajax({
             url: "{{ url('/pesage/store') }}",
             method: 'post',
             data: {
               // poids: jQuery('#poids').val(),
                tolerance: jQuery('#tolerance').val(),
                ptotal: jQuery('#totalPrice').val(),
                pm: jQuery('#poidsMoyen').val(),
                ecart_type: jQuery('#ecartType').val(),
                variation: jQuery('#variation').val(),
                uniformite_masse: jQuery('#uniformite_masse').val(),
             },
             success: function(result){
                jQuery('.alert').show();
                jQuery('.alert').html(result.success);
             }});
          });
       });
</script>
@endpush