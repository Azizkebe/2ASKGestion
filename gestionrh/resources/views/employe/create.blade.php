@extends('layouts.website')

@section('content')
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
            </div>
            <div class="card-body">
                <form action="">
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
                        />
                      </div>
                      <div class="form-group">
                        <label for="name">Prenom</label>
                        <input
                          type="type"
                          class="form-control"
                          id="surname"
                          name="surname"
                          placeholder="Prenom"
                        />
                      </div>
                      <div class="form-group">
                        <label for="email2">Email</label>
                        <input
                          type="email"
                          class="form-control"
                          id="email"
                          name="email"
                          placeholder="Enter Email"
                        />
                      </div>
                      <div class="form-group">
                        <label for="naissance">Date de Naissance</label>
                        <input
                          type="date"
                          class="form-control"
                          id="naissance"
                          name="naissance"
                          placeholder="Date de Naissance"
                        />
                      </div>
                      <div class="form-group">
                        <label for="age">AGE</label>
                        <input
                          type="text"
                          class="form-control"
                          id="age"
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
                          placeholder="Lieu de naissance"
                        />
                      </div>
                      <div class="form-group">
                        <label for="sexe">Genre</label>
                        <select name="sexe" id="sexe" class="form-select">
                            <option value="">--Choisissez le genre --</option>
                            @foreach ($genre as $genre)
                                <option value="{{$genre->id}}">{{$genre->name}}</option>
                            @endforeach
                        </select>
                    </div>
                      <div class="form-group">
                        <label for="matrimonial">Stuation Matrimoniale</label>
                        <select name="matrimonial" id="matrimonial" class="form-select">
                            <option value="">--Choisissez la situation matrimonial --</option>
                            @foreach ($matrimonial as $mat)
                                <option value="{{$mat->id}}">{{$mat->situation_matrimoniale}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="nbr_enfant">Nombre d'enfant</label>
                        <input
                        type="number"
                        class="form-control"
                        id="nbr_enfant"
                        name="nbr_enfant"
                        value="0"
                      />
                    </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="domaine_etude">Domaine d'etude</label>
                            <select name="domaine_etude" id="domaine_etude" class="form-select" autocomplete="on">
                                <option value="">--Choisissez le domaine d'etude --</option>
                                @foreach ($domaine as $domaine)
                                    <option value="{{$domaine->id}}">{{$domaine->domaine_etude}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="niveau_etude">Niveau d'etude</label>
                            <select name="niveau_etude" id="niveau_etude" class="form-select" autocomplete="on">
                                <option value="">--Choisissez le niveau d'etude --</option>
                                @foreach ($niveau as $niveau)
                                    <option value="{{$niveau->id}}">{{$niveau->niveau_etude}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dernier_diplome">Dernier diplome Obtenu</label>
                            <select name="dernier_diplome" id="dernier_diplome" class="form-select" autocomplete="on">
                                <option value="">--Choisissez le dernier diplome obtenu --</option>
                                @foreach ($diplome as $diplome)
                                    <option value="{{$diplome->id}}">{{$diplome->diplome_etude}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dernier_contrat">Type de Contrat Obtenu</label>
                            <select name="dernier_contrat" id="dernier_contrat" class="form-select" autocomplete="on">
                                <option value="">--Choisissez le dernier type de contrat --</option>
                                @foreach ($contrat as $contrat)
                                    <option value="{{$contrat->id}}">{{$contrat->contrat}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="direction">Direction Orientee</label>
                            <select name="direction" id="direction" class="form-select" autocomplete="on">
                                <option value="">--Choisissez la direction ---</option>
                                @foreach ($direction as $direction)
                                    <option value="{{$direction->id}}">{{$direction->direction}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="service">Service Oriente</label>
                            <select name="service" id="service" class="form-select" autocomplete="on">
                                <option value="">--Choisissez le service --</option>
                                @foreach ($service as $service)
                                    <option value="{{$service->id}}">{{$service->service}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="antenne">Antenne Orientee</label>
                            <select name="antenne" id="antenne" class="form-select" autocomplete="on">
                                <option value="">--Choisissez l'antenne --</option>
                                @foreach ($antenne as $antenne)
                                    <option value="{{$antenne->id}}">{{$antenne->antenne}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bureau">Bureau Oriente</label>
                            <select name="bureau" id="bureau" class="form-select" autocomplete="on">
                                <option value="">--Choisissez le bureau --</option>
                                @foreach ($bureau as $bureau)
                                    <option value="{{$bureau->id}}">{{$bureau->bureau}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bureau">Poste Occupe</label>
                            <select name="bureau" id="bureau" class="form-select" autocomplete="on">
                                <option value="">--Choisissez le poste occupé --</option>
                                @foreach ($poste as $poste)
                                    <option value="{{$poste->id}}">{{$poste->poste}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="image_profil">Joindre la photo de l'employe</label>
                            <input
                            type="file"
                            class="form-control"
                            id="imagephoto"
                            name="imagephoto"
                            accept="png, jpg, jpeg"
                          />
                        </div>
                        <div class="form-group">
                            <label for="image_cv">Joindre le CV de l'employe</label>
                            <input
                            type="file"
                            class="form-control"
                            id="imagecv"
                            name="image_cv"
                            accept="png, jpg, jpeg, png"
                          />
                        </div>
                        <div class="form-group">
                            <label for="image_diplome">Joindre le dernier diplome obtenu</label>
                            <input
                            type="file"
                            class="form-control"
                            id="imagediplome"
                            name="imagediplome"
                            accept="pdf, jpg, jpeg, png"
                          />
                        </div>
                        <div class="form-group">
                            <label for="image_contrat">Joindre une copie du contrat de travail</label>
                            <input
                            type="file"
                            class="form-control"
                            id="imagecontrat"
                            name="imagecontrat"
                            accept="pdf, jpg, jpeg, png"
                          />
                        </div>
                        <div class="form-group">
                            <label for="image_extrait">Joindre les extraits de naissance des enfants</label>
                            <input
                            type="file"
                            class="form-control"
                            id="imageextrait"
                            name="imageextrait"
                            accept="pdf, png, jpg, jpeg"
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
@endsection
