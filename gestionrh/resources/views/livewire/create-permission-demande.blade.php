<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-primary">
            <div class="card-title text-white">Demande de Permission</div>
            <div style="display: flex; justify-content:end;">
                <a href="" class="btn btn-success btn-md"> Liste des demandes en attente</a>
            </div>
        </div>
        <div class="card-body">
            <form action="">
                @csrf
                @method('POST')
                <div class="mt-3">
                    <label for="prename">Prenom</label>
                    <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prenom" wire:model.live="prenom" readonly>
                </div>
                <div class="mt-3">
                    <label for="prename">Nom</label>
                    <input type="text" class="form-control" name="nom" id="nom" placeholder="nom" wire:model.live="nom" readonly>
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
                <div class="mt-3">
                    <label for=""> Nombre de jours souhaité:
                        <input type="number" class="btn btn-sm btn-success" name="nombre_jours_pris" id="nombre_jours_pris" wire:model.live="nombre_jours_pris" readonly>
                    </label>
                </div>
                <div class="mt-3">
                    <textarea class="form-control" name="motif_permission" id="motif_permission" cols="10" rows="5" wire:model.live="motif_permission"></textarea>
                </div>

                <div class="mt-3">
                    <label for="chef_antenne"> Chef Antenne</label>
                    <select name="id_chef_antenne" id="" class="form-select" wire:model.live="id_chef_antenne">
                        <option value="">OPTION 1</option>
                        <option value="">OPTION 2</option>
                    </select>
                </div>
                <div style="display: flex; justify-content:center;" class="mt-3">
                    <button type="submit" class="btn btn-primary btn-block text-center"> Envoyer la demande </button>
                </div>
            </form>
        </div>
    </div>
</div>
