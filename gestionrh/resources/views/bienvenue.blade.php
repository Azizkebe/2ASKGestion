@extends('layouts.website')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
              <div>
                <h3 class="fw-bold mb-3">Tableau de bord</h3>
                <h6 class="op-7 mb-2">Voir les donnees statistiques </h6>
              </div>
              <div class="ms-md-auto py-2 py-md-0">
                <a href="{{route('permission.liste')}}" class="btn btn-label-info btn-round me-2">Liste des permissions</a>
                <a href="{{route('permissionconge.liste')}}" class="btn btn-primary btn-round">Liste des congés</a>
              </div>
            </div>
        </div>
        <div class="row row-card-no-pd">
            <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6><b>Nombre de Permission </b></h6>
                                <p class="text-muted"> Permission autorisée</p>
                            </div>
                                <h4 class="text-info fw-bold"> {{$permission}} autorisé(s)</h4>
                        </div>
                        <div class="progress progress-sm">
                                {{-- <div
                                class="progress-bar bg-info w-75"
                                role="progressbar"
                                aria-valuenow="{{$permission}}"
                                aria-valuemin="0"
                                aria-valuemax="100"
                                ></div> --}}
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0">Total</p>
                            <p class="text-muted mb-0">{{$permission}} %</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6><b>Nombre de Congé</b></h6>
                                <p class="text-muted">Vous avez autorisé</p>
                            </div>
                                <h4 class="text-info fw-bold"> {{$conge}} autorisé(s)</h4>
                        </div>
                        <div class="progress progress-sm">
                                {{-- <div
                                class="progress-bar bg-success w-75"
                                role="progressbar"
                                aria-valuenow="5"
                                aria-valuemin="0"
                                aria-valuemax="100"
                                ></div> --}}
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0">Total</p>
                            <p class="text-muted mb-0">{{$conge}} %</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6><b>Nombre de Contrat</b></h6>
                                <p class="text-muted">Vous avez </p>
                            </div>
                                <h4 class="text-info fw-bold">{{$contrat}} enregistré(s)</h4>
                        </div>
                        <div class="progress progress-sm">
                                {{-- <div
                                class="progress-bar bg-danger w-75"
                                role="progressbar"
                                aria-valuenow="{{$contrat}}"
                                aria-valuemin="0"
                                aria-valuemax="{{$contrat}}"
                                ></div> --}}
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0">Total</p>
                            <p class="text-muted mb-0">{{$contrat}} %</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6><b>Nombre de CV</b></h6>
                                <p class="text-muted">Vous avez</p>
                            </div>
                                <h4 class="text-info fw-bold">{{$curriculum}} enregistré(s)</h4>
                        </div>
                        <div class="progress progress-sm">
                                {{-- <div
                                class="progress-bar bg-secondary w-75"
                                role="progressbar"
                                aria-valuenow="{{$curriculum}}"
                                aria-valuemin="0"
                                aria-valuemax="{{$curriculum}}"
                                ></div> --}}
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0">Total</p>
                            <p class="text-muted mb-0">{{$curriculum}} %</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-card-no-pd">
            <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6><b>Nombre Employe</b></h6>
                                <p class="text-muted">Nous sommes</p>
                            </div>
                                <h4 class="text-info fw-bold">{{$employe}} enregistré(s)</h4>
                        </div>
                        <div class="progress progress-sm">
                                {{-- <div
                                class="progress-bar bg-success w-75"
                                role="progressbar"
                                aria-valuenow="{{$employe}}"
                                aria-valuemin="0"
                                aria-valuemax="{{$employe}}"
                                ></div> --}}
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0">Total</p>
                            <p class="text-muted mb-0">{{$employe}} %</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6><b>Nombre de Diplome</b></h6>
                                <p class="text-muted">Vous avez </p>
                            </div>
                                <h4 class="text-info fw-bold">{{$diplome}} enregistré(s)</h4>
                        </div>
                        <div class="progress progress-sm">
                                {{-- <div
                                class="progress-bar bg-warning w-75"
                                role="progressbar"
                                aria-valuenow="{{$diplome}}"
                                aria-valuemin="0"
                                aria-valuemax="{{$diplome}}"
                                ></div> --}}
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0">Total</p>
                            <p class="text-muted mb-0">{{$diplome}} %</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6><b>Nombre de Membre</b></h6>
                                <p class="text-muted">Vous avez </p>
                            </div>
                                <h4 class="text-info fw-bold">{{$membre}} enregistré(s)</h4>
                        </div>
                        <div class="progress progress-sm">
                                {{-- <div
                                class="progress-bar bg-info w-75"
                                role="progressbar"
                                aria-valuenow="{{$membre}}"
                                aria-valuemin="0"
                                aria-valuemax="{{$membre}}"
                                ></div> --}}
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0">Total</p>
                            <p class="text-muted mb-0">{{$membre}} %</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6><b>Nombre de CV</b></h6>
                                <p class="text-muted">Vous avez enregistré</p>
                            </div>
                                <h4 class="text-info fw-bold">{{$curriculum}}</h4>
                        </div>
                        <div class="progress progress-sm">
                                <div
                                class="progress-bar bg-info w-75"
                                role="progressbar"
                                aria-valuenow="{{$curriculum}}"
                                aria-valuemin="0"
                                aria-valuemax="100"
                                ></div>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0">Total</p>
                            <p class="text-muted mb-0">{{$curriculum}} %</p>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
