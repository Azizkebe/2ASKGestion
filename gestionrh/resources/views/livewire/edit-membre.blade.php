<div class="container-fluid">
    <div class="row justify-content-center align-items-center d-flex-row h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Editer un membre</h4>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('membre.liste')}}" class="btn btn-success btn-sm">Liste de tous les membres</a>
            </div>

            <form  wire:submit.prevent="update" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                    <label for="Nom">Membre</label><br>
                    <select name="id_type_membre" id="id_type_membre" wire:model.live="id_type_membre" class="form-select">
                       <option value="">--Choisissez un contrat--</option>
                        @foreach ($type as $type)
                       <option value="{{$type->id}}">{{$type->type_membre}}</option>

                       @endforeach
                    </select>
                </div>
                <div>
                    @error('id_type_membre')
                        <span class="error">{{$message}}</span>
                    @enderror
                </div>
               <div class="form-group">
                <label for="Nom">Prenom du Membre</label><br>
                    <input name="prenom" wire:model.live="prenom" class="form-control" type="text">
                    <div class="input-group">
                        @error('prenom')
                        <span class="error">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-9">
                        <label for="Nom">Nom du Membre</label><br>
                        <input name="nom" wire:model.live="nom" class="form-control" type="text">
                        <div class="input-group">
                            @error('nom')
                            <span class="error">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <input type="file" name="justificative" id="justificative" wire:model.live="justificative">
                    <a href="{{asset('storage/'.$justificative)}}">
                        <img style="height: 50px;" src="{{asset('icon/membre.jpg')}}"
                         alt="contrat">
                    </a>
                    <div>
                        <span style="color:rgb(45, 139, 138)">Seul le fichier extensions pdf est autorisé</span>
                    </div>
                    @error('justificative')
                        <span class="error">le champs ne peut pas etre vide</span>
                    @enderror
                </div>
              <div class="form-group justify-content-center align-items-center text-center">
                <button type="submit" class="btn btn-primary btn-block"> Enregistrer les modifications </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
