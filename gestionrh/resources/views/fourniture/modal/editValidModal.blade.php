<div class="modal fade" id="editValidModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="editValidModal">Validation de la demande</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="">
            @csrf
            <div class="modal-body">
            <div class="mt-3">
                <input type="hidden" name="id" value="" id="detail_id">
            </div>
            <div class="mt-3 mb-3">
                <label for="">Statut:</label>
                <select name="id_statut" id="edit_statut" class="form-select">
                    <option value=''>Selectionner un statut </option>
                </select>
            </div>
            <div class="mt-3">
                <label for="">Commentaire</label>
                <textarea name="commentaire" id="commentaire" cols="15" rows="5" class="form-control"></textarea>
                {{-- <input type="number" name="qte_demande" id="qte_demande" min="0" id="qte_demande" class="form-control"> --}}
            </div>
            </div>
            <div class="modal-footer">
            <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary">Mettre à jour le statut</button>
            </div>
        </form>
        </div>
    </div>
</div>
