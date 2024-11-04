<!-- Modal Update-->
<div class="modal fade" id="update" tabindex="-1" aria-labelledby="update" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="update">Suivi de la demande</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="update" action="">
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="e_id" name="id" value=""/>
                    <div class="modal-body">
                        <table class="table-striped table-hover">
                        <thead>
                            <tr>
                                <td>Validateur</td>
                                <td>Projet</td>
                                <td>Validation N+1</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" class="form-control" id="e_validateur1" name="e_validateur1" value="" readonly></td>
                                <td><input type="text" class="form-control" id="e_projet" name="e_projet" value="" readonly/></td>
                                <td><input type="text" class="form-control" id="e_etat" name="e_etat" value="" readonly/></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" id="e_validateur2" name="e_validateur2" value="" readonly></td>
                                <td><input type="text" class="form-control" id="e_projet2" name="e_projet2" value="" readonly/></td>
                                <td><input type="text" class="form-control" id="e_etat2" name="e_etat2" value="" readonly/></td>
                                {{-- <td><input type="text" class="form-control" id="comment" name="comment" value="" readonly/></td> --}}
                                {{-- <td><textarea name="comment" id="comment" cols="4" rows="4" class="form-control" value="" readonly></textarea></td> --}}
                            </tr>
                        </tbody>
                    </table>
                        {{-- <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Projet</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="e_projet" name="e_projet" value=""/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Validateur</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="e_validateur" name="e_validateur" value=""/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Etat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="e_etat" name="e_etat" value=""/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Motif</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="e_motif" name="e_motif" value=""/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Service</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control" id="e_service" name="e_service" value=""/>
                            </div>
                        </div> --}}
                    </div>
                    <!-- form add end -->
                </div>
                <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                {{-- <button type="submit" class="btn btn-primary">Enregistrer</button> --}}
                </div>
            </form>
        </div>
    </div>
</div>

<!-- End Modal Update-->
