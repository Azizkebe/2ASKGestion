<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HandRequest;
use App\Models\User;

class UserAdminController extends Controller
{
    public function register()
    {
        return view('admin.auth.register');
    }
    public function handleregister(HandRequest $request)
    {
        try {
            dd($request);
        } catch (Exception $e) {
            throw new Exception("Ereur survenue lors de l'enregistement de l'utilisateur", 1);

        }
    }
}
