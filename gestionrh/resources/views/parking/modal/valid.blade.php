<div class="modal fade" id="ValidVehiculeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="ValidVehiculeModal">Ajout Article de Fourniture - </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="POST">
            @csrf
            @method('POST')
            <div class="modal-body">
            <div class="mt-3">
                <input type="hidden" name="id" value="" id="detail_id">
            </div>
            <div class="mt-3 mb-3">
                <label for="">Statut du dossier:</label>
                <select name="statut_id" id="edit_statut" class="form-select">
                    <option value=''>Selectionner un statut </option>
                </select>
            </div>
            <div class="mt-3">
                <label for="">Quantite demandée</label>
                <input type="number" name="quantite_demande" min="1" value="1" id="quantite_demande" class="form-control">
            </div>
            </div>
            <div class="modal-footer">
            <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary">Ajouter un article</button>
            </div>
        </form>
        </div>
    </div>
</div>
