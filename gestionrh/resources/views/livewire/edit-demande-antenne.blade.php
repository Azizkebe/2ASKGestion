<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-primary">
            <div class="card-title text-white">Modification la demande de Permission</div>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('demandeantenne.liste')}}" class="btn btn-success btn-md"> Liste des demandes en attente</a>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="POST" wire:submit.prevent="update">
                @csrf
                @method('PUT')
                <div class="mt-3">
                    <label for="prename">Prenom</label>
                    <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prenom" wire:model.live="prenom" readonly>
                </div>
                <div>
                    @error('nom')
                    <span class="error">le nom est requis</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="prename">Nom</label>
                    <input type="text" class="form-control" name="nom" id="nom" placeholder="nom" wire:model.live="nom" readonly>
                </div>
                <div>
                    @error('prenom')
                    <span class="error">le prenom est obligatoire</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="prename">Date de depart</label>
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
                </div>
                <div>
                    @error('date_depart')
                    <span class="error">la date de depart est obligatoire</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="prename">Date de retour</label>
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
                </div>
                <div>
                    @error('date_retour')
                    <span class="error">la date de retour est obligatoire</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for=""> Nombre de jours souhaité:
                        <input type="number" class="btn btn-sm btn-success" name="nombre_jours_pris" id="nombre_jours_pris" wire:model.live="nombre_jours_pris" readonly>
                    </label>
                </div>
                <div>
                    @error('nombre_jours_pris')
                    <span class="error">le nombre de jour est requis</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <textarea class="form-control" name="motif_permission" id="motif_permission" cols="10" rows="5" wire:model.live="motif_permission" readonly></textarea>
                </div>
                <div>
                    @error('motif_permission')
                    <span class="error">Vous devez donner le motif de la demande</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="statut_demande"> Statut de la demande</label>
                    <select name="statut_demande" id="" class="form-select" wire:model.live="statut_demande">
                        <option value="">--- Changer le statut de la demande ---</option>
                        @foreach ($statutdemande as $statut)
                        <option value="{{$statut->id}}">{{$statut->statut_demande}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    @error('statut_demande')
                    <span class="error">Vous devez choisir un statut</span>
                    @enderror
                </div>
                @if ($rep == '1')
                <div class="mt-3">
                    <label for="id_responsable">Transmis pour validation finale: </label>
                    <select name="id_responsable" id="id_responsable" class="form-select" wire:model.live="id_responsable" required>
                        <option value="">-- choississez un reponsable pour la validation finale</option>
                        @foreach ($users_resp as $responsable)
                            <option value="{{$responsable->id}}">{{$responsable->username}} {{$responsable->name}}</option>
                        @endforeach
                    </select>
                </div>
                @endif
                @if ($rep == 0)
                <div class="mt-3"></div>
                @endif
                <div style="display: flex; justify-content:center;" class="mt-3">
                    <button type="submit" class="btn btn-primary btn-block text-center"> Valider la reponse </button>
                </div>
            </form>
        </div>
    </div>
</div>

