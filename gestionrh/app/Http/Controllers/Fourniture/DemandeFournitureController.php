<?php

namespace App\Http\Controllers\Fourniture;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DemandeFourniture;

class DemandeFournitureController extends Controller
{
    public function editer(DemandeFourniture $demande)
    {
        dd($demande);
    }
}
