<div class="container-fluid">
    <div class="row justify-content-center align-items-center d-flex-row h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Ajout des contrats de l'employe</h4>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('fiche_contrat.liste')}}" class="btn btn-success btn-sm">Liste de tous les contrats</a>
            </div>

            <form action="" method="POST" wire:submit.prevent="store" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="form-group">
                    <label for="id_employe">Employe: </label>
                </div>
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
                <div class="form-group">
                    <label style="padding-right: 6px;" for="id_contrat">Contrat: </label>
                </div>
                <div class="form-group input-group">
                    <select name="id_contrat" id="id_contrat" wire:model.live="id_contrat" class="form-select">
                       <option value="">--Choisissez un contrat--</option>
                        @foreach ($typecontrat as $contrat)
                       <option value="{{$contrat->id}}">{{$contrat->type_contrat}}</option>

                       @endforeach
                    </select>
                </div>
                <div>
                    @error('id_contrat')
                        <span class="error">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="date_obtention_contrat">Date d'obtention du contrat</label>
                </div>
               <div class="form-group input-group">
                    <input name="date_obtention_contrat" wire:model.live="date_obtention_contrat" class="form-control" placeholder="date d'obtention du contrat" type="date">
                    <div class="input-group">
                        @error('date_obtention_contrat')
                        <span class="error">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-12">
                        <label for="date_fin_contrat">Date de fin du contrat</label><br>
                        @if ($cache == '5')
                        <input name="date_fin_contrat" wire:model.live="date_fin_contrat" class="form-control" placeholder="Date de fin du contrat" type="date" hidden>
                        @else
                        <input name="date_fin_contrat" wire:model.live="date_fin_contrat" class="form-control" placeholder="Date de fin du contrat" type="date" required>
                        <div class="input-group">
                            @error('date_fin_contrat')
                            <span class="error">{{$message}}</span>
                            @enderror
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <textarea name="commentaire" id="commentaire" wire:model.live="commentaire" class="form-control" cols="30" rows="3" placeholder="commentaire"></textarea>
                    <div class="input-group">
                        @error('commentaire')
                        <span class="error">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="mt-3">
                    <label for="fichier_contrat">Joindre le contrat</label>
                    <input type="file" name="fichier_contrat" id="fichier_contrat" wire:model.live="fichier_contrat">
                    {{-- @if ($fichier_contrat)
                    <p style="height:80;"class="mt-3">{{$fichier_contrat->temporary_file_upload['rules']}}</p>
                    @endif --}}
                    @error('fichier_contrat')
                        <span class="error">le champs ne peut pas etre vide</span>
                    @enderror
                </div>
                {{-- <div class="form-group mt-2">
                    <label for="">Joindre le contrat</label>
                    <input type="file" name="photo_contrat" id="photo_contrat" wire:model.live="photo_contrat">
                   <div>
                        @if ($photo_contrat)
                        <p style="height:80;" class="mt-3">{{$fichier_contrat->temporary_file_upload['rules']}}</p>
                        @endif
                   </div>
                </div> --}}
              <div class="form-group justify-content-center align-items-center text-center">
                <button type="submit" class="btn btn-primary btn-block"> Ajouter le contrat </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
