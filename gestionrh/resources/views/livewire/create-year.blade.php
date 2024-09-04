<div class="container-fluid">
    <div class="row  justify-content-center align-items-center d-flex-row text-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Configuration des saisons ouvertes</h4>
            <div>
                <a href="{{route('setting.liste')}}" class="btn btn-success float-end">Liste des annees</a>
            </div>
            <form action="" method="POST" wire:submit.prevent="store">
                @csrf
                @method('POST')
               <div class="form-group input-group">
                <input name="session_ouvert" class="form-control" placeholder="Annee de la session" type="text" value="{{old('session_ouvert')}}" wire:model.live="session_ouvert">
                <div class="input-group">
                    @error('session_ouvert')
                     <span class="error">L'annee de la session est requise</span>
                    @enderror
                </div>
                </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Ajouter la session  </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
