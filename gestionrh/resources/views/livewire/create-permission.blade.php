<div>
    <div style="margin: auto;" class="card">
        <div class="card-header bg-primary">
            <div class="card-title text-white">Permission</div>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('permission.liste')}}" class="btn btn-success btn-md"> Liste des Permissions</a>
            </div>
        </div>
        <div class="card-body">
            <div class="mb-1">
                @if ($error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endif
            </div>
            <form action="" method="POST" wire:submit.prevent="store">
                @csrf
                @method('POST')

                <div class="mt-3">
                    <label for="nombre_de_jour">Nombre de Jour de Permission Annuel Réservé</label>
                    <input type="number" class="form-control" name="nombre_de_jour" id="nombre_de_jour" wire:model.live="nombre_de_jour" readonly>
                    @error('nombre_de_jour')
                        <span class="error"> Le nombre de jour est requis</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="id_employe">Nom de l'employe</label>
                    <select name="id_employe" id="id_employe" class="form-select" wire:model.live="id_employe">
                        <option value="">--Choisissez un employé --</option>
                        @foreach ($employe as $employe)
                            <option value="{{$employe->id}}">{{$employe->prenom}} {{$employe->nom}}</</option>
                        @endforeach
                    </select>
                    @error('id_employe')
                        <span class="error">Veuillez choisir l'employe matrimoniale</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="">Date de depart</label>
                    <input type="text" class="form-control" id="date_d" name="date_depart" wire:model.live="date_depart" autocomplete="off"
                    data-provide="datepicker" data-date-autoclose="true"
                    data-date-format="d/m/yyyy" data-date-today-highlight="true"
                    onchange="this.dispatchEvent(new InputEvent('input'))">
                    <script>
                        $(document).ready(function(){
                           $('#date_d').datepicker({
                               beforeShowDay: diseablesunday,
                               dateFormat: 'dd-mm-yy',
                               changeYear: true,
                                minDate:0,
                                maxDate: '+ 1 month',
                                // maxDate: 'today',
                           });
                           function diseablesunday(sunday)
                            {
                                var calendary = sunday.getDay();
                                return [(calendary > 0)];
                            };
                        });
                   </script>
                    @error('date-depart')
                    <span class="error">la date de depart est obligatoire</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="date_retour">Date de Retour</label>
                    <input type="text" class="form-control" id="date_r" name="date_retour" wire:model.live="date_retour" autocomplete="off"
                    data-provide="datepicker" data-date-autoclose="true"
                    data-date-format="d/m/yyyy" data-date-today-highlight="true"
                    onchange="this.dispatchEvent(new InputEvent('input'))">

                    <script>
                         $(document).ready(function(){
                            $('#date_r').datepicker({
                                beforeShowDay: diseablesunday,
                                dateFormat: 'dd-mm-yy',
                                changeYear: true,
                                minDate:0,
                                maxDate: '+ 1 month',
                            });
                            function diseablesunday(sunday)
                            {
                                var calendary = sunday.getDay();
                                return [(calendary > 0)];
                            };
                         });
                    </script>
                    @error('date_retour')
                        <div class="error">Veuillez preciser la date de retour</div>
                    @enderror

                </div>

                <div class="mt-1 mb-1">
                    <p>Nombre de jour de permission souhaité:
                        <input type="number" class="btn btn-sm btn-success" name="jours_pris" id="jours_pris" wire:model.live="jours_pris" readonly>
                    </p>
                    @error('jours_pris')
                        <div class="error">Le champs est requis</div>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="st_permission">La permission est-elle deductible</label>
                    <select name="st_permission"  id="st_permission" class="form-select" wire:model.live="st_permission">
                        <option value="">---choississez le statut ---</option>
                        @foreach ($permissions as $permission)

                        <option value="{{$permission->id}}">{{$permission->statut_permission}}</option>

                        @endforeach
                    </select>
                       @error('st_permission')
                       <div class="error">Precisez bien la deduction</div>
                        @enderror
                   </div>
                   <div class="mt-3">
                    <textarea name="commentaire" class="form-control" id="commentaire" placeholder="Motif de la demande" cols="30" rows="5" wire:model.live="commentaire"></textarea>
                   </div>
                   @error('commentaire')
                   <span class="error">Pourquoi voulez-vous la permission</span>
                   @enderror
                </div>
                <div style="padding-left: 20px;" class="mt-3">
                    <label for="imagepermission">Joindre la demande de permission</label>
                    <input type="file" accept="image/jpg, image/png, image/jpeg" name="imagepermission" id="imagepermission" wire:model.live="imagepermission">
                    <div>
                        @if ($imagepermission)
                        <img style="width: 70px; height:70px;" src="{{$imagepermission->temporaryUrl()}}" alt="">
                        @endif
                   </div>
                </div>

                <div style="display: flex; justify-content:center" class="mb-3 mt-3">
                    <button type="submit" class="btn btn-primary"> Autoriser la permission</button>
                </div>

            </form>
    </div>
</div>
