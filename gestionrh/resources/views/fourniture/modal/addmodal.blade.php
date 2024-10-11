<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Ajout Article de Fourniture - {{$fourni->projet->name_projet}} </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('fourniture.store_detail', $fourni->id)}}" method="POST">
            @csrf
            @method('POST')
            <div class="modal-body">
            <div class="mt-3 mb-3">
                <label for="">Article:</label>
                <select name="id_article" id="id_article" class="form-select">
                    <option value="">-- choisir un article --</option>
                    @foreach ($article as $article)
                        <option value="{{$article->id}}">{{$article->name_article}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-3">
                <label for="">Quantite demandée</label>
                <input type="number" name="quantite_demande" min="0" id="quantite_demande" class="form-control">
            </div>
            </div>
            <div class="modal-footer">
            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary">Ajouter un article</button>
            </div>
        </form>
        </div>
    </div>
</div>
