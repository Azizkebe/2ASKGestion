<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        try {

            return view('layouts.hello');

        } catch (Exception $e) {
            throw new Exception("Erreur survenue lors de la publication", 1);

        }
    }
}
