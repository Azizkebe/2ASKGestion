<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Ajout Article de Fourniture - {{$fourni->projet->name_projet}} </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-body">
            <div class="mt-3 mb-3">
                {{-- {{$panier}} --}}
                <label for="">Article:</label>
                {{-- {{$fourni->id}} --}}
                <select name="id_article" id="id_article" class="form-select">
                    <option value="">-- choisir un article --</option>
                    @foreach ($article as $article)
                        <option value="{{$article->id}}">{{$article->name_article}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-3">
                <label for="">Quantite demandée</label>

                <input type="number" name="quantite_demande" id="quantity" min="0" id="quantite_demande" class="form-control">
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
