<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\HandRequest;
use App\Models\User;

class UserAdminController extends Controller
{
    public function register()
    {
        return view('admin.auth.register');
    }
    public function handleregister(Request $request)
    {
        try {
            $user = new User();

            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;

            dd($request);
        } catch (Exception $e) {
            throw new Exception("Ereur survenue lors de l'enregistement de l'utilisateur", 1);

        }
    }
}
