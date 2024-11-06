@extends('layouts.website')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
              <div>
                <h3 class="fw-bold mb-3">Tableau de bord des demandes de Fournitures</h3>
              </div>
            </div>
        </div>
        <div class="row row-card-no-pd">
            <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                <div style="border:1px solid rgb(226, 226, 45)"; class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6>Nombre total de demande</h6>
                            </div>
                                <h4 class="text-black fw-bold"> {{$totaldemande}} demandé(s)</h4>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                <div style="background-color: rgba(200, 218, 40, 0.931)"; class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div style="color:black;">
                                <h6>Transmise(es) pour validation </h6>
                            </div>
                                <h4 class="text-white fw-bold">{{$totalvalidtransmis}} validée(s)</h4>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                <div style="background-color:rgba(21, 194, 15, 0.779)"; class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6>Demande: validé(es) par le CM</h6>
                            </div>
                                <h4 class="text-white fw-bold">{{$totaldemandeaccept}} validé(s)</h4>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                <div style="background-color: rgba(255, 0, 0, 0.802)" class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6>Demande: rejeté(es) par votre superieur</h6>
                            </div>
                                <h4 class="text-white fw-bold">{{$totalrejet}} rejeté(s)</h4>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="row row-card-no-pd">
            <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                <div style="background-color: rgba(255, 0, 0, 0.802)" class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6>Rejeté(es) par le comptable des matieres</h6>
                            </div>
                                <h4 class="text-white fw-bold"> {{$totaldemanderejetcompt}} rejeté(s)</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
