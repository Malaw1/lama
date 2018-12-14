<div class="panel panel-info">
    <div class="panel-heading"> Essais</div>
    <div class="panel-wrapper collapse in" aria-expanded="true">
        <div class="panel-body">
            <form action="{{ route('materiels.store')}}" method="POST">
                    {{ csrf_field()}}
                <div class="form-body">
                    <hr>
                        <div class="form-group ">
                            <label class="control-label">Essais</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="nomMateriel" placeholder="Essais">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Aspect</label>
                            <textarea type="text" class="form-control" id="exampleInputPassword1" name="type" placeholder="Aspect"></textarea>
                        </div>
                        <!--/span-->
                    <!--/row-->
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Enregistrer</button>
                    <button type="button" class="btn btn-default">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</div>
