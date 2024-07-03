<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
        <a href="index.html" class="logo">
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
                  <a href="../demo1/index.html">
                    <span class="sub-item">Dashboard 1</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">Components</h4>
          </li>
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
                  <a href="icon-menu.html">
                    <span class="sub-item">Liste des Employes</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#forms">
              <i class="fas fa-pen-square"></i>
              <p>Forms</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="forms">
              <ul class="nav nav-collapse">
                <li>
                  <a href="forms/forms.html">
                    <span class="sub-item">Basic Form</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#tables">
              <i class="fas fa-table"></i>
              <p>Tables</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav nav-collapse">
                <li>
                  <a href="tables/tables.html">
                    <span class="sub-item">Basic Table</span>
                  </a>
                </li>
                <li>
                  <a href="tables/datatables.html">
                    <span class="sub-item">Datatables</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
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
                        <li>
                            <a data-bs-toggle="collapse" href="#subnav5">
                              <span class="sub-item">Diplome</span>
                              <span class="caret"></span>
                            </a>
                            <div class="collapse" id="subnav5">
                              <ul class="nav nav-collapse subnav">
                                <li>
                                  <a href="{{route('diplome.create')}}">
                                    <span class="sub-item">Ajouter un diplome</span>
                                  </a>
                                </li>
                                <li>
                                    <a href="{{route('diplome.liste')}}">
                                      <span class="sub-item">Liste des diplomes</span>
                                    </a>
                                  </li>
                              </ul>
                            </div>
                          </li>
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
                        {{-- <a href="#">
                            <span class="sub-item">Level 1</span>
                        </a> --}}
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
