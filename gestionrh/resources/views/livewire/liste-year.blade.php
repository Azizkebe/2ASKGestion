<div class="container-fluid">
    <div class="card">
        <div class="card-header">
          <h4 class="card-title">Liste des annees</h4>
            <div style="display:flex; justify-content:end;">
                <a href="{{route('setting.create')}}" class="btn btn-success btn-sm">Ajouter une Session</a>&nbsp;
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table
                id="basic-datatables"
                class="display table table-striped table-hover"
                >
                <thead>
                    <tr>
                    <th> </th>
                    <th>Session</th>
                    <th>Annee en Cours</th>
                    <th>Statut</th>
                    <th>Action</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($year as $year)
                    <tr>
                        <td> </td>
                        <td>{{$year->session_ouvert}}</td>
                        <td>{{$year->annee_en_cours}}</td>
                        <td>
                            @if ($year->active == '1')
                                <a href=""class="btn btn-success">Actif</a>
                            @else
                                <a href="" class="btn btn-danger">Inactif</a>
                            @endif
                        </td>
                        <td>
                            <button class="btn {{$year->active == '1' ? 'btn-danger' : 'btn-success'}}" wire:click="toggleStatus({{$year->id}})">
                                {{
                                $year->active == '1' ?
                                'Rendre Inactif' :
                                'Rendre Actif '
                                }}
                        </button>
                        </td>
                        <td>
                            <div class="form-button-action">
                                <button
                                type="button"
                                data-bs-toggle="tooltip"
                                title=""
                                class="btn btn-link btn-primary btn-lg"
                                data-original-title="Edit Task"
                                ><a href=""><i class="fa fa-edit"></i></a>

                                </button>
                                <button
                                type="button"
                                data-bs-toggle="tooltip"
                                title=""
                                class="btn btn-link btn-danger"
                                data-original-title="Remove"
                                ><a onclick="return confirm('Etes vous sure de vouloir supprimer le poste')"
                                href="" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
                                </button>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-warning fload-right" wire:click="ConfigureButton()">Migrer les conges restants</button>

                        </td>

                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
<div>
