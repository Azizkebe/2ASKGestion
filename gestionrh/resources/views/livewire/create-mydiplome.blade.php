<div class="container-fluid">
    <div class="row justify-content-center align-items-center d-flex-row h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Ajout d'un diplome</h4>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('mydiplome.liste')}}" class="btn btn-success btn-sm">Liste des diplomes</a>
            </div>

            <form  wire:submit.prevent="store" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="Nom">Employe</label><br>

                    <select name="id_employe" id="id_employe" wire:model.live="id_employe" class="form-select">
                       <option value="">--Choisissez un employe--</option>
                        @foreach ($employe as $employe)
                       <option value="{{$employe->id}}">{{$employe->prenom}} {{$employe->nom}}</option>

                       @endforeach
                    </select>
                </div>
                <div>
                    @error('id_employe')
                        <span class="error">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Nom">Commentaire</label><br>
                    <input type="text" class="form-control" name="commentaire" id="commentaire" wire:model.live="commentaire">
                </div>
                <div>
                    @error('commentaire')
                        <span class="error">{{$message}}</span>
                    @enderror
                </div>
               <div class="form-group">
                <label for="Nom">Date obtention du diplome</label><br>
                    <input name="date_obtention_diplome" wire:model.live="date_obtention_diplome" class="form-control" type="date">
                    <div class="input-group">
                        @error('date_obtention_diplome')
                        <span class="error">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="">Joindre le diplome</label>
                    <input type="file" accept="image/jpg, image/jpeg, image/png" name="diplome" id="diplome" wire:model.live="diplome">
                   <div class="mt-2">
                        @if ($diplome)
                        <img style="width: 70px; height:70px;" src="{{$diplome->temporaryUrl()}}" alt="">
                        @endif
                   </div>
                </div>
              <div class="form-group justify-content-center align-items-center text-center">
                <button type="submit" class="btn btn-primary btn-block"> Ajouter le diplome </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
