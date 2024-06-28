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
                            <option value="">Masculin</option>
                            <option value="">Feminin</option>
                        </select>
                    </div>
                      <div class="form-group">
                        <label for="matrimonial">Stuation Matrimoniale</label>
                        <select name="matrimonial" id="matrimonial" class="form-select">
                            <option value="">Marie</option>
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
                            <select name="domaine_etude" id="domaine_etude" class="form-select">
                                <option value="">Informatique</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="niveau_etude">Niveau d'etude</label>
                            <select name="niveau_etude" id="niveau_etude" class="form-select">
                                <option value="">Doctorat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dernier_diplome">Dernier diplome Obtenu</label>
                            <select name="dernier_diplome" id="dernier_diplome" class="form-select">
                                <option value="">BAC</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dernier_contrat">Type de Contrat Obtenu</label>
                            <select name="dernier_contrat" id="dernier_contrat" class="form-select">
                                <option value="">Prestation</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="direction">Direction Orientee</label>
                            <select name="direction" id="direction" class="form-select">
                                <option value="">DOFI</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="service">Service Oriente</label>
                            <select name="service" id="service" class="form-select">
                                <option value="">Pole Auto Emploi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="antenne">Antenne Orientee</label>
                            <select name="antenne" id="antenne" class="form-select">
                                <option value="">Pole Auto Emploi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bureau">Bureau Oriente</label>
                            <select name="bureau" id="bureau" class="form-select">
                                <option value="">CDEPS DE DAKAR</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bureau">Poste Occupe</label>
                            <select name="bureau" id="bureau" class="form-select">
                                <option value="">Conseiller</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="image_profil">Joindre la photo de l'employe</label>
                            <input
                            type="file"
                            class="form-control"
                            id="image_profil"
                            name="image_profil"
                            accept="png, jpg, jpeg"
                          />
                        </div>
                        <div class="form-group">
                            <label for="image_cv">Joindre le CV de l'employe</label>
                            <input
                            type="file"
                            class="form-control"
                            id="image_cv"
                            name="image_cv"
                            accept="png, jpg, jpeg"
                          />
                        </div>
                        <div class="form-group">
                            <label for="image_diplome">Joindre le dernier diplome obtenu</label>
                            <input
                            type="file"
                            class="form-control"
                            id="image_diplome"
                            name="image_diplome"
                            accept="png, jpg, jpeg"
                          />
                        </div>
                        <div class="form-group">
                            <label for="image_contrat">Joindre une copie du contrat de travail</label>
                            <input
                            type="file"
                            class="form-control"
                            id="image_contrat"
                            name="image_contrat"
                            accept="png, jpg, jpeg"
                          />
                        </div>
                        <div class="form-group">
                            <label for="image_extrait">Joindre les extraits de naissance des enfants</label>
                            <input
                            type="file"
                            class="form-control"
                            id="image_extrait"
                            name="image_extrait"
                            accept="png, jpg, jpeg"
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
