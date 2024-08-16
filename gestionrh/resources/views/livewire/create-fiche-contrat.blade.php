<div class="container-fluid">
    <div class="row justify-content-center align-items-center d-flex-row h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Ajout des contrats de l'employe</h4>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('fiche_contrat.liste')}}" class="btn btn-success btn-sm">Liste de tous les contrats</a>
            </div>

            <form action="" method="POST" wire:submit.prevent="store">
                @csrf
                @method('POST')
                <div class="form-group input-group">
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
                <div class="form-group input-group">
                    <select name="id_contrat" id="id_contrat" wire:model.live="id_contrat" class="form-select">
                       <option value="">--Choisissez un contrat--</option>
                        @foreach ($contrat as $contrat)
                       <option value="{{$contrat->id}}">{{$contrat->contrat}}</option>

                       @endforeach
                    </select>
                </div>
                <div>
                    @error('id_contrat')
                        <span class="error">{{$message}}</span>
                    @enderror
                </div>
               <div class="form-group input-group">
                    <input name="date_obtention_contrat" wire:model.live="date_obtention_contrat" class="form-control" placeholder="date d'obtention du contrat" type="date" value="{{old('date_obtention_contrat')}}">
                    <div class="input-group">
                        @error('date_obtention_contrat')
                        <span class="error">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="date_obtention_contrat">Date de fin du contrat</label><br>
                    <input name="date_fin_contrat" wire:model.live="date_fin_contrat" class="form-control" placeholder="Date de fin du contrat" type="date" value="{{old('date_fin_contrat')}}">
                    <div class="input-group">
                        @error('date_fin_contrat')
                        <span class="error">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <textarea name="commentaire" id="commentaire" wire:model.live="commentaire" class="form-control" cols="30" rows="3"></textarea>
                    <div class="input-group">
                        @error('commentaire')
                        <span class="error">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <input type="file" accept="image/jpg, image/jpeg, image/png" name="fichier_contrat" id="fichier_contrat" wire:model.live="fichier_contrat">
                    @if ($this->fichier_contrat)
                        <img style="width: 50px; height:50px;" src="{{$this->fichier_contrat->temporaryUrl()}}" alt="">
                    @endif
                </div>
              <div class="form-group justify-content-center align-items-center text-center">
                <button type="submit" class="btn btn-primary btn-block"> Ajouter le contrat </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
