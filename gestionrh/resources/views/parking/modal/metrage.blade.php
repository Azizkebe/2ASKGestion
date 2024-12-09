<div class="modal fade" id="MetrageRetour" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="MetrageRetour">Metrage de Retour</h1>
            {{-- <h1 class="modal-title fs-5" id="ValidVehiculeModal">Metrage de Retour - {{$parking->user->employe->prenom}} {{$parking->user->employe->nom}} </h1> --}}
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="storevalidMetrage">
            @csrf
            @method('POST')
            <div class="modal-body">
            <div class="mt-3">
                <input type="hidden" name="id" value="" id="detail_id">
            </div>
            <div class="mt-3 mb-3">
                <label for="">Metrage de depart:</label>
                <input type="number" name="metrage_depart" id="metrage_depart" class="form-control" readonly>km
            </div>
            <div class="mt-3 mb-3">
                <label for="">Metrage de retour:</label>
                <input type="number" name="metrage_retour" id="metrage_retour" class="form-control">km
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
