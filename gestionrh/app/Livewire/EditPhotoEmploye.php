<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employe;
class EditPhotoEmploye extends Component
{
    public function AddNew()
    {
        $this->dispatch('show-form');
    }
    public function render()
    {
        // $employe = Employe::all();

        return view('livewire.edit-photo-employe');
    }
    public function editer_photo(int $employe_id )
    {
        $employe = Employe::findOrFail($employe_id);

        if($employe)
        {
            // return view('livewire.edit-photo-employe');
        }
    }
}
