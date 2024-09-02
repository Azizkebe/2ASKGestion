<div>
    <div style="margin: auto;" class="card">
        <div class="card-header bg-primary">
            <div class="card-title text-white">Editer un Congé</div>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('permissionconge.liste')}}" class="btn btn-success btn-md"> Liste des congés autorisés</a>
            </div>
        </div>
        <div class="card-body">
            <div class="mb-1">

            </div>
            <form action="" method="POST" wire:submit.prevent="store">
                @csrf
                @method('POST')

                <div class="mt-3">
                    <label for="id_employe">Nom de l'employe</label>
                    <select name="id_employe" id="id_employe" class="form-select" wire:model.live="id_employe">
                        <option value="">--Choisissez un employé --</option>
                        @foreach ($employe as $employe)
                            <option value="{{$employe->id}}">{{$employe->prenom}} {{$employe->nom}}</</option>
                        @endforeach
                    </select>
                    @error('id_employe')
                        <span class="error">Veuillez choisir l'employe </span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="id_conge">Type de Conge</label>
                    <select name="id_conge" id="id_conge" class="form-select" wire:model.live="id_conge">
                        <option value="">--Choisissez un employé --</option>
                        @foreach ($conge as $conge)
                            <option value="{{$conge->id}}">{{$conge->type_de_conge}}</option>
                        @endforeach
                    </select>
                    @error('id_employe')
                        <span class="error">Veuillez choisir le type de congé</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="nombre_de_jour">Nombre de Jour Total pour ce congé réservé</label>
                    <input type="number" class="form-control" name="nombre_de_jour" id="nombre_de_jour" wire:model.live="nombre_de_jour" readonly>
                </div>
                <div class="mt-1 mb-1">
                    <p>Nombre de jour de congé restant:
                        <input type="number" class="btn btn-sm btn-warning" name="nombre_restant_jour" id="nombre_restant_jour" wire:model.live="nombre_restant_jour" readonly> jour(s)
                    </p>
                    @error('nombre_restant_jour')
                        <div class="error">Le champs est requis</div>
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
                    @error('date_depart')
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
                    <p>Nombre de jour de congé souhaité:
                        <input type="number" class="btn btn-sm btn-success" name="jours_pris" id="jours_pris" wire:model.live="jours_pris" readonly>
                    </p>
                    @error('jours_pris')
                        <div class="error">Le champs est requis</div>
                    @enderror
                </div>
                <div style="padding-left: 20px;" class="mt-3">
                    <label for="imageconge">Piece Justificative</label>
                    <input type="file" accept="image/jpg, image/png, image/jpeg" name="imageconge" id="imageconge" wire:model.live="imageconge">
                    <div class="mt-2">
                        @if ($imageconge)
                        <span style="font-weight:bolder;">Image Anterieur: <img style="width:50px;" src="{{asset('storage/'.$imageconge)}}" alt=""></span>

                        @else
                        <span style="font-weight:bolder;">Nouvelle Image: <img style="width: 70px; height:70px;" src="{{$imageconge->temporary()}}" alt="image"></span>

                        @endif
                    </div>
                    {{-- <div>
                        @if ($imageconge)
                        <img style="width: 70px; height:70px;" src="{{$imageconge->temporaryUrl()}}" alt="">
                        @endif
                   </div> --}}
                </div>

                <div style="display: flex; justify-content:center" class="mb-3 mt-3">
                    <button type="submit" class="btn btn-primary"> Enregistrer les modifications du congé</button>
                </div>

            </form>
    </div>
</div>
