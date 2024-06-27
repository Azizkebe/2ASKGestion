<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function create()
    {
        return view('employe.create');
    }
}
