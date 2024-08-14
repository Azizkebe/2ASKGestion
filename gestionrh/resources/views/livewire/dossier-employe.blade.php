<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom.
     --}}
     <div class="container-fluid w-80">

        <div class="card">
            <div class="card-header">
                <h4>Modifier la photo de profil</h4>
                <div style="display:flex; justify-content:end;">
                    <a href="{{route('employe.detail',$employes->id)}}" class="btn btn-primary flex-end">Retour</a><br>

                </div>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="updatephotoprofil" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        @if ($employes->photo)

                        <div style="height: 150px; width:150px; border:1px solid black;" class="mb-2">
                            <img style="height: 150px; width:150px;" class="profile-image img-circle pull-left"
                            src="{{asset('storage/'.$employes->photo->photo_employe)}}"/>
                            <br>
                        </div>
                        <a onclick="return confirm('Etes-vous sur de vouloir supprimer la photo')" href="{{route('employe.delete_photo', $employes->id)}}">Supprimer</a>

                        @endif
                        <div class="mt-2">

                            <input type="file" class="form-control" wire:model.live="imagefile" id="imagefile">
                        </div>
                        <div style="display: flex; justify-content:center;" class="mt-2">
                            <button style=" width:200px;" type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Modifier le diplome</h4>
                <div style="display:flex; justify-content:end;">
                    <a href="{{route('employe.detail',$employes->id)}}" class="btn btn-primary flex-end">Retour</a>
                </div>

            </div>
            <div class="card-body">
                <form wire:submit.prevent="update_diplome" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        @if ($employes->photodiplome)
                        <div style="height: 150px; width:150px; border:1px solid black;">
                            <a href="{{asset('storage/'.$employes->photodiplome->image_diplome)}}">
                                <img style="height: 150px; width:150px;" src="{{asset('icon/diplome.png')}}" alt="">
                            </a>
                        </div>
                        <a onclick="return confirm('Etes-vous sur de vouloir supprimer le diplome')" href="{{route('employe.diplome_employe', $employes->id)}}">Supprimer</a>
                        @endif
                    </div>
                    <div class="mt-2">
                        <input type="file" class="form-control" wire:model.live="filediplome" id="filediplome">
                    </div>
                    <div style="display: flex; justify-content:center;" class="mt-2">
                        <button style=" width:200px;" type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Modifier le Curriculum Vitae</h4>
                <div style="display:flex; justify-content:end;">
                    <a href="{{route('employe.detail',$employes->id)}}" class="btn btn-primary flex-end">Retour</a>
                </div>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="update_cv" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        @if ($employes->photocv)
                        <div style="height: 150px; width:150px; border:1px solid black;">
                            <a style="height: 150px; width:150px;" href="{{asset('storage/'.$employes->photocv->image_cv)}}">
                                <img style="height: 150px; width:150px;" src="{{asset('icon/cv.png')}}" alt="">
                            </a>
                        </div>
                        <a onclick="return confirm('Etes-vous sur de vouloir supprimer le cv')" href="{{route('employe.cv_delete',$employes->id)}}">Supprimer</a>
                        @endif
                    </div>
                    <div class="mt-2">
                        <input type="file" class="form-control" wire:model.live="filecv" id="filecv">
                    </div>
                    <div style="display: flex; justify-content:center;" class="mt-2">
                        <button style=" width:200px;" type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Modifier le Contrat</h4>
                <div style="display:flex; justify-content:end;">
                    <a href="{{route('employe.detail',$employes->id)}}" class="btn btn-primary flex-end">Retour</a>
                </div>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="update_contrat" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group my-3">
                        <div class="row">
                            <div class="col col-md-10">
                                <input type="file" wire:model.live="files_contrat" class="form-control" multiple>

                            </div>
                                {{-- <button class="btn btn-success" wire:click="add({{$i}})">Ajouter</button> --}}
                        </div>
                        <div style="display: flex; justify-content:center;" class="mt-2">
                            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        @if ($employes->photocontrat)
                        <div style="height: 150px; width:150px; border:1px solid black;">
                            <a style="height: 150px; width:150px;" href="{{asset('storage/'.$employes->photocontrat->image_contrat)}}">
                                <img style="height: 150px; width:150px;" src="{{asset('icon/contrat.png')}}" alt="">
                            </a>
                        </div>
                        <a onclick="return confirm('Etes-vous sur de vouloir supprimer le contrat')" href="{{route('employe.contrat_employe', $employes->id)}}">Supprimer</a>
                        @endif
                    </div>
                    <div class="mt-2">
                        <input type="file" class="form-control" wire:model.live="filecontrat" id="filecontrat">
                    </div>
                    <div style="display: flex; justify-content:center;" class="mt-2">
                        <button style=" width:200px;" type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                    </div> --}}
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Modifier les Extraits de naissance Vitae</h4>
                <div style="display:flex; justify-content:end;">
                    <a onclick="return confirm('Etes-vous sur de vouloir supprimer l\'extrait')" href="" class="btn btn-primary flex-end">Retour</a>
                </div>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="update_extrait" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        @if ($employes->photoextrait)
                        <div style="height: 150px; width:150px; border:1px solid black;">
                            <a style="height: 150px; width:150px;" href="{{asset('storage/'.$employes->photoextrait->image_extrait)}}">
                                <img style="height: 150px; width:150px;" src="{{asset('icon/extrait.png')}}" alt="">
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="mt-2">
                        <input type="file" class="form-control" wire:model.live="fileextrait" id="fileextrait">
                    </div>
                    <div style="display: flex; justify-content:center;" class="mt-2">
                        <button style=" width:200px;" type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                    </div>
                </form>
            </div>
        </div>
     </div>
</div>
