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
                <a href="#" class="btn btn-label-info btn-round me-2">Configuration</a>
                <a href="#" class="btn btn-primary btn-round">Filtrer</a>
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
                                <p class="text-muted">Actuellement, Nous sommes</p>
                            </div>
                                <h4 class="text-info fw-bold">{{$employe}}</h4>
                        </div>
                        <div class="progress progress-sm">
                                <div
                                class="progress-bar bg-info w-75"
                                role="progressbar"
                                aria-valuenow="{{$employe}}"
                                aria-valuemin="0"
                                aria-valuemax="100"
                                ></div>
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
                                <h6><b>Todays Income</b></h6>
                                <p class="text-muted">All Customs Value</p>
                            </div>
                                <h4 class="text-info fw-bold">$170</h4>
                        </div>
                        <div class="progress progress-sm">
                                <div
                                class="progress-bar bg-info w-75"
                                role="progressbar"
                                aria-valuenow="75"
                                aria-valuemin="0"
                                aria-valuemax="100"
                                ></div>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0">Change</p>
                            <p class="text-muted mb-0">75%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
