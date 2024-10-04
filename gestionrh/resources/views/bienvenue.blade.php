@extends('layouts.website')

@section('content')
    <div class="container">
        @php
         $permissionConfiguration = App\Models\PermissionRoleModel::getPermission('Configuration', Auth::user()->role_id);
        @endphp
        <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
              <div>
                <h3 class="fw-bold mb-3">Tableau de bord</h3>
                <h6 class="op-7 mb-2">Voir les donnees statistiques </h6>
              </div>
              <div class="ms-md-auto py-2 py-md-0">
                {{-- <a href="{{route('migrer.create')}}" class="btn btn-label-info btn-round me-2">Migrer conge restant des congés</a> --}}
                @if (!empty($permissionConfiguration))
                <a href="{{route('setting.liste')}}" class="btn btn-primary btn-round">Configuration</a>
                @endif
              </div>
            </div>
        </div>
        <div class="row row-card-no-pd">
            <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6><b>Nombre total de demande de Permission </b></h6>
                                <p class="text-muted">Total de Permission</p>
                            </div>
                                <h4 class="text-info fw-bold"> {{$demande_permission_total}} demandé(s)</h4>
                        </div>
                        <div class="progress progress-sm">
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0">Total</p>
                            <p class="text-muted mb-0">{{$demande_permission_total}} %</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body alert alert-warning">
                        <div class="d-flex justify-content-between">
                            <div style="color:black;">
                                <h6><b>Nombre de demande de permission en cours</b></h6>
                                <p class="text-muted">Vous avez </p>
                            </div>
                                <h4 class="text-info fw-bold">{{$demande_permission_encours}} en cours</h4>
                        </div>
                        <div class="progress progress-sm">
                        </div>
                        <div class="d-flex justify-content-between mt-2  alert alert-warning">
                            <p class="text-muted mb-0">Total</p>
                            <p class="text-muted mb-0">{{$demande_permission_encours}} %</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body alert alert-success">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6><b>Nombre de demande de permission accepté</b></h6>
                                <p class="text-muted">Vous avez</p>
                            </div>
                                <h4 class="text-info fw-bold">{{$demande_permission_accept}} accepté(s)</h4>
                        </div>
                        <div class="progress progress-sm">
                        </div>
                        <div class="d-flex justify-content-between mt-2 alert alert-success">
                            <p class="text-muted mb-0">Total</p>
                            <p class="text-muted mb-0">{{$demande_permission_accept}} %</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body alert alert-danger">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6><b>Nombre de demande de permission Rejeté</b></h6>
                                <p class="text-muted">Vous avez </p>
                            </div>
                                <h4 class="text-info fw-bold">{{$demande_permission_rejet}} rejeté(s)</h4>
                        </div>
                        <div class="progress progress-sm">
                        </div>
                        <div class="d-flex justify-content-between mt-2 alert alert-danger">
                            <p class="text-muted mb-0">Total</p>
                            <p class="text-muted mb-0">{{$demande_permission_rejet}} %</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-card-no-pd">
            {{-- <div class="col-12 col-sm-6 col-md-6 col-xl-3">
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
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0">Total</p>
                            <p class="text-muted mb-0">{{$permission}} %</p>
                        </div>
                    </div>
                </div>
            </div> --}}
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
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0">Total</p>
                            <p class="text-muted mb-0">{{$conge}} %</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-12 col-sm-6 col-md-6 col-xl-3">
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
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0">Total</p>
                            <p class="text-muted mb-0">{{$diplome}} %</p>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-12 col-sm-6 col-md-6 col-xl-3">
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
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0">Total</p>
                            <p class="text-muted mb-0">{{$membre}} %</p>
                        </div>
                    </div>
                </div>
            </div> --}}
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
