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
     </div>
</div>
