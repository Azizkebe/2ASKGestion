<?php

namespace App\Http\Controllers\Fourniture;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projet;

class FournitureController extends Controller
{
    public function add()
    {
        $projet = Projet::all();
        return view('fourniture.add', compact('projet'));
    }
}
