<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-primary">
            <div class="card-title text-white">Editer une demande de permission</div>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('demandeconge.liste')}}" class="btn btn-success btn-md"> Liste des demandes en attente</a>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="POST" wire:submit.prevent="Store">
                @csrf
                @method('POST')

                <div class="mt-3">
                    <label for="nombre_de_jour">Session active</label>
                    <input type="text" class="form-control" name="session_active" id="session_active" wire:model.live="session_active" readonly>
                    @error('session_active')
                        <span class="error"> La session est obligatoire</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="prenom">Prenom</label>
                    <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prenom" wire:model.live="prenom" readonly>
                </div>
                <div>
                    @error('prenom')
                    <span class="error">le prenom est requis</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" name="nom" id="nom" placeholder="nom" wire:model.live="nom" readonly>
                </div>
                <div>
                    @error('nom')
                    <span class="error">le nom est obligatoire</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="id_type_conge">Type de conge</label>
                    <select name="id_type_conge" id="id_type_conge" class="form-control" wire:model.live="id_type_conge">
                        <option value="">-- Veuillez choisir le type de conge --</option>
                        @foreach ($typeconge as $item)
                            <option value="{{$item->id}}">{{$item->type_de_conge}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    @error('id_type_conge')
                    <span class="error">le type de congé est obligatoire</span>
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
                    <label for="date_retour">Date de retour</label>
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
                    <label for="">Motif de la demande</label>
                    <textarea class="form-control" name="motif_demande_conge" id="motif_conge" cols="10" rows="5" wire:model.live="motif_demande_conge"></textarea>
                </div>
                <div>
                    @error('motif_demande_conge')
                    <span class="error">Vous devez donner le motif de la demande</span>
                    @enderror
                </div>
                @if ((Auth::user()->name != 'Chef Antenne')||(Auth::user()->name != 'Directeur'))
                <div class="mt-3">
                    <label for="chef_antenne"> Chef Antenne</label>
                    <select name="id_chef_antenne" id="" class="form-select" wire:model.live="id_chef_antenne">
                        <option value="">--- choississez un chef d'antenne ---</option>
                        @foreach ($users_antenne as $antenne)
                        <option value="{{$antenne->id}}">{{$antenne->employe->prenom}} {{$antenne->employe->nom}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    @error('id_chef_antenne')
                    <span class="error">Vous devez choisir un chef antenne</span>
                    @enderror
                </div>
                @endif
                <div style="display: flex; justify-content:center;" class="mt-3">
                    <button type="submit" class="btn btn-primary btn-block text-center"> Envoyer la demande </button>
                </div>
            </form>
        </div>
    </div>
</div>
