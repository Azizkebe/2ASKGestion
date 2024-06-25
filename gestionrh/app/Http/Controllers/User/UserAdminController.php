<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\HandRequest;
use App\Models\User;
use App\Models\ResetCodePassword;
use App\Notifications\SendEmailToAdminAfterRegistration;
use App\Http\Requests\SubmitAccessRequest;
use Carbon\Carbon;


class UserAdminController extends Controller
{
    public function register()
    {
        return view('admin.auth.register');
    }
    public function handleregister(HandRequest $request)
    {
        try {
            $user = new User();

            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make('default');
            $user->phone = $request->phone;
            // dd($user);
            $user->save();

            if($user)
            {
                try {
                   ResetCodePassword::where('email', $user->email)->delete();


                   $data = [

                       'email'=> $user->email,
                   ];

                   ResetCodePassword::create($data);

                   Notification::route('mail', $user->email)->notify(new
                   SendEmailToAdminAfterRegistration($user->email));

                   //Redirigez l'utilisateur vers une l'url
                   return redirect()->back()->with('success', 'L\'utilisateur est enregistré avec succes');

                }
                   catch (Exception $e) {

                       throw new Exception('Une Erreur est survenue lors de l\'envoi du email');
                   }
               }

        } catch (Exception $e) {
            throw new Exception("Ereur survenue lors de l'enregistement de l'utilisateur", 1);

        }
    }
    public function accessdefine($email)
    {
        $checkUserExist = User::where('email',$email)->first();
        if($checkUserExist)
        {
            return view('admin.auth.validate-account',[
                'email'=>$email,
            ]);
        }
        else
        {
            //Redirection sur une route 404
        }
    }
    public function submitaccessdefine(SubmitAccessRequest $request)
    {
         try {
            $user = User::where('email', $request->email)->first();
            if($user)
            {
                $user->password = Hash::make($request->password);
                $user->email_verified_at = Carbon::now();

               // dd($user);
                $user->update();

              return  redirect()->route('login')->with('success','Les access ont été correctement defini');
            }
            else{
                //redirect sur la route 404
            }

         } catch (Exception $e)
         {
            dd($e);
         }
    }
    public function list_register()
    {
        $user = User::all();

        return view('admin.auth.list', compact('user'));
    }
}
