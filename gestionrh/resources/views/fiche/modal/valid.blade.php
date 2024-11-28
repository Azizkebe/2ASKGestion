<div class="modal fade" id="FicheTechniqueModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="FicheTechniqueModal">Reponse à la demande - {{$fiche->user->employe->prenom}} {{$fiche->user->employe->nom}} </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="FicheValid" enctype="multipart/form-data" >
            @csrf
            @method('POST')
            <div class="modal-body">
            <div class="mt-3">
                <input type="" name="id" value="" id="detail_id">
            </div>
            <div class="mt-3 mb-3">
                <label for="">Veuillez joindre l'ordre de mission</label>
                <input type="file" name="file_ordre_mission" id="file_ordre_mission" class="form-control">
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
