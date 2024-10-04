<div class="container-fluid">
    @php
    $permissionConfigurationliste = App\Models\PermissionRoleModel::getPermission('Configuration_Liste', Auth::user()->role_id);
    @endphp
    @if (!empty($permissionConfigurationliste))
    <div class="card">

        <div class="card-header">
          <h4 class="card-title">Liste des annees</h4>
            <div style="display:flex; justify-content:end;">
                @if (!empty($permission_config_add))
                <a href="{{route('setting.create')}}" class="btn btn-success btn-sm">Ajouter une Session</a>&nbsp;
                @endif
                @if ($is_visible)
                <button class="btn btn-primary" wire:click="ConfigureButton()">Add conges restants</button>
                @endif
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
                    @if (!empty($permission_config_status))
                    <th>Statut</th>
                    @endif
                    @if (!empty($permission_config_edit)||(!empty($permission_config_del)))
                    <th>Action</th>
                    @endif
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($year as $year)
                    <tr>
                        <td> </td>
                        <td>{{$year->session_ouvert}}</td>
                        <td>{{$year->annee_en_cours}}</td>
                        @if (!empty($permission_config_status))
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
                        @endif
                        <td>
                            <div class="form-button-action">
                                @if (!empty($permission_config_edit))
                                <button
                                type="button"
                                data-bs-toggle="tooltip"
                                title=""
                                class="btn btn-link btn-primary btn-lg"
                                data-original-title="Edit Task"
                                ><a href=""><i class="fa fa-edit"></i></a>
                                </button>
                                @endif
                                @if (!empty($permission_config_del))
                                <button
                                type="button"
                                data-bs-toggle="tooltip"
                                title=""
                                class="btn btn-link btn-danger"
                                data-original-title="Remove"
                                ><a onclick="return confirm('Etes vous sure de vouloir supprimer le poste')"
                                href="" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
                                </button>
                                @endif

                            </div>
                        </td>
                        {{-- <td>
                            <button class="btn btn-sm btn-warning fload-right" wire:click="ConfigureButton()">Migrer les conges restants</button>
                        </td> --}}

                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
<div>
