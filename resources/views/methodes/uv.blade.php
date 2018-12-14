<div class="panel panel-info">
    <div class="panel-heading">Titrimetrie</div>
    <div class="panel-wrapper collapse in" aria-expanded="true">
        <div class="panel-body">
            <form action="{{ route('tests.store')}}" method="POST" role="form">
                <div class="form-body">
                    <h3 class="box-title"></h3>
                    <hr>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">PhMetre</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="Ph" placeholder="Nom du Test">
                                <input type="text" class="form-control" id="exampleInputEmail1" name="Ph" placeholder="Nom du Test">
                                <input type="text" class="form-control" id="exampleInputEmail1" name="Ph" placeholder="Nom du Test">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Calibre</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="Calibre" placeholder="Nom du Test">
                                <input type="text" class="form-control" id="exampleInputEmail1" name="Calibre" placeholder="Nom du Test">
                                <input type="text" class="form-control" id="exampleInputEmail1" name="Calibre" placeholder="Nom du Test">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Valeure Lue</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="Value 1" placeholder="Nom du Test">
                                <input type="text" class="form-control" id="exampleInputEmail1" name="Value 2" placeholder="Nom du Test">
                                <input type="text" class="form-control" id="exampleInputEmail1" name="Value 3" placeholder="Nom du Test">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Titrats Et Reactifs utilises</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="Value 1" placeholder="Nom du Test">
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
