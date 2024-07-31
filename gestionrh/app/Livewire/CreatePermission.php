<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employe;
use App\Models\StatutPermission;
class CreatePermission extends Component
{
    public function render()
    {
        $employe = Employe::all();
        $permissions = StatutPermission::all();
        return view('livewire.create-permission', [
            'employe'=>$employe,
            'permissions'=>$permissions,
        ]);
    }
}
