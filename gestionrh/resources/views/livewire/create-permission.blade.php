<div>
    <div style="margin: auto;" class="card">
        <div class="card-header bg-primary">
            <div class="card-title text-white">Permission</div>
            <div style="display: flex; justify-content:end;">
                <a href="" class="btn btn-success btn-md"> Liste des Permissions</a>
            </div>
        </div>
        <div class="card-body">
            <form action="">
                <div class="mt-3">
                    <label for="id_employe">Nom de l'employe</label>
                    <select name="id_employe" id="id_employe" class="form-select" wire:model.live="id_employe">
                        <option value="">--Choisissez un employé --</option>
                        @foreach ($employe as $employe)
                            <option value="{{$employe->id}}">{{$employe->prenom}} {{$employe->nom}}</</option>
                        @endforeach
                    </select>
                    @error('id_employe')
                        <span class="error">Veuillez saisir la situation matrimoniale</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="nombre_de_jour">Nombre de Jour</label>
                    <input type="number" class="form-control" name="nombre_de_jour" id="nombre_de_jour" wire:model.live="nombre_de_jour" readonly>
                    @error('nombre_de_jour')
                        <span class="error"> Le nombre de jour est requise</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="date_depart">Date de Depart</label>
                    <input type="text" class="form-control" id="date_d" name="date_depart" wire:model.live="date_depart" autocomplete="off">

                    <script>
                        jQuery.datetimepicker.setLocale('fr');
                        jQuery('#date_d').datetimepicker({
                        i18n:{
                        fr:{
                        months:[
                            'Janvier','Fevrier','Mars','Avril',
                            'Mai','Juin','Jullet','Aout',
                            'Septembre','Octobre','Novembre','Decembre',
                        ],
                        dayOfWeek:[
                             "Lun", "Mar", "Mer",
                            "Jeu", "Ven", "Sam.",
                        ]
                        }
                        },
                        timepicker:true,
                        format:'d\m\Y'
                        });
                    </script>
                    @error('date_depart')
                        <div class="error">Veuillez preciser la date de depart</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="date_retour">Date de Retour</label>
                    <input type="text" class="form-control" id="date_r" name="date_retour" wire:model.live="date_retour" autocomplete="off"
                    data-provide="datepicker" data-date-autoclose="true"
                    data-date-format="d/m/yyyy" data-date-today-highlight="true"
                    onchange="this.dispatchEvent(new InputEvent('input'))">

                    <script>
                         $(document).ready(function(){
                            $('#date_r').datepicker({
                                beforeShowDay: function(date)
                                {
                                    var day = date.getDay();
                                    return [(day != 0), ''];
                                },
                                dateFormat: 'dd-mm-yy',
                                changeYear: true,
                                maxDate: null,
                            });

                         });
                    </script>
                    @error('date_retour')
                        <div class="error">Veuillez preciser la date de retour</div>
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

                </div>
                <div style="display: flex; justify-content:center" class="mb-3 mt-3">
                    <button type="submit" class="btn btn-primary"> Autoriser la permission</button>
                </div>

            </form>
    </div>
</div>
