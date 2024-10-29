<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modification Article de Fourniture - {{$fourni->projet->name_projet}} </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="update_Article" action="" method="POST">
            @csrf
            @method('POST')
            <div class="modal-body">
            <div class="mt-3">
                <input type="hidden" name="id" value="" id="detail_id">
            </div>
            <div class="mt-3 mb-3">
                <label for="">Article:</label>
                <select name="id_article" id="edit_article" class="form-select">
                    <option value=''>Selectionner un article </option>
                </select>
            </div>
            <div class="mt-3">
                <label for="">Quantite demandée</label>

                <input type="number" name="qte_demande" id="qte_demande" min="0" id="qte_demande" class="form-control">
            </div>
            </div>
            <div class="modal-footer">
            <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </div>
        </form>
        </div>
    </div>
</div>
