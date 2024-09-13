<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ParamTypeConge;
use App\Models\Employe;
use App\Models\PermissionConge;
use App\Models\CongeHistorique;
use Illuminate\Support\Facades\Notification;
use Livewire\WithFileUploads;
use App\Notifications\SendEmailToEmployeAfterAcceptedCongeNotification;
use App\Models\CloudFileConge;
use App\Models\YearTable;
use Carbon\Carbon;

class CreatePermissionConge extends Component
{
    use WithFileUploads;
    public $id_employe, $id_conge, $nombre_de_jour, $date_depart,
    $date_retour, $jours_pris, $nombre_de_jour_demande,$employe_conge,$session_encours,
    $permission_conge, $nombre_restant_jour, $imageconge;
    public function render()
    {
        $toDate = Carbon::parse($this->date_depart);
        $fromDate = Carbon::parse($this->date_retour);

    if(isset($this->id_conge)){

        $this->employe_conge = Employe::where('id', $this->id_employe)->first();

        $this->donnees_employe = ParamTypeConge::where('id', $this->id_conge)->first();

        $this->session_encours =  $this->donnees_employe->yeartable->session_ouvert;

        $this->nombre_de_jour = $this->donnees_employe->nombre_de_jour_reserve ?? 0;


        if(isset($this->employe_conge->nombre_conge_program)&&($this->employe_conge->nombre_conge_program != NULL))
        {
            $this->nombre_restant_jour = $this->employe_conge->nombre_conge_program;
        }
    }

    if(isset($this->date_depart)&&(isset($this->date_retour)))
    {
        $this->employe_conge = Employe::where('id', $this->id_employe)->first();

        $this->jours_pris =  $toDate->diffInDays($fromDate);


        if(($this->jours_pris > $this->nombre_de_jour)||($this->employe_conge->nombre_conge_program < 0))
        {

            $this->nombre_de_jour = 0;

            toastr()->error('Attention, Le nombre de jour demandé est superieur au nombre de jour resservé');
        }
        if(($this->nombre_de_jour === 0)and($this->nombre_de_jour <= 0)||($this->employe_conge->nombre_conge_program = 0))
        {
            $this->nombre_de_jour = 0;

            toastr()->error('Desolé, Vous n\'avez plus de droit au congé');
        }


    }


        $conge = ParamTypeConge::all();
        $employe = Employe::all();

        return view('livewire.create-permission-conge',[
            'conge'=>$conge,
            'employe'=>$employe,
        ]);
    }
    public function store(PermissionConge $permission)
    {
        $this->employe_conge = Employe::where('id', $this->id_employe)->first();

        $this->donnees_employe = ParamTypeConge::where('id', $this->id_conge)->first();
        $query = YearTable::where('id', $this->donnees_employe->id_yeartable)->first();
        if($query->active == '1')
        {
            $this->nombre_de_jour = $this->donnees_employe->nombre_de_jour_reserve ?? 0;

        }


        $this->validate([

            'id_employe'=>'integer|required',
            'nombre_de_jour'=>'integer|required',
            'date_depart'=>'string|required',
            'date_retour'=>'string|required',
            'id_conge'=>'required',
            'imageconge' =>'required|mimes:pdf|max:8192',

        ]);

        try {
            $permission->id_employe = $this->id_employe;
            $permission->id_param_type_conge =  $this->id_conge;
            $permission->date_depart = $this->date_depart;
            $permission->date_retour = $this->date_retour;

            $toDate = Carbon::parse($this->date_depart);
            $fromDate = Carbon::parse($this->date_retour);

            $this->nombre_de_jour_demande = $toDate->diffInDays($fromDate);

            if($this->nombre_de_jour_demande > $this->nombre_de_jour )
            {
                toastr()->error('Attention, Le nombre de jour demandé est superieur au nombre de jour restant');

            }
            elseif(($this->nombre_de_jour === 0)and($this->nombre_de_jour <= 0))
            {
                $this->nombre_de_jour = 0;
                $this->id_employe = 0;
                toastr()->error('Desolé, Vous avez pris tous vos congés');
            }
            else
            {

                $permission->nombre_jours_pris = $this->nombre_de_jour_demande;

                $reussi = $permission->save();
                $this->handleImageCongeUpload($reussi,$this->imageconge,'CloudImageConge/Conge');

                if($reussi){

                    $data = PermissionConge::where('id_employe', $this->id_employe)->get();

                    if($this->employe_conge->nombre_conge_program == NULL)
                    {
                        $this->employe_conge->update(['nombre_conge_program'=> $this->donnees_employe->nombre_de_jour_reserve - $this->nombre_de_jour_demande]);

                    }
                    else{
                        $nbr_existant = $this->employe_conge->nombre_conge_program;


                        $this->employe_conge->update(['nombre_conge_program'=> $nbr_existant - $this->nombre_de_jour_demande]);

                    }

                    foreach ($data as $data) {

                        $historique = new CongeHistorique();

                        $historique->id_employe = $data->id_employe;
                        $historique->id_param_type_conge =  $data->id_param_type_conge;
                        $historique->date_depart = $data->date_depart;
                        $historique->date_retour = $data->date_retour;
                        $historique->nombre_jours_pris = $data->nombre_jours_pris;

                        $historique->save();

                    }

                    $messages['prenom'] = $permission->employe->prenom;
                    $messages['nom'] = $permission->employe->nom;
                    $messages['todate'] =  $permission->date_depart;
                    $messages['fordate'] = $permission->date_retour;
                    $messages['nbr_jour'] = $this->nombre_de_jour_demande;
                    $messages['permission'] = $permission->conge->nombre_jour_conge ?? '';

                    Notification::route('mail', $permission->employe->email)->notify(new
                    SendEmailToEmployeAfterAcceptedCongeNotification($messages));


                }
                 toastr()->success('Bravo, le congé est autorisé avec succes');

                return redirect()->route('permissionconge.liste');

            }

        } catch (Exception $e) {
            throw new Exception("Erreur est survenue lors de l'enregistrement", 1);

        }
    }
    public function handleImageCongeUpload($data, $imageconge, $destination)
    {

        {
            $fileName = time().".".$this->imageconge->extension();

            $filePath = $this->imageconge->storeAs($destination,$fileName,'public');

            $cloudfile = CloudFileConge::create([
                'photo_conge'=> $filePath,
            ]);

            if(isset($cloudfile->id))
            {
             $conge = PermissionConge::where('id_employe',$this->id_employe)->first();

             if($conge->id_cloud_file_conge == NULL)
             {
               $conge->update(['id_cloud_file_conge'=> $cloudfile->id]);

             }

            }


        }
    }
}
