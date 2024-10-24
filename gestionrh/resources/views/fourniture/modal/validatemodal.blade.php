<div class="modal fade" id="validModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Changement de Statut -  </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="POST">
            @csrf
            @method('POST')
            <div class="modal-body">
            <div class="mt-3 mb-3">
                <label for="">Changement de Statut...</label>
                {{-- <select name="id_etat" id="id_etat" class="form-select">
                    <option value="">-- choisir un etat --</option>
                    @foreach ($etat as $etat)
                        <option value="{{$etat->id}}">{{$etat->statut_demande}}</option>
                    @endforeach
                </select> --}}
            </div>

            {{-- <div class="mt-3">
                <label for="">Commentaire</label>
                <textarea name="commentaire" id="commentaire" cols="15" rows="5" class="form-control"></textarea>
            </div> --}}

            </div>
            <div class="modal-footer">
            <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
        </div>
    </div>
</div>
