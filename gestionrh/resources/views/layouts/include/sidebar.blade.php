<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
        <a href="" class="logo">
          <img
            src="{{asset('admin/img/kaiadmin/logo_anpej.png')}}"
            alt="navbar brand"
            class="navbar-brand"
            height="50"
            width="100"
          />
        </a>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
          </button>
          <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
          </button>
        </div>
        <button class="topbar-toggler more">
          <i class="gg-more-vertical-alt"></i>
        </button>
      </div>
      <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">

        <ul class="nav nav-secondary">
            @php
            $permissionUser = App\Models\PermissionRoleModel::getPermission('Utilisateur', Auth::user()->role_id);
            $permissionDashboard = App\Models\PermissionRoleModel::getPermission('Tableau de bord', Auth::user()->role_id);
            $permissionRole = App\Models\PermissionRoleModel::getPermission('Profil', Auth::user()->role_id);
            $permissionEmploye = App\Models\PermissionRoleModel::getPermission('Employe', Auth::user()->role_id);
            $permissionContrat = App\Models\PermissionRoleModel::getPermission('Contrat', Auth::user()->role_id);
            $permissionMembre = App\Models\PermissionRoleModel::getPermission('Membre', Auth::user()->role_id);
            $permissionDiplome = App\Models\PermissionRoleModel::getPermission('Diplome', Auth::user()->role_id);
            $permissionCV = App\Models\PermissionRoleModel::getPermission('CV', Auth::user()->role_id);
            $permissionconge = App\Models\PermissionRoleModel::getPermission('Permission', Auth::user()->role_id);
            $permissionsetting= App\Models\PermissionRoleModel::getPermission('Configuration', Auth::user()->role_id);
            $permission_conge = App\Models\PermissionRoleModel::getPermission('Conge', Auth::user()->role_id);
            $permission_Permission = App\Models\PermissionRoleModel::getPermission('Permission', Auth::user()->role_id);
            $permissionGroup = App\Models\PermissionRoleModel::getPermission('Group_Permission', Auth::user()->role_id);
            $permissionDemandEmploye= App\Models\PermissionRoleModel::getPermission('Permission_Employe', Auth::user()->role_id);
            $permissionantenne= App\Models\PermissionRoleModel::getPermission('Liste demande antenne', Auth::user()->role_id);
            $permission_rh= App\Models\PermissionRoleModel::getPermission('Ressources Humaines', Auth::user()->role_id);
            $permission_magasin= App\Models\PermissionRoleModel::getPermission('Magasin', Auth::user()->role_id);
            $permission_projet= App\Models\PermissionRoleModel::getPermission('Projet', Auth::user()->role_id);
            $permission_article= App\Models\PermissionRoleModel::getPermission('Article', Auth::user()->role_id);
            $permission_voiture= App\Models\PermissionRoleModel::getPermission('Voiture', Auth::user()->role_id);

            @endphp
            @if (!empty($permissionDashboard))

            <li class="nav-item active">
                <a
                  data-bs-toggle="collapse"
                  href="#dashboard"
                  class="collapsed"
                  aria-expanded="false"
                >
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="dashboard">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="{{route('dashboard')}}">
                        <span class="sub-item">Tableau de bord</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
            @endif

          <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">Components</h4>
          </li>

          @if (!empty($permissionUser))
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#base">
              <i class="fas fa-layer-group"></i>
              <p>Administration</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="base">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('register')}}">
                    <span class="sub-item">Ajouter un utilisateur</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('listregister')}}">
                    <span class="sub-item">Liste des utilisateurs</span>
                  </a>
                </li>

              </ul>
            </div>
          </li>
          @endif
          @if (!empty($permissionGroup))
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#groupe">
              <i class="fas fa-layer-group"></i>
              <p>Groupe de Permission</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="groupe">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('permissionrole.create')}}">
                    <span class="sub-item">Ajouter un group de permission</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('permissionrole.liste')}}">
                    <span class="sub-item">Liste des groupes</span>
                  </a>
                </li>

              </ul>
            </div>
          </li>
          @endif
          @if (!empty($permissionRole))
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#role">
              <i class="fas fa-layer-group"></i>
              <p>Role</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="role">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('role.create')}}">
                    <span class="sub-item">Ajouter un role</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('role.liste')}}">
                    <span class="sub-item">Liste des roles</span>
                  </a>
                </li>

              </ul>
            </div>
          </li>
          @endif
          @if (!empty($permission_magasin))
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#magasin">
              <i class="fas fa-bars"></i>
              <p>Demande</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="magasin">
                <ul class="nav nav-collapse">
                    <li>
                        <a data-bs-toggle="collapse" href="#mag1">
                          <span class="sub-item">Fourniture</span>
                          <span class="caret"></span>
                        </a>
                        <div class="collapse" id="mag1">
                          <ul class="nav nav-collapse subnav">
                            <li>
                                <a href="{{route('fourniture.dashboard')}}">
                                  <span class="sub-item">Tableau de bord</span>
                                </a>
                            </li>
                            <li>
                              <a href="{{route('fourniture.liste')}}">
                                <span class="sub-item">Faire une demande</span>
                              </a>
                            </li>
                            <li>
                              <a href="{{route('fourniture.validation')}}">
                                <span class="sub-item">Valider une demande</span>
                              </a>
                            </li>
                          </ul>
                        </div>
                    </li>
                    <li>
                        <a data-bs-toggle="collapse" href="#veh1">
                          <span class="sub-item">Vehicule</span>
                          <span class="caret"></span>
                        </a>
                        <div class="collapse" id="veh1">
                          <ul class="nav nav-collapse subnav">
                            <li>
                                <a href="{{route('parking.liste')}}">
                                  <span class="sub-item">Demande de vehicule</span>
                                </a>
                            </li>
                            <li>
                              <a href="{{route('parking.validation')}}">
                                <span class="sub-item">Liste de validation des demandes</span>
                              </a>
                            </li>

                          </ul>
                        </div>
                    </li>
                </ul>
            </div>
          </li>
          @endif
          @if (!empty($permission_projet))
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#projet">
              <i class="fas fa-bars"></i>
              <p>Projet</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="projet">
                <ul class="nav nav-collapse">
                    <li>
                        <a data-bs-toggle="collapse" href="#projet1">
                          <span class="sub-item">Projet</span>
                          <span class="caret"></span>
                        </a>
                        <div class="collapse" id="projet1">
                          <ul class="nav nav-collapse subnav">
                            <li>
                              <a href="{{route('projet.create')}}">
                                <span class="sub-item">Ajout un projet</span>
                              </a>
                            </li>
                            <li>
                              <a href="{{route('projet.liste')}}">
                                <span class="sub-item">Liste des projets</span>
                              </a>
                            </li>
                          </ul>
                        </div>
                    </li>
                </ul>
            </div>
          </li>
          @endif
          @if (!empty($permission_article))
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#article">
              <i class="fas fa-bars"></i>
              <p>Article</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="article">
                <ul class="nav nav-collapse">
                    <li>
                        <a data-bs-toggle="collapse" href="#article1">
                          <span class="sub-item">Article</span>
                          <span class="caret"></span>
                        </a>
                        <div class="collapse" id="article1">
                          <ul class="nav nav-collapse subnav">
                            <li>
                              <a href="{{route('article.create')}}">
                                <span class="sub-item">Ajout un article</span>
                              </a>
                            </li>
                            <li>
                              <a href="{{route('article.liste')}}">
                                <span class="sub-item">Liste des articles</span>
                              </a>
                            </li>
                          </ul>
                        </div>
                    </li>
                </ul>
            </div>
          </li>
          @endif
          @if (!empty($permission_voiture))
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#voiture">
              <i class="fas fa-bars"></i>
              <p>Configuration du Park</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="voiture">
                <ul class="nav nav-collapse">
                    <li>
                        <a data-bs-toggle="collapse" href="#voiture1">
                          <span class="sub-item">Voiture & Chauffeur</span>
                          <span class="caret"></span>
                        </a>
                        <div class="collapse" id="voiture1">
                          <ul class="nav nav-collapse subnav">
                            <li>
                              <a href="{{route('voiture.liste')}}">
                                <span class="sub-item">Ajout d'une voiture </span>
                              </a>
                            </li>
                            <li>
                              <a href="{{route('chauffeur.liste')}}">
                                <span class="sub-item">Liste des chauffeurs</span>
                              </a>
                            </li>
                          </ul>
                        </div>
                    </li>
                </ul>
            </div>
          </li>
          @endif
          @if (!empty($permissionEmploye))
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#sidebarLayouts">
              <i class="fas fa-th-list"></i>
              <p>Employe</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="sidebarLayouts">
              <ul class="nav nav-collapse">
                <li>
                    <a href="{{route('employe.create')}}">
                      <span class="sub-item">Ajouter un Employe</span>
                    </a>
                  </li>
                <li>
                  <a href="{{route('employe.liste')}}">
                    <span class="sub-item">Liste des Employes</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          @endif

          @if (!empty($permissionDemandEmploye))
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#permissionemploye">
              <i class="fas fa-layer-group"></i>
              <p>Demande de permission</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="permissionemploye">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('demandepermission.create')}}">
                    <span class="sub-item">Ajouter une permission</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('demandepermission.liste')}}">
                    <span class="sub-item">Liste de mes Permissions</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          @endif
          @if (!empty($permissionantenne))
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#demandeantenne">
              <i class="fas fa-layer-group"></i>
              <p>Permissions soumis</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="demandeantenne">
              <ul class="nav nav-collapse">
                {{-- <li>
                  <a href="{{route('demandepermission.create')}}">
                    <span class="sub-item">Employe - permission</span>
                  </a>
                </li> --}}
                <li>
                  <a href="{{route('demandeantenne.liste')}}">
                    <span class="sub-item">Liste des demandes à traiter </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          @endif
          @if (!empty($permissionContrat))
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#contrat">
              <i class="fas fa-layer-group"></i>
              <p>Contrat</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="contrat">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('fiche_contrat.create')}}">
                    <span class="sub-item">Ajouter un contrat</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('fiche_contrat.liste')}}">
                    <span class="sub-item">Liste des contrats</span>
                  </a>
                </li>

              </ul>
            </div>
          </li>
          @endif
          @if (!empty($permissionMembre))
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#membre">
              <i class="fas fa-layer-group"></i>
              <p>Membre</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="membre">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('membre.create')}}">
                    <span class="sub-item">Ajouter un membre</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('membre.liste')}}">
                    <span class="sub-item">Liste des membres</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          @endif
          @if (!empty($permissionDiplome))
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#diplome">
              <i class="fas fa-layer-group"></i>
              <p>Diplome</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="diplome">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('mydiplome.create')}}">
                    <span class="sub-item">Ajouter un diplome</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('mydiplome.liste')}}">
                    <span class="sub-item">Liste des diplomes</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          @endif
          @if (!empty($permissionCV))
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#cv">
              <i class="fas fa-layer-group"></i>
              <p>Curriculum Vitae</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="cv">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('curriculum.create')}}">
                    <span class="sub-item">Ajouter un cv</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('curriculum.liste')}}">
                    <span class="sub-item">Liste des cv</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          @endif
          @if (!empty($permission_Permission))
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#permission_permission">
              <i class="fas fa-layer-group"></i>
              <p>Demande de permission</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="permission_permission">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('permission.create')}}">
                    <span class="sub-item">Assigner une permission</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('permission.liste')}}">
                    <span class="sub-item">Liste des permissions</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          @endif
          @if (!empty($permission_rh))
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#permission_rh">
              <i class="fas fa-layer-group"></i>
              <p>Autorisation Permission</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="permission_rh">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('demande_resp.liste')}}">
                    <span class="sub-item">Liste des permissions</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          @endif
          @if (!empty($permission_conge))
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#permission">
              <i class="fas fa-layer-group"></i>
              <p>Demande de Congé</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="permission">
              <ul class="nav nav-collapse">
                <li>
                    <a href="{{route('permissionconge.create')}}">
                      <span class="sub-item">Assigner un congé</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('permissionconge.liste')}}">
                      <span class="sub-item">Liste des conges</span>
                    </a>
                </li>
              </ul>
            </div>
          </li>
          @endif
          @if (!empty($permissionsetting))
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#submenu">
              <i class="fas fa-bars"></i>
              <p>Configuration</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="submenu">
              <ul class="nav nav-collapse">
                <li>
                  <a data-bs-toggle="collapse" href="#subnav1">
                    <span class="sub-item">Genre</span>
                    <span class="caret"></span>
                  </a>
                  <div class="collapse" id="subnav1">
                    <ul class="nav nav-collapse subnav">
                      <li>
                        <a href="{{route('genre.create')}}">
                          <span class="sub-item">Ajouter un genre</span>
                        </a>
                      </li>
                      <li>
                        <a href="{{route('genre.liste')}}">
                          <span class="sub-item">Liste des genres</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li>
                  <a data-bs-toggle="collapse" href="#subnav2">
                    <span class="sub-item">Situation Matrimoniale</span>
                    <span class="caret"></span>
                  </a>
                  <div class="collapse" id="subnav2">
                    <ul class="nav nav-collapse subnav">
                      <li>
                        <a href="{{route('matrimonial.create')}}">
                          <span class="sub-item">Ajouter une matrimoniale</span>
                        </a>
                      </li>
                      <li>
                        <a href="{{route('matrimonial.liste')}}">
                          <span class="sub-item">Liste des situations matrimoniales</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li>
                    <a data-bs-toggle="collapse" href="#subnav3">
                      <span class="sub-item">Domaine</span>
                      <span class="caret"></span>
                    </a>
                    <div class="collapse" id="subnav3">
                      <ul class="nav nav-collapse subnav">
                        <li>
                          <a href="{{route('domaine.create')}}">
                            <span class="sub-item">Ajouter un domaine</span>
                          </a>
                        </li>
                        <li>
                            <a href="{{route('domaine.liste')}}">
                              <span class="sub-item">Liste des domaines</span>
                            </a>
                          </li>
                      </ul>
                    </div>
                  </li>
                <li>
                    <li>
                        <a data-bs-toggle="collapse" href="#subnav4">
                          <span class="sub-item">Niveau</span>
                          <span class="caret"></span>
                        </a>
                        <div class="collapse" id="subnav4">
                          <ul class="nav nav-collapse subnav">
                            <li>
                              <a href="{{route('niveau.create')}}">
                                <span class="sub-item">Ajouter un niveau</span>
                              </a>
                            </li>
                            <li>
                                <a href="{{route('niveau.liste')}}">
                                  <span class="sub-item">Liste des niveaux d'etude</span>
                                </a>
                              </li>
                          </ul>
                        </div>
                      </li>
                      <li>
                        <a data-bs-toggle="collapse" href="#subnav13">
                          <span class="sub-item">Diplome</span>
                          <span class="caret"></span>
                        </a>
                        <div class="collapse" id="subnav13">
                          <ul class="nav nav-collapse subnav">
                            <li>
                              <a href="{{route('mondiplome.create')}}">
                                <span class="sub-item">Ajouter un diplome</span>
                              </a>
                            </li>
                            <li>
                                <a href="{{route('mondiplome.liste')}}">
                                  <span class="sub-item">Liste des diplomes</span>
                                </a>
                              </li>
                          </ul>
                        </div>
                      </li>
                    <li>
                    <li>
                        <li>
                            <li>
                                <a data-bs-toggle="collapse" href="#subnav6">
                                  <span class="sub-item">Contrat</span>
                                  <span class="caret"></span>
                                </a>
                                <div class="collapse" id="subnav6">
                                  <ul class="nav nav-collapse subnav">
                                    <li>
                                      <a href="{{route('contrat.create')}}">
                                        <span class="sub-item">Ajouter un contrat</span>
                                      </a>
                                    </li>
                                    <li>
                                        <a href="{{route('contrat.liste')}}">
                                          <span class="sub-item">Liste des contrat</span>
                                        </a>
                                      </li>
                                  </ul>
                                </div>
                              </li>
                            <li>
                                <li>
                                    <a data-bs-toggle="collapse" href="#subnav7">
                                      <span class="sub-item">Direction</span>
                                      <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="subnav7">
                                      <ul class="nav nav-collapse subnav">
                                        <li>
                                          <a href="{{route('direction.create')}}">
                                            <span class="sub-item">Ajouter une direction</span>
                                          </a>
                                        </li>
                                        <li>
                                            <a href="{{route('direction.liste')}}">
                                              <span class="sub-item">Liste des directions</span>
                                            </a>
                                          </li>
                                      </ul>
                                    </div>
                                  </li>
                                <li>
                                    <li>
                                        <a data-bs-toggle="collapse" href="#subnav8">
                                          <span class="sub-item">Service</span>
                                          <span class="caret"></span>
                                        </a>
                                        <div class="collapse" id="subnav8">
                                          <ul class="nav nav-collapse subnav">
                                            <li>
                                              <a href="{{route('service.create')}}">
                                                <span class="sub-item">Ajouter un service</span>
                                              </a>
                                            </li>
                                            <li>
                                                <a href="{{route('service.liste')}}">
                                                  <span class="sub-item">Liste des services</span>
                                                </a>
                                              </li>
                                          </ul>
                                        </div>
                                      </li>
                                    <li>
                                        <li>
                                            <a data-bs-toggle="collapse" href="#subnav9">
                                              <span class="sub-item">Antenne</span>
                                              <span class="caret"></span>
                                            </a>
                                            <div class="collapse" id="subnav9">
                                              <ul class="nav nav-collapse subnav">
                                                <li>
                                                  <a href="{{route('antenne.create')}}">
                                                    <span class="sub-item">Ajouter une antenne</span>
                                                  </a>
                                                </li>
                                                <li>
                                                    <a href="{{route('antenne.liste')}}">
                                                      <span class="sub-item">Liste des antenne</span>
                                                    </a>
                                                  </li>
                                              </ul>
                                            </div>
                                          </li>
                                        <li>
                                            <li>
                                                <a data-bs-toggle="collapse" href="#subnav10">
                                                  <span class="sub-item">Bureau</span>
                                                  <span class="caret"></span>
                                                </a>
                                                <div class="collapse" id="subnav10">
                                                  <ul class="nav nav-collapse subnav">
                                                    <li>
                                                      <a href="{{route('bureau.create')}}">
                                                        <span class="sub-item">Ajouter un bureau</span>
                                                      </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('bureau.liste')}}">
                                                          <span class="sub-item">Liste des bureaux</span>
                                                        </a>
                                                      </li>
                                                  </ul>
                                                </div>
                                              </li>
                                            <li>
                                                <li>
                                                    <a data-bs-toggle="collapse" href="#subnav11">
                                                      <span class="sub-item">Poste</span>
                                                      <span class="caret"></span>
                                                    </a>
                                                    <div class="collapse" id="subnav11">
                                                      <ul class="nav nav-collapse subnav">
                                                        <li>
                                                          <a href="{{route('poste.create')}}">
                                                            <span class="sub-item">Ajouter un poste</span>
                                                          </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{route('poste.liste')}}">
                                                              <span class="sub-item">Liste des postes</span>
                                                            </a>
                                                          </li>
                                                      </ul>
                                                    </div>
                                                  </li>
                                                <li>
                                            </li>
                                            <li>
                                                <li>
                                                    <a data-bs-toggle="collapse" href="#subnav12">
                                                      <span class="sub-item">Conge</span>
                                                      <span class="caret"></span>
                                                    </a>
                                                    <div class="collapse" id="subnav12">
                                                      <ul class="nav nav-collapse subnav">
                                                        <li>
                                                          <a href="{{route('conge.create')}}">
                                                            <span class="sub-item">Ajouter un type de conge</span>
                                                          </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{route('conge.liste')}}">
                                                              <span class="sub-item">Liste des types de conge</span>
                                                            </a>
                                                          </li>
                                                      </ul>
                                                    </div>
                                                  </li>
                                                <li>
                                            </li>
                                        </ul>
                                    </div>
                            </li>
                    </ul>
            </div>
        @endif
    </div>
</div>
