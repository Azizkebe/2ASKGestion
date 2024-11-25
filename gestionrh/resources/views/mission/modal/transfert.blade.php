<div class="modal fade" id="TransfertOMValidModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="TransfertOMValidModal">Transfert des Ordres de Mission</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="TransfertOrdreMission" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="modal-body">
            <div class="mt-3">
                <input type="text" name="id" value="" id="detail_id">
            </div>
            <div class="mt-3 mb-3">
                <div>
                    <label for="">Joindre Ordre de Mission</label>
                </div>
                <input type="file" name="file_piece" id="file_piece">
            </div>
            <div class="mt-3 mb-3">
                <label for="">Commentaire:</label>
                    <textarea name="commentaire" id="comment" cols="15" rows="5" class="form-control" value=""></textarea>
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
