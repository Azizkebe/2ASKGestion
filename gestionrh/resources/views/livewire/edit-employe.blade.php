<div style="margin:auto; width:80%;" class="container">

    <form wire:submit.prevent="update" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div>
          @if ( $currentStep == 1)
          <div class="step-one">
              <div class="card">
                  <div class="card-header bg-primary">
                      <div class="card-title text-white">Modification - Etape 1/4: Identification</div>
                      <div style="display: flex; justify-content:end;">
                          <a href="" class="btn btn-success btn-md"> Liste des Employe</a>
                      </div>
                  </div>
                  <div class="card-body">
                      <div class="mt-3">
                          <label for="name">Nom</label>
                          <input type="text" class="form-control" name="name" id="name" placeholder="nom" wire:model.live="name">
                              @error('name')
                                  <span class="error">Veuillez saisir le nom de l'employe</span>
                              @enderror
                  </div>
                  <div class="mt-3">
                          <label for="name">Prenom</label>
                          <input type="text" class="form-control" name="username" id="username" placeholder="Prenom" wire:model.live="username">
                          @error('username')
                              <span class="error">Veuillez saisir le prenom de l'employe</span>
                          @enderror
                  </div>
                  <div class="mt-3">
                          <label for="email">Email</label>
                          <input type="text" class="form-control" name="email" id="email" wire:model.live="email">
                          @error('email')
                              <span class="error">Veuillez saisir l'adresse Email</span>
                          @enderror
                  </div>
                  <div class="mt-3">
                          <label for="naissance">Date de Naissance</label>
                          <input type="date" class="form-control" name="naissance" id="naissance" wire:model.live="naissance">
                          @error('naissance')
                              <span class="error">Veuillez choisir la date de naissance</span>
                          @enderror
                  </div>
                  <div class="mt-3">
                          <label for="age">AGE</label>
                          <input type="text" class="form-control" name="age" id="age" wire:model.live="age" disabled >
                          @error('age')
                              <span class="error">Age de l'employe est obligatoire</span>
                          @enderror
                  </div>
                  <div class="mt-3">
                          <label for="lieu_naissance">Lieu de Naissance</label>
                          <input type="text" class="form-control" name="lieu_naissance" id="lieu_naissance" wire:model.live="lieu_naissance">
                          @error('lieu_naissance')
                              <span class="error">Veuillez le lieu de naissance</span>
                          @enderror
                  </div>
                  <div class="mt-3">
                          <label for="sexe">Genre</label>
                          <select name="sexe" id="sexe" class="form-select" wire:model.live="sexe">
                              <option value="">--Choisissez le genre --</option>
                              @foreach ($genre as $genre)
                                  <option value="{{$genre->id}}">{{$genre->name}}</option>
                              @endforeach
                          </select>
                              @error('sexe')
                                  <span class="error">Veuillez choisir le sexe</span>
                              @enderror
                  </div>
                  <div class="mt-3">
                          <label for="matrimonial">Stuation Matrimoniale</label>
                          <select name="matrimonial" id="matrimonial" class="form-select" wire:model.live="matrimonial">
                              <option value="">--Choisissez la situation matrimonial --</option>
                              @foreach ($matri as $mat)
                                  <option value="{{$mat->id}}">{{$mat->situation_matrimoniale}}</option>
                              @endforeach
                          </select>
                          @error('matrimonial')
                              <span class="error">Veuillez saisir la situation matrimoniale</span>
                          @enderror
                  </div>
                  <div class="mt-3">
                          <label for="nbr_enfant">Nombre d'enfant</label>
                          <input type="number" class="form-control" id="nbr_enfant" name="nbr_enfant" value="0" min="0" wire:model.live="nbr_enfant">

                              @error('nbr_enfant')
                                  <span class="error">Veuillez preciser le nombre d'enfant</span>
                              @enderror
                  </div>
                  <div class="mt-3">
                          <label for="image_extrait">Joindre les extraits de naissance des enfants</label>
                          <input type="file" class="form-control" name="imageextrait" id="imageextrait" wire:model.live="imageextrait" multiple>
                  </div>
                  <div class="mt-3">
                          <label for="image_profil">Joindre la photo de l'employe</label>
                          <input type="file" class="form-control" name="imagephoto" wire:model.live="imagephoto" id="imagephoto" placeholder="Photo de l'employe" class="form-control" accept="image/png, image/jpg, image/jpeg" autocomplete="on">
                          <div class="col-md-2">
                          @error('imagephoto')
                          <span class="error">Veuillez choisir le domaine d'etude</span>
                          @enderror
                        </div>
                        <div class="col-md-2 mt-1">
                            @if ($info_employe->id_cloud_file_photo)
                                <img style="width: 50px;" src="{{asset('storage/'.$info_employe->photo->photo_employe)}} " alt=""><br>
                                <a href="{{route('employe.delete_photo',$info_employe->id)}}"
                                onclick="return confirm('Etes vous sure de supprimer la photo de profil')">Supprimer</a>
                            @endif
                        </div>
                  </div>
              </div>
          </div>
          @endif

          @if ($currentStep == 2)
          <div class="step-two">
              <div class="card">
                  <div class="card-header bg-secondary text-white">
                      <div class="card-title text-white">Modification - Etape 2/4: Cursus et Diplome</div>
                      <div style="display: flex; justify-content:end;">
                          <a href="" class="btn btn-success btn-md"> Liste des Employe</a>
                      </div>
                  </div>
                  <div class="card-body">
                      <div class="mt-3">
                          <label for="domaine_etude">Domaine d'etude</label>
                          <select name="id_domaine_etude" id="id_domaine_etude" class="form-control form-select" wire:model.live="id_domaine_etude" autocomplete="on">
                              <option value="">--Choisissez le domaine d'etude --</option>
                              @foreach ($domaine as $domaine)
                                  <option value="{{$domaine->id}}">{{$domaine->domaine_etude}}</option>
                              @endforeach
                          </select>
                          @error('id_domaine_etude')
                              <span class="error">Veuillez choisir le domaine d'etude</span>
                          @enderror
                      </div>
                      <div class="mt-3">
                          <label for="niveau_etude">Niveau d'etude</label>
                          <select name="id_niveau_etude" id="id_niveau_etude" class="form-select form-control" wire:model.live="id_niveau_etude" autocomplete="on">
                              <option value="">--Choisissez le niveau d'etude --</option>
                              @foreach ($niveau as $niveau)
                                  <option value="{{$niveau->id}}">{{$niveau->niveau_etude}}</option>
                              @endforeach
                          </select>
                          @error('id_niveau_etude')
                              <span class="error">Veuillez choisir le niveau d'etude</span>
                          @enderror
                      </div>
                      <div class="mt-3">
                          <label for="dernier_diplome">Dernier diplome Obtenu</label>
                          <select name="id_dernier_diplome" id="id_dernier_diplome" class="form-select form-control" wire:model.live="id_dernier_diplome" autocomplete="on">
                              <option value="">--Choisissez le dernier diplome obtenu --</option>
                              @foreach ($diplome as $diplome)
                                  <option value="{{$diplome->id}}">{{$diplome->diplome_etude}}</option>
                              @endforeach
                          </select>
                          @error('id_dernier_diplome')
                              <span class="error">Veuillez choisir le dernier diplome obtenu </span>
                          @enderror
                      </div>
                      <div class="mt-3">
                          <label for="image_diplome">Joindre le dernier diplome obtenu</label>
                          <input type="file" class="form-control" name="imagediplome" id="imagediplome" wire:model.live="imagediplome">
                          @error('imagediplome')
                          <span class="error">Vous devez joindre votre diplome</span>
                          @enderror
                          <div class="col-md-2 mt-1">
                            @if ($info_employe->id_cloud_file_diplome)

                                <div style="height: 50;" class="client-logo">
                                    <a href="{{asset('storage/'.$info_employe->photodiplome->image_diplome)}}"><img src="{{asset('icon/diplome.png')}}" alt="diplome" title="DIPLOME" class="w-100"></a>
                                    <p><a href="{{route('employe.diplome_employe',$info_employe->id)}}"
                                        onclick="return confirm('Etes vous sure de supprimer le diplome')">Supprimer</a></p>

                                </div>

                            @endif

                          </div>
                      </div>
                      <div class="mt-3">
                          <label for="image_cv">Joindre le CV de l'employe</label>
                          <input type="file" class="form-control" name="imagecv" id="imagecv" wire:model.live="imagecv">
                          @error('imagecv')
                          <span class="error">Vous devez joindre votre CV</span>
                          @enderror
                          <div class="col-md-2 mt-1">

                            @if ($info_employe->id_cloud_file_cv)
                            <div style="height: 50;" class="client-logo">
                                <a href="{{asset('storage/'.$info_employe->photocv->image_cv)}}">
                                    <img src="{{asset('icon/cv.png')}}" alt="CV" title="CV" class="w-100"></a>
                               <p><a href="{{route('employe.cv_employe',$info_employe->id )}}"
                                onclick="return confirm('Etes vous sure de supprimer le CV')">Supprimer</a></p>
                            </div>

                            @endif

                          </div>
                      </div>
                  </div>
              </div>
          </div>
          @endif
         @if ($currentStep == 3)
         <div class="step-three">
          <div class="card">
              <div class="card-header bg-secondary text-white">
                  <div class="card-title text-white">Modification - Etape 3/4: Service et Direction</div>
                  <div style="display: flex; justify-content:end;">
                      <a href="" class="btn btn-success btn-md"> Liste des Employe</a>
                  </div>
              </div>
              <div class="card-body">
                  <div class="mt-3">
                      <label for="direction">Direction Orientee</label>
                      <select name="id_direction" id="id_direction" class="form-select form-control" wire:model.live="id_direction" autocomplete="on">
                          <option value="">--Choisissez la direction ---</option>
                          @foreach ($direction as $direction)
                              <option value="{{$direction->id}}">{{$direction->direction}}</option>
                          @endforeach
                      </select>
                      @error('id_direction')
                          <span class="error">Veuillez choisir la direction</span>
                      @enderror
                  </div>
                  <div class="mt-3">
                      <label for="service">Service Oriente</label>
                      <select name="id_service" id="id_service" class="form-select form-control" wire:model.live="id_service" autocomplete="on">
                          <option value="">--Choisissez le service --</option>
                          @foreach ($service as $service)
                              <option value="{{$service->id}}">{{$service->service}}</option>
                          @endforeach
                      </select>
                      @error('id_service')
                          <span class="error">Veuillez choisir le service</span>
                      @enderror
                  </div>
                  <div class="mt-3">
                      <label for="antenne">Antenne Orientee</label>
                      <select name="id_antenne" id="id_antenne" class="form-select form-control" wire:model.live="id_antenne" autocomplete="on">
                          <option value="">--Choisissez l'antenne --</option>
                          @foreach ($antenne as $antenne)
                              <option value="{{$antenne->id}}">{{$antenne->antenne}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="mt-3">
                      <label for="bureau">Bureau Oriente</label>
                      <select name="id_bureau" id="id_bureau" class="form-select form-control" wire:model.live="id_bureau" autocomplete="on">
                          <option value="">--Choisissez le bureau --</option>
                          @foreach ($bureau as $bureau)
                              <option value="{{$bureau->id}}">{{$bureau->bureau}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="mt-3">
                      <label for="poste">Poste Occupe</label>
                      <select name="id_poste" id="id_poste" class="form-select form-control" wire:model.live="id_poste" autocomplete="on">
                          <option value="">--Choisissez le poste occupé --</option>
                          @foreach ($poste as $poste)
                              <option value="{{$poste->id}}">{{$poste->poste}}</option>
                          @endforeach
                      </select>
                      @error('id_poste')
                          <span class="error">Veuillez choisir le poste occcupé par l'employé</span>
                      @enderror
                  </div>
              </div>
          </div>
      </div>
      @endif
      @if ($currentStep == 4)
      <div class="step-four">
          <div class="card">
              <div class="card-header bg-secondary text-white">
                  <div class="card-title text-white">Modification - Etape 4/4: Contrat</div>
                  <div style="display: flex; justify-content:end;">
                      <a href="" class="btn btn-success btn-md"> Liste des Employe</a>
                  </div>
              </div>
              <div class="card-body">
                  <div class="mt-3">
                      <label for="dernier_contrat">Type de Contrat Obtenu</label>
                      <select name="id_dernier_contrat" id="id_dernier_contrat" class="form-select form-control" wire:model.live="id_dernier_contrat" autocomplete="on">
                          <option value="">--Choisissez le dernier type de contrat --</option>
                          @foreach ($contrat as $contrat)
                              <option value="{{$contrat->id}}">{{$contrat->contrat}}</option>
                          @endforeach
                      </select>

                      @error('id_dernier_contrat')
                          <span class="error">Veuillez choisir le contrat obtenu</span>
                      @enderror

                  </div>
                  <div class="mt-3">
                      <label for="image_contrat">Joindre une copie du contrat de travail</label>
                      <input type="file" class="form-control" name="imagecontrat" id="imagecontrat" wire:model.live="imagecontrat">
                      @error('imagecontrat')
                      <span class="error">Vous devez joindre une copie du contrat</span>
                       @enderror
                  </div>
                  <div class="col-md-2 mt-1">
                    @if ($info_employe->id_cloud_file_contrat != NULL)
                        {{-- <img style="width: 50px;" src="{{asset('storage/'.$info_employe->photocontrat->image_contrat)}} " alt=""> --}}
                        <div>
                            <a  style="height: 50;" class="client-logo" href="{{asset('storage/'.$info_employe->photocontrat->image_contrat)}}"><img src="{{asset('icon/contrat.png')}}" title="CONTRAT" alt="contrat" class="w-100"></a>
                            <p> <a href="{{route('employe.contrat_employe',$info_employe->id)}}"
                                onclick="return confirm('Etes vous sure de supprimer le contrat')">Supprimer</a></p>
                        </div>
                    @endif
                  </div>
              </div>
              </div>
          </div>
      </div>
      @endif
             <div class="action-buttoms d-flex justify-content-between bg-white pt-2 pb-2">
                  @if ($currentStep == 1)
                  <div></div>
                  @endif
                  @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4)
                  <a href="" class="btn btn-secondary btn-md text-white" wire:click.prevent="decreaseStep()">Precedent</a>
                  @endif
                  @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3)
                  <a href="" class="btn btn-success btn-md text-white" wire:click.prevent="increaseStep()">Suivant</a>
                  @endif
                  @if ($currentStep == 4)
                  <button type="submit" class="btn btn-primary">Enregistrer la modification</button>
                  {{-- <a href="" class="btn btn-success btn-sm text-white">Enregistrer</a> --}}
                  @endif
              </div>
      </div>


    </form>
</div>
