<div class="modal fade w-100" id="OMValidModal" tabindex="-1" aria-labelledby="OMValidModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="OMValidModal">Suivi à la demande - </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="update" action="">
            <div class="modal-body">
                <input type="hidden" class="form-control" id="e_id" name="id" value=""/>
                <div class="modal-body">
                    <table class="table-striped table-hover">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Prenom</td>
                            <td>Nom</td>
                            <td>Statut</td>
                            <td>Commentaire</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td><input type="text" class="form-control" id="p_validateur" name="p_validateur" value="" readonly></td>
                            <td><input type="text" class="form-control" id="n_validateur" name="n_validateur" value="" readonly></td>
                            <td><input type="text" class="form-control" id="statut" name="statut" value="" readonly/></td>
                            <td><input type="text" class="form-control" id="comment" name="comment" value="" readonly/></td>
                        </tr>
                        <tr>
                            {{-- <td><input type="text" class="form-control" id="e_validateur2" name="e_validateur2" value="" readonly></td>
                            <td><input type="text" class="form-control" id="e_projet2" name="e_projet2" value="" readonly/></td>
                            <td><input type="text" class="form-control" id="e_etat2" name="e_etat2" value="" readonly/></td> --}}
                        </tr>
                    </tbody>
                </table>

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
