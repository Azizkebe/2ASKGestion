<?php

namespace App\Http\Controllers\Demande;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DemandePermission;

use Auth;

class DemandeAntenneController extends Controller
{
    public function liste()
    {
        // dd(Auth::id());
        // $users = User::where('role_id', Auth::user()->role_id)->first();

        $demandeantenne = DemandePermission::where('id_chef_antenne',Auth::id())->get();
        // dd($demandeantenne);
        return view('demandeantenne.liste', compact('demandeantenne'));
    }
    public function edit($demandeantenne)
    {

        return view('demandeantenne.edit',[
            'demandeantenne'=>$demandeantenne,

        ]);
    }
}
