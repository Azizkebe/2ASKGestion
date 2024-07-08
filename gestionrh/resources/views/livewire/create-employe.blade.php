<div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-3">Employe</h3>
        <ul class="breadcrumbs mb-3">
          <li class="nav-home">
            <a href="#">
              <i class="icon-home"></i>
            </a>
          </li>
          <li class="separator">
            <i class="icon-arrow-right"></i>
          </li>
          <li class="nav-item">
            <a href="#">Ajout</a>
          </li>
          <li class="separator">
            <i class="icon-arrow-right"></i>
          </li>
          <li class="nav-item">
            <a href="#">Employe</a>
          </li>
        </ul>
      </div>
          <div class="card">
            <div class="card-header">
              <div class="card-title">Ajouter un Employe</div>
              <div style="display: flex; justify-content:end;">
                <a href="{{route('employe.liste')}}" class="btn btn-success btn-sm">Liste des Employes</a>
            </div>
            </div>
            <div class="card-body">

                <div>
                         @if (session('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert"
                            aria-hidden="true">x</button>
                            {{session('success')}}
                        </div>
                          @endif
                </div>
                <form wire:submit.prevent="store" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                <div class="row">
                   <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input
                          type="type"
                          class="form-control"
                          id="name"
                          name="name"
                          placeholder="Nom"
                          wire:model.live="name"
                        />
                      </div>
                      <div>
                        @error('name')
                            <span class="error">Veuillez saisir le nom de l'employe</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="name">Prenom</label>
                        <input
                          type="type"
                          class="form-control"
                          id="username"
                          name="username"
                          wire:model.live="username"
                          placeholder="Prenom"
                        />
                      </div>
                      <div>
                        @error('username')
                            <span class="error">Veuillez saisir le prenom de l'employe</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="email2">Email</label>
                        <input
                          type="email"
                          class="form-control"
                          id="email"
                          name="email"
                          wire:model.live="email"
                          placeholder="Enter Email"
                        />
                      </div>
                      <div>
                        @error('email')
                            <span class="error">Veuillez saisir l\'adresse Email</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="naissance">Date de Naissance</label>
                        <input
                          type="date"
                          class="form-control"
                          id="naissance"
                          name="naissance"
                          wire:model.live="naissance"
                          placeholder="Date de Naissance"
                        />
                      </div>
                      <div>
                        @error('naissance')
                            <span class="error">Veuillez saisir le nom de l'employe</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="age">AGE</label>
                        <input
                          type="text"
                          class="form-control"
                          id="age"
                          name="age"
                          wire:model.live="age"
                          placeholder="20"
                          disabled
                        />
                      </div>
                      <div class="form-group">
                        <label for="lieu_naissance">Lieu de Naissance</label>
                        <input
                          type="type"
                          class="form-control"
                          id="lieu_naissance"
                          name="lieu_naissance"
                          wire:model.live="lieu_naissance"
                          placeholder="Lieu de naissance"
                        />
                      </div>
                      <div>
                        @error('naissance')
                            <span class="error">Veuillez choisir la date de naissance</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="sexe">Genre</label>
                        <select name="sexe" id="sexe" class="form-select" wire:model.live="sexe">
                            <option value="">--Choisissez le genre --</option>
                            @foreach ($genre as $genre)
                                <option value="{{$genre->id}}">{{$genre->name}}</option>
                            @endforeach
                        </select>
                    </div>
                      <div>
                        @error('sexe')
                            <span class="error">Veuillez choisir le sexe</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="matrimonial">Stuation Matrimoniale</label>
                        <select name="matrimonial" id="matrimonial" class="form-select" wire:model.live="matrimonial">
                            <option value="">--Choisissez la situation matrimonial --</option>
                            @foreach ($matri as $mat)
                                <option value="{{$mat->id}}">{{$mat->situation_matrimoniale}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div>
                        @error('matrimonial')
                            <span class="error">Veuillez saisir la situation matrimoniale</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="nbr_enfant">Nombre d'enfant</label>
                        <input
                        type="number"
                        class="form-control"
                        id="nbr_enfant"
                        name="nbr_enfant"
                        wire:model.live="nbr_enfant"
                        value="0"
                      />
                    </div>
                    <div>
                        @error('nbr_enfant')
                            <span class="error">Veuillez choisir le domaine d'etude</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="domaine_etude">Domaine d'etude</label>
                            <select name="id_domaine_etude" id="id_domaine_etude" class="form-select" wire:model.live="id_domaine_etude" autocomplete="on">
                                <option value="">--Choisissez le domaine d'etude --</option>
                                @foreach ($domaine as $domaine)
                                    <option value="{{$domaine->id}}">{{$domaine->domaine_etude}}</option>
                                @endforeach
                            </select>
                        </div>
                          <div>
                            @error('id_domaine_etude')
                                <span class="error">Veuillez choisir le domaine d'etude</span>
                            @enderror
                          </div>
                        <div class="form-group">
                            <label for="niveau_etude">Niveau d'etude</label>
                            <select name="id_niveau_etude" id="id_niveau_etude" class="form-select" wire:model.live="id_niveau_etude" autocomplete="on">
                                <option value="">--Choisissez le niveau d'etude --</option>
                                @foreach ($niveau as $niveau)
                                    <option value="{{$niveau->id}}">{{$niveau->niveau_etude}}</option>
                                @endforeach
                            </select>
                        </div>
                          <div>
                            @error('id_niveau_etude')
                                <span class="error">Veuillez choisir le niveau d'etude</span>
                            @enderror
                          </div>
                        <div class="form-group">
                            <label for="dernier_diplome">Dernier diplome Obtenu</label>
                            <select name="id_dernier_diplome" id="id_dernier_diplome" class="form-select" wire:model.live="id_dernier_diplome" autocomplete="on">
                                <option value="">--Choisissez le dernier diplome obtenu --</option>
                                @foreach ($diplome as $diplome)
                                    <option value="{{$diplome->id}}">{{$diplome->diplome_etude}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            @error('id_dernier_diplome')
                                <span class="error">Veuillez choisir le dernier diplome obtenu </span>
                            @enderror
                          </div>
                        <div class="form-group">
                            <label for="dernier_contrat">Type de Contrat Obtenu</label>
                            <select name="id_dernier_contrat" id="id_dernier_contrat" class="form-select" wire:model.live="id_dernier_contrat" autocomplete="on">
                                <option value="">--Choisissez le dernier type de contrat --</option>
                                @foreach ($contrat as $contrat)
                                    <option value="{{$contrat->id}}">{{$contrat->contrat}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            @error('id_dernier_contrat')
                                <span class="error">Veuillez choisir le contrat obtenu</span>
                            @enderror
                          </div>
                        <div class="form-group">
                            <label for="direction">Direction Orientee</label>
                            <select name="id_direction" id="id_direction" class="form-select" wire:model.live="id_direction" autocomplete="on">
                                <option value="">--Choisissez la direction ---</option>
                                @foreach ($direction as $direction)
                                    <option value="{{$direction->id}}">{{$direction->direction}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            @error('id_direction')
                                <span class="error">Veuillez choisir la direction</span>
                            @enderror
                          </div>
                        <div class="form-group">
                            <label for="service">Service Oriente</label>
                            <select name="id_service" id="id_service" class="form-select" wire:model.live="id_service" autocomplete="on">
                                <option value="">--Choisissez le service --</option>
                                @foreach ($service as $service)
                                    <option value="{{$service->id}}">{{$service->service}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            @error('id_service')
                                <span class="error">Veuillez choisir le service</span>
                            @enderror
                          </div>
                        <div class="form-group">
                            <label for="antenne">Antenne Orientee</label>
                            <select name="id_antenne" id="id_antenne" class="form-select" wire:model.live="id_antenne" autocomplete="on">
                                <option value="">--Choisissez l'antenne --</option>
                                @foreach ($antenne as $antenne)
                                    <option value="{{$antenne->id}}">{{$antenne->antenne}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bureau">Bureau Oriente</label>
                            <select name="id_bureau" id="id_bureau" class="form-select" wire:model.live="id_bureau" autocomplete="on">
                                <option value="">--Choisissez le bureau --</option>
                                @foreach ($bureau as $bureau)
                                    <option value="{{$bureau->id}}">{{$bureau->bureau}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="poste">Poste Occupe</label>
                            <select name="id_poste" id="id_poste" class="form-select" wire:model.live="id_poste" autocomplete="on">
                                <option value="">--Choisissez le poste occupé --</option>
                                @foreach ($poste as $poste)
                                    <option value="{{$poste->id}}">{{$poste->poste}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            @error('id_poste')
                                <span class="error">Veuillez choisir le poste occcupé par l'employé</span>
                            @enderror
                          </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="image_profil">Joindre la photo de l'employe</label>
                            <input type="file" name="imagephoto" wire:model.live="imagephoto" id="imagephoto" placeholder="Photo de l'employe" class="form-control" autocomplete="on">
                        </div>
                        <div class="form-group">
                            <label for="image_cv">Joindre le CV de l'employe</label>
                            <input
                            type="file"
                            class="form-control"
                            id="imagecv"
                            name="imagecv"
                            wire:model.live="imagecv"
                            accept="jpg, jpeg, png"
                          />
                        </div>
                        <div class="form-group">
                            <label for="image_diplome">Joindre le dernier diplome obtenu</label>
                            <input
                            type="file"
                            class="form-control"
                            id="imagediplome"
                            name="imagediplome"
                            wire:model.live="imagediplome"
                            accept="image/pdf, image/jpg, image/jpeg, image/png"
                          />
                        </div>
                        <div class="form-group">
                            <label for="image_contrat">Joindre une copie du contrat de travail</label>
                            <input
                            type="file"
                            class="form-control"
                            id="imagecontrat"
                            name="imagecontrat"
                            wire:model.live="imagecontrat"
                            accept="image/pdf, image/jpg, image/jpeg, image/png"
                          />
                        </div>
                        <div class="form-group">
                            <label for="image_extrait">Joindre les extraits de naissance des enfants</label>
                            <input
                            type="file"
                            class="form-control"
                            id="imageextrait"
                            name="imageextrait"
                            wire:model.live="imageextrait"
                            accept="image/pdf, image/png, image/jpg, image/jpeg"
                            multiple
                          />
                        </div>
                    </div>

                </div>
                   <div style="display: flex; justify-content:center; align-items:center;" class="card-action">
                        <button type="submit" class="btn btn-primary btn-block d-flex">Ajouter Employe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
