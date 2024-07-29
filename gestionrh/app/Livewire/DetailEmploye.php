<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employe;
class DetailEmploye extends Component
{
    public $employe, $employe_id, $filename;

    public function editPhoto(int $employe_id)
    {
        $employe = Employe::findOrFail($employe_id);


        if($employe)
        {
            $this->filename = $employe->id_cloud_file_photo;
            // $this->dispatch('close-modal');
        }
        else{
             return redirect()->back();
        }
    }
    public function render()
    {
         $employes = Employe::with(['genre','matrimonial','domaine','niveauetude',
        'diplome','contrat','direction','service','antenne','bureau','poste',
        'photo','photocontrat','photodiplome','photoextrait','photocv'])->findOrFail($this->employe);
        // dd($employe);
        return view('livewire.detail-employe',compact('employes'));
    }
}
