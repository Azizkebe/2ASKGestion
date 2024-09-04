<?php

namespace App\Http\Controllers\Annee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\YearTable;


class YearController extends Controller
{
    public function create()
    {
        return view('year.create');
    }
    public function liste()
    {
        return view('year.liste');
    }

}
