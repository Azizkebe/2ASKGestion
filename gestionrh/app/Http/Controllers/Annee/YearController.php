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
        $year = YearTable::all();
        return view('year.liste', compact('year'));
    }

}
