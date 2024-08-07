<?php

namespace App\Http\Controllers\Conge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conge;
class CongeController extends Controller
{
    public function create()
    {
        $typeconge = Conge::all();
        return view('conge.create',[
        'typeconge'=>$typeconge,
        ]);
    }
}
