<div class="modal fade" id="ValidOrdreMisionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="ValidOrdreMisionModal">Reponse à la demande - {{$mission->user->employe->prenom}} {{$mission->user->employe->nom}} </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="storevalidMission">
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
            <div class="mt-3 mb-3">
                <label for="">Commentaire:</label>
                    <textarea name="commentaire" id="commentaire" cols="15" rows="5" class="form-control"></textarea>
            </div>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
            </div>
        </form>
        </div>
    </div>
</div>
