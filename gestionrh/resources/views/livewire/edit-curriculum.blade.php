<div class="container-fluid">
    <div class="row justify-content-center align-items-center d-flex-row h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Editer un Curriculum Vitea</h4>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('curriculum.liste')}}" class="btn btn-success btn-sm">Liste des curriculum Vitea</a>
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
                    <label for="Nom">Commentaire</label><br>
                    <input type="text" class="form-control" name="commentaire" id="commentaire" wire:model.live="commentaire">
                </div>
                <div>
                    @error('commentaire')
                        <span class="error">{{$message}}</span>
                    @enderror
                </div>
               <div class="form-group">
                <label for="Nom">Date de la derniere mise à jour</label><br>
                    <input name="date_mis_a_jour" wire:model.live="date_mis_a_jour" class="form-control" type="date">
                    <div class="input-group">
                        @error('date_mis_a_jour')
                        <span class="error">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="">Joindre le Curriculum Vitea(CV)</label>
                    <input type="file" name="curriculum" id="curriculum" wire:model.live="curriculum">
                    <a href="{{asset('storage/'.$curriculum)}}">
                        <img style="height: 50px;" src="{{asset('icon/cv.png')}}"
                         alt="CV">
                    </a>
                </div>
                <div>
                    <span style="color:rgb(45, 139, 138)">Seul le fichier extensions pdf est autorisé</span>
                </div>
                @error('curriculum')
                    <span class="error">le champs ne peut pas etre vide</span>
                @enderror
              <div class="form-group justify-content-center align-items-center text-center">
                <button type="submit" class="btn btn-primary btn-block"> Enregistrer les modifications du CV  </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
