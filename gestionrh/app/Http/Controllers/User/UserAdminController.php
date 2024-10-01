<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\HandRequest;
use App\Http\Requests\HandloginRequest;
use App\Http\Requests\HandProfilRequest;
use App\Models\User;
use App\Models\Employe;
use App\Models\FicheContrat;
use App\Models\Membre;
use App\Models\MyDiplome;
use App\Models\RoleModel;
use App\Models\Curriculum;
use App\Models\Permission;
use App\Models\PermissionConge;
use App\Models\ResetCodePassword;
use App\Notifications\SendEmailToAdminAfterRegistration;
use App\Http\Requests\SubmitAccessRequest;
use Carbon\Carbon;


class UserAdminController extends Controller
{
    public function dashboard()
    {

        return view('admin.dashboard');
    }
    public function register()
    {
        $role = RoleModel::all();
        $employe = Employe::all();

        return view('admin.auth.register',[
            'role'=>$role,
            'employe'=>$employe,

        ]);
    }
    public function handleregister(HandRequest $request)
    {
        try {
            $user = new User();
            $donnees_employe = Employe::where('id', $request->id_employe)->first();

            $user->id_employe = $request->id_employe;
            $user->email = $donnees_employe->email;
            $user->password = Hash::make('default');
            $user->role_id = $request->role_id;
            // $user->id_employe = $request->id_employe;
            // $user->name = $request->name;
            // $user->username = $request->username;
            // $user->email = $request->email;
            // $user->password = Hash::make('default');
            // $user->phone = $request->phone;
            // $user->role_id = $request->role_id;

            // dd($user);
            $user->save();

            if($user)
            {
                try {

                    // ResetCodePassword::where('email', $user->email)->delete();
                    ResetCodePassword::where('email', $user->email)->delete();


                   $data = [

                    'email'=> $user->email,
                    // 'email'=> $user->email,
                   ];

                   ResetCodePassword::create($data);

                   Notification::route('mail', $user->email)->notify(new
                   SendEmailToAdminAfterRegistration($user->email));

                //    Notification::route('mail', $user->email)->notify(new
                //    SendEmailToAdminAfterRegistration($user->email));

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
        $user = User::with('employe')->get();

        return view('admin.auth.list', compact('user'));
    }
    public function edit($user)
    {
        $user = User::findOrFail($user);
        $role = RoleModel::all();
        $employe = Employe::all();
        return view('admin.auth.edit',[
            'user'=>$user,
            'role'=>$role,
            'employe'=>$employe,
        ]);
    }
    public function update($user, Request $request)
    {
        try {
            $user = User::findOrFail($user);

            $user->id_employe = $request->id_employe;
            // $user->email = $request->username;
            // $user->email = $request->email;
            // $user->phone = $request->phone;
            $user->role_id = $request->role_id;

            // dd($user);
            $user->update();

            return redirect()->route('listregister')->with('success','Les infos de l\'utilisateurs sont mises à jour');

        } catch (Exception $e) {
            throw new Exception("Erreur survie lors de la mise à jour", 1);

        }

    }
    public function delete($user)
    {
           $user = User::findOrFail($user);
        try {

            $userconnecter = Auth::User()->id;
            if($userconnecter != $user->id)
            {
                $user->delete();
                return redirect()->back()->with('success','Le compte de l\'utilisateur est supprimé avec succes');
            }
            else{

                return redirect()->back()->with('error', 'Vous ne pouvez supprimer votre propre compte');
            }
        } catch (Exception $e) {
            throw new Exception("Erreur survenue lors de la suppression", 1);

        }

    }
    public function login()
    {
        if(!empty(Auth::check()))
        {

            return view('admin.dashboard');
        }
            return view('frontend.auth.login');
    }
    public function handlogin(HandloginRequest $request)
    {

        if(auth()->attempt($request->only('email','password')))
        {
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('login')->with('error','Les parametres saisis sont incorrectes');
        }
    }
    public function deconnexion()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }

    public function user_profil($user)
    {
        $user = User::findOrFail($user);

        return view('admin.auth.profil', compact('user'));
    }

    public function profil_user($user, Request $request)
    {
        $user = User::findOrFail($user);

        try {

            $userconnecter = Auth::user()->id;

            if($userconnecter == $user->id)
            {
                $user->name = $request->name;
                $user->username = $request->username;
                $user->email = $request->email;
                $user->phone = $request->phone;

                $user->update();

                return redirect()->back()->with('success','Les donnees ont été modifiées');

            }
            else
            {
                return redirect()->back()->with('error','Impossible de modifier le profil');
            }

        } catch (Exception $e) {
            throw new Exception("Erreur survenue lors de l'edition du profil", 1);

        }
    }
    public function tableaudebord()
    {
        // dd(Auth::user()->id_employe);
        $employe = Employe::where('id', Auth::user()->id_employe)->count();
        // $fichecontrat = FicheContrat::all()->count();
        // $membre = Membre::all()->count();
        // $diplome = MyDiplome::all()->count();
        // $curriculum = Curriculum::all()->count();
        $permission = Permission::where('id_employe', Auth::user()->id_employe)->count();
        $conge = PermissionConge::where('id_employe', Auth::user()->id_employe)->count();

        return view('bienvenue', [
            'permission'=>$permission,
            'conge'=>$conge,
            // 'employe'=>$employe,
            // 'contrat'=>$fichecontrat,
            // 'membre'=>$membre,
            // 'diplome'=>$diplome,
            // 'curriculum'=>$curriculum,
        ]);
    }
}
