<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">Liste des Employe</h4>
                    <button class="btn btn-primary btn-round ms-auto">
                        <a href="{{route('employe.create')}}" class="text-white"><i class="fa fa-plus"></i> Ajouter un Employe</a>
                        {{-- <button class="btn btn-sm" wire:click="ConfigureButton()" wire:model.live="test">Config</button> --}}
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
                        <th>Re......</th>
                        <th></th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Domaine</th>
                        <th>Direction</th>
                        <th>Service</th>

                        <th style="width: 5%">Detail</th>
                        <th style="width: 10%">Action</th>
                        <th></th>
                      </tr>
                        </thead>
                            <tbody>
                             @forelse ($employe as $employe)
                            <tr>

                                <td>
                                    <button class="btn btn-warning btn-sm" wire:click="ConfigureButton({{$employe->id}})">Migrer les conges restants</button>
                                </td>
                                <td>
                                    @if ($employe->photo)
                                        <div style="background-image: url('{{asset('storage/'.
                                        $employe->photo->photo_employe)}}');
                                        width:50px;
                                        height:50px;
                                        background-position:center;
                                        background-size:cover;
                                        ">
                                        </div>
                                    @endif
                                 </td>
                                <td>{{$employe->nom}}</td>
                                <td>{{$employe->prenom}}</td>
                                <td>{{$employe->email}}</td>
                                <td>{{$employe->domaine->domaine_etude}}</td>
                                <td>{{$employe->direction->direction}}</td>
                                <td>{{$employe->service->service ?? ''}}</td>
                                <td>
                                    <div class="form-button-action">
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit Task"
                                        >
                                        <a href="{{route('employe.detail',$employe->id)}}"><i class="fa fa-info"></i></a>

                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-button-action">
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit Task"
                                        >
                                        <a href="{{route('employe.editer',$employe->id)}}"><i class="fa fa-edit"></i></a>

                                        </button>
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-danger"
                                        data-original-title="Remove"
                                        ><a onclick="return confirm('Etes vous sure de vouloir supprimer l\'employe')"
                                        href="{{route('employe.delete',$employe->id)}}" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
                                        </button>
                                    </div>
                                </td>
                                <td></td>

                                </tr>
                             @empty
                                 <td colspan="9">Aucune donnée trouvé</td>
                             @endforelse
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Liste des Employe</h4>
                <button class="btn btn-primary btn-round ms-auto">
                    <a href="{{route('employe.create')}}" class="text-white"><i class="fa fa-plus"></i> Ajouter un Employe</a>
                    <button class="btn btn-sm" wire:click="ConfigureButton()" wire:model.live="test">Config</button>

                </button>
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
                        <th></th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Domaine</th>
                        <th>Direction</th>
                        <th>Service</th>

                        <th style="width: 5%">Detail</th>
                        <th style="width: 10%">Action</th>
                      </tr>
                </thead>
                <tbody>
                    @forelse ($employe as $employe)
                   <tr>
                       <td>
                        <button class="btn btn-sm" wire:click="ConfigureButton()" wire:model.live="test">Config</button>
                       </td>
                       <td>
                           @if ($employe->photo)
                               <div style="background-image: url('{{asset('storage/'.
                               $employe->photo->photo_employe)}}');
                               width:50px;
                               height:50px;
                               background-position:center;
                               background-size:cover;
                               ">
                               </div>
                           @endif
                        </td>
                       <td>{{$employe->nom}}</td>
                       <td>{{$employe->prenom}}</td>
                       <td>{{$employe->email}}</td>
                       <td>{{$employe->domaine->domaine_etude}}</td>
                       <td>{{$employe->direction->direction}}</td>
                       <td>{{$employe->service->service ?? ''}}</td>
                       <td>
                           <div class="form-button-action">
                               <button
                               type="button"
                               data-bs-toggle="tooltip"
                               title=""
                               class="btn btn-link btn-primary btn-lg"
                               data-original-title="Edit Task"
                               >
                               <a href="{{route('employe.detail',$employe->id)}}"><i class="fa fa-info"></i></a>

                               </button>
                           </div>
                       </td>
                       <td>
                           <div class="form-button-action">
                               <button
                               type="button"
                               data-bs-toggle="tooltip"
                               title=""
                               class="btn btn-link btn-primary btn-lg"
                               data-original-title="Edit Task"
                               >
                               <a href="{{route('employe.editer',$employe->id)}}"><i class="fa fa-edit"></i></a>

                               </button>
                               <button
                               type="button"
                               data-bs-toggle="tooltip"
                               title=""
                               class="btn btn-link btn-danger"
                               data-original-title="Remove"
                               ><a onclick="return confirm('Etes vous sure de vouloir supprimer l\'employe')"
                               href="{{route('employe.delete',$employe->id)}}" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
                               </button>
                           </div>
                       </td>

                       </tr>
                    @empty
                        <td colspan="9">Aucune donnée trouvé</td>
                    @endforelse
                   </tbody>
                </table>
            </div>
        </div>
    </div>
<div> --}}
