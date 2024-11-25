@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">Liste des demandes d'ordre de mission</h4>
                    <button class="btn btn-primary btn-round ms-auto">
                        <a href="{{route('ordre_mission.add')}}" class="text-white"><i class="fa fa-plus"></i> Nouvelle demande</a>
                    </button>
                    </div>
                </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    id="add-row"
                    class="display table table-striped table-hover"
                  >
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Motif</th>
                        <th>Destination</th>
                        <th class="w-100">  Date de depart  </th>
                        <th>Heure de depart</th>
                        <th>Date de retour</th>
                        <th>Heure de retour</th>
                        <th>Nombre de vehicule</th>
                        <th>Nombre de personne</th>
                        <th>Utilisation</th>
                        <th>Statut</th>
                        <th style="width: 10%">Action</th>
                      </tr>
                        </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="form-button-action">
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit Task"
                                        >
                                        </button>
                                        <div style="display: none;">
                                        </div>
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-danger"
                                        data-original-title="Remove"
                                        >
                                        </button>
                                    </div>
                                </td>
                                </tr>
                                 <td colspan="9">Aucune donnée trouvé</td>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
