<?php

namespace App\Http\Controllers\Demande;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DemandePermission;
use Auth;


class AcceptdemandeController extends Controller
{
    public function liste()
    {
        $demande_resp = DemandePermission::where('id_responsable',Auth::id())->get();

        return view('demanderesp.liste', compact('demande_resp'));
    }

    public function edit($demande_resp)
    {

        return view('demanderesp.edit', compact('demande_resp'));
    }
}
