<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserAdminController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\Employe\EmployeController;
use App\Http\Controllers\Employe\GenreController;
use App\Http\Controllers\Employe\MatrimonialController;
use App\Http\Controllers\Employe\DomineController;
use App\Http\Controllers\Employe\NiveauController;
use App\Http\Controllers\Employe\DiplomeController;
use App\Http\Controllers\Employe\TypeContratController;
use App\Http\Controllers\Employe\DirectionController;
use App\Http\Controllers\Employe\ServiceController;
use App\Http\Controllers\Employe\AntenneController;
use App\Http\Controllers\Employe\BureauController;
use App\Http\Controllers\Employe\PosteController;
use App\Http\Controllers\Employe\TypeMembreController;
use App\Http\Controllers\Employe\MembreController;
use App\Http\Controllers\Employe\CurriculumController;
use App\Http\Controllers\Employe\MyDiplomeController;
use App\Http\Controllers\Employe\MonDiplomeController;
use App\Http\Controllers\Permission\PermissionController;
use App\Http\Controllers\Permission\PermissionCongeController;
use App\Http\Controllers\Conge\CongeController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Role\PermissionTableController;
use App\Http\Controllers\Annee\YearController;
use App\Http\Controllers\MigreConge\RestCongeController;
use App\Http\Controllers\Contrat\FicheContratController;
use App\Http\Controllers\Demande\DemandePermissionController;
use App\Http\Controllers\Demande\DemandeAntenneController;
use App\Http\Controllers\Demande\AcceptdemandeController;
use App\Http\Controllers\Demande\DemandePermissionCongeController;
use App\Http\Controllers\Projet\ProjetController;
use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Article\PanierArticleController;
use App\Http\Controllers\Fourniture\FournitureController;
use App\Http\Controllers\Fourniture\DemandeFournitureController;
use App\Http\Controllers\Parking\ParkingController;
use App\Livewire\EditPhotoEmploye;

// Route::get('/dashboard',[UserAdminController::class,'dashboard'])->name('dashboard');
// Route::get('/',[UserAdminController::class, 'login'])->name('login');
Route::get('/',[WebsiteController::class, 'index'])->name('welcome');

Route::get('/validate-account/{email}',[UserAdminController::class,'accessdefine'])->name('validate-account');
Route::post('/validate-account/{email}',[UserAdminController::class, 'submitaccessdefine'])->name('submitaccessdefine');
// Route::get('/login',[UserAdminController::class, 'login'])->name('login');

Route::middleware('guest')->group(function(){
  Route::get('/login',[UserAdminController::class, 'login'])->name('login');
  Route::post('/handlogin',[UserAdminController::class,'handlogin'])->name('handlogin');
});
Route::middleware('userAdmin')->group(function(){
    Route::get('/deconnexion',[UserAdminController::class,'deconnexion'])->name('deconnexion');
    Route::get('/dashboard', [UserAdminController::class,'tableaudebord'])->name('dashboard');
        return view('bienvenue');

    // Route::get('/dashboard', function () {
    //     return view('bienvenue');
    // })->name('dashboard');

});

Route::middleware('userAdmin')->group(function(){

    Route::prefix('user')->group(function(){
        Route::get('/listeregister',[UserAdminController::class,'list_register'])->name('listregister');
        Route::get('/edit/{user}',[UserAdminController::class,'edit'])->name('editer');
        Route::put('/update/{user}',[UserAdminController::class,'update'])->name('update');
        Route::get('/delete/{user}',[UserAdminController::class,'delete'])->name('delete');

        Route::get('/register',[UserAdminController::class,'register'])->name('register');
        Route::post('/handleregister',[UserAdminController::class,'handleregister'])->name('handleregister');

        Route::get('/profil_user/{user}', [UserAdminController::class,'user_profil'])->name('profil_user');
        Route::put('/profil/{user}',[UserAdminController::class, 'profil_user'])->name('user.profil');

    });
    Route::prefix('employe')->group(function(){
        Route::get('/create',[EmployeController::class, 'create'])->name('employe.create');
        Route::get('/liste',[EmployeController::class, 'liste'])->name('employe.liste');
        Route::get('/edit/{employe}',[EmployeController::class, 'editer'])->name('employe.editer');
        Route::get('/edit_photo/{employe_id}',[EmployeController::class, 'editer_photo'])->name('employe.editer_photo');
        Route::get('/edit_dossier/{employe}',[EmployeController::class, 'editer_dossier'])->name('employe.editer_dossier');
        Route::get('/delete_photo/{employe}',[EmployeController::class, 'delete_photo_employe'])->name('employe.delete_photo');
        Route::get('/delete_cv/{employe}',[EmployeController::class, 'delete_cv_employe'])->name('employe.cv_delete');
        Route::get('/delete_diplome/{employe}',[EmployeController::class, 'delete_diplome_employe'])->name('employe.diplome_employe');
        Route::get('/delete_contrat/{employe}',[EmployeController::class, 'delete_contrat_employe'])->name('employe.contrat_employe');
        Route::get('/detail/{employe}',[EmployeController::class,'detail'])->name('employe.detail');
        Route::get('delete/{employe}',[EmployeController::class,'delete'])->name('employe.delete');


    });
    Route::prefix('genre')->group(function(){
        Route::get('/create',[GenreController::class, 'create'])->name('genre.create');
        Route::post('/create',[GenreController::class, 'store'])->name('genre.store');
        Route::get('/liste',[GenreController::class, 'liste'])->name('genre.liste');
        Route::get('/edit/{genre}',[GenreController::class, 'editer'])->name('genre.editer');
        Route::put('/update/{genre}',[GenreController::class, 'update'])->name('genre.update');
        Route::get('/delete/{genre}',[GenreController::class, 'delete'])->name('genre.delete');

        // Route::get('/edit/{genre}',[GenreController::class, 'create'])->name('genre.create');
    });
    Route::prefix('matrimonial')->group(function(){
        Route::get('/create',[MatrimonialController::class, 'create'])->name('matrimonial.create');
        Route::post('/create',[MatrimonialController::class, 'store'])->name('matrimonial.store');
        Route::get('/liste',[MatrimonialController::class, 'liste'])->name('matrimonial.liste');
        Route::get('/edit/{matrimonial}',[MatrimonialController::class, 'editer'])->name('matrimonial.editer');
        Route::put('/update/{matrimonial}',[MatrimonialController::class, 'update'])->name('matrimonial.update');
        Route::get('/delete/{matrimonial}',[MatrimonialController::class, 'delete'])->name('matrimonial.delete');
    });
    Route::prefix('domaine')->group(function(){
        Route::get('create',[DomineController::class, 'create'])->name('domaine.create');
        Route::post('/create',[DomineController::class, 'store'])->name('domaine.store');
        Route::get('/liste',[DomineController::class, 'liste'])->name('domaine.liste');
        Route::get('/edit/{domaine}',[DomineController::class, 'editer'])->name('domaine.editer');
        Route::put('/update/{domaine}',[DomineController::class, 'update'])->name('domaine.update');
        Route::get('/delete/{domaine}',[DomineController::class, 'delete'])->name('domaine.delete');
    });
    Route::prefix('niveau')->group(function(){
        Route::get('create',[NiveauController::class,'create'])->name('niveau.create');
        Route::post('/create',[NiveauController::class, 'store'])->name('niveau.store');
        Route::get('/liste',[NiveauController::class, 'liste'])->name('niveau.liste');
        Route::get('/edit/{niveau}',[NiveauController::class, 'editer'])->name('niveau.editer');
        Route::put('/update/{niveau}',[NiveauController::class, 'update'])->name('niveau.update');
        Route::get('/delete/{niveau}',[NiveauController::class, 'delete'])->name('niveau.delete');
    });

    Route::prefix('mondiplome')->group(function(){
        Route::get('create',[MonDiplomeController::class, 'created'])->name('mondiplome.create');
        Route::post('/create',[MonDiplomeController::class, 'store'])->name('mondiplome.store');
        Route::get('/liste',[MonDiplomeController::class, 'liste'])->name('mondiplome.liste');
        Route::get('/edit/{mondiplome}',[MonDiplomeController::class, 'editer'])->name('mondiplome.editer');
        Route::put('/update/{mondiplome}',[MonDiplomeController::class, 'update'])->name('mondiplome.update');
        Route::get('/delete/{mondiplome}',[MonDiplomeController::class, 'delete'])->name('mondiplome.delete');

    });
    Route::prefix('contrat')->group(function(){
        Route::get('create',[TypeContratController::class,'create'])->name('contrat.create');
        Route::post('/create',[TypeContratController::class, 'store'])->name('contrat.store');
        Route::get('/liste',[TypeContratController::class, 'liste'])->name('contrat.liste');
        Route::get('/edit/{contrat}',[TypeContratController::class, 'editer'])->name('contrat.editer');
        Route::put('/update/{contrat}',[TypeContratController::class, 'update'])->name('contrat.update');
        Route::get('/delete/{contrat}',[TypeContratController::class, 'delete'])->name('contrat.delete');
    });
    Route::prefix('direction')->group(function(){
        Route::get('create',[DirectionController::class,'create'])->name('direction.create');
        Route::post('/create',[DirectionController::class, 'store'])->name('direction.store');
        Route::get('/liste',[DirectionController::class, 'liste'])->name('direction.liste');
        Route::get('/edit/{direction}',[DirectionController::class, 'editer'])->name('direction.editer');
        Route::put('/update/{direction}',[DirectionController::class, 'update'])->name('direction.update');
        Route::get('/delete/{direction}',[DirectionController::class, 'delete'])->name('direction.delete');
    });
    Route::prefix('service')->group(function(){
        Route::get('create',[ServiceController::class, 'create'])->name('service.create');
        Route::post('/create',[ServiceController::class, 'store'])->name('service.store');
        Route::get('/liste',[ServiceController::class, 'liste'])->name('service.liste');
        Route::get('/edit/{service}',[ServiceController::class, 'editer'])->name('service.editer');
        Route::put('/update/{service}',[ServiceController::class, 'update'])->name('service.update');
        Route::get('/delete/{service}',[ServiceController::class, 'delete'])->name('service.delete');
    });
    Route::prefix('antenne')->group(function(){
        Route::get('create',[AntenneController::class,'create'])->name('antenne.create');
        Route::post('/create',[AntenneController::class, 'store'])->name('antenne.store');
        Route::get('/liste',[AntenneController::class, 'liste'])->name('antenne.liste');
        Route::get('/edit/{antenne}',[AntenneController::class, 'editer'])->name('antenne.editer');
        Route::put('/update/{antenne}',[AntenneController::class, 'update'])->name('antenne.update');
        Route::get('/delete/{antenne}',[AntenneController::class, 'delete'])->name('antenne.delete');
    });
    Route::prefix('bureau')->group(function(){
        Route::get('/create',[BureauController::class, 'create'])->name('bureau.create');
        Route::post('/create',[BureauController::class, 'store'])->name('bureau.store');
        Route::get('/liste',[BureauController::class, 'liste'])->name('bureau.liste');
        Route::get('/edit/{bureau}',[BureauController::class, 'editer'])->name('bureau.editer');
        Route::put('/update/{bureau}',[BureauController::class, 'update'])->name('bureau.update');
        Route::get('/delete/{bureau}',[BureauController::class, 'delete'])->name('bureau.delete');
    });
    Route::prefix('poste')->group(function(){
        Route::get('create',[PosteController::class, 'create'])->name('poste.create');
        Route::post('/create',[PosteController::class, 'store'])->name('poste.store');
        Route::get('/liste',[PosteController::class, 'liste'])->name('poste.liste');
        Route::get('/edit/{poste}',[PosteController::class,'editer'])->name('poste.editer');
        Route::put('/update/{poste}',[PosteController::class,'update'])->name('poste.update');
        Route::get('/delete/{poste}',[PosteController::class,'delete'])->name('poste.delete');
    });

    Route::prefix('permission')->group(function(){
        Route::get('create',[PermissionController::class, 'create'])->name('permission.create');
        Route::get('liste',[PermissionController::class, 'liste'])->name('permission.liste');
        Route::get('/edit/{permission}',[PermissionController::class, 'edit'])->name('permission.editer');
        Route::get('/delete/{permission}',[PermissionController::class, 'delelte'])->name('permission.delete');

    });

    Route::prefix('conge')->group(function(){
        Route::get('/create',[CongeController::class, 'create'])->name('conge.create');
        Route::post('/store',[CongeController::class, 'store'])->name('conge.store');
        Route::get('/liste',[CongeController::class, 'liste'])->name('conge.liste');
        Route::get('/edit/{conge}',[CongeController::class, 'editer'])->name('conge.editer');
        Route::put('/update/{conge}',[CongeController::class, 'update'])->name('conge.update');
        Route::get('/delete/{conge}',[CongeController::class, 'delete'])->name('conge.delete');

    });
    Route::prefix('permissionconge')->group(function(){
        Route::get('create',[PermissionCongeController::class, 'create'])->name('permissionconge.create');
        Route::get('liste',[PermissionCongeController::class, 'liste'])->name('permissionconge.liste');
        Route::get('/edit/{permissionconge}',[PermissionCongeController::class, 'edit'])->name('permissionconge.editer');
        Route::get('/delete/{permissionconge}',[PermissionCongeController::class, 'delete'])->name('permissionconge.delete');

    });
    Route::prefix('fichecontrat')->group(function(){
        Route::get('create',[FicheContratController::class, 'create'])->name('fiche_contrat.create');
        Route::get('/liste',[FicheContratController::class, 'liste'])->name('fiche_contrat.liste');
        Route::get('/edit/{fichecontrat}',[FicheContratController::class, 'edit'])->name('fiche_contrat.editer');
        Route::get('/delete/{fichecontrat}',[FicheContratController::class,'delete'])->name('fiche_contrat.delete');

    });

    Route::prefix('typemembre')->group(function(){
        Route::get('create',[TypeMembreController::class, 'create'])->name('typemembre.create');
        Route::post('/create',[TypeMembreController::class, 'store'])->name('typemembre.store');
        Route::get('/liste',[TypeMembreController::class, 'liste'])->name('typemembre.liste');
        Route::get('/edit/{typemembre}',[TypeMembreController::class,'editer'])->name('typemembre.editer');
        Route::put('/update/{typemembre}',[TypeMembreController::class,'update'])->name('typemembre.update');
        Route::get('/delete/{typemembre}',[TypeMembreController::class,'delete'])->name('typemembre.delete');
    });

    Route::prefix('membre')->group(function(){
        Route::get('create',[MembreController::class, 'create'])->name('membre.create');
        Route::get('/liste',[MembreController::class, 'liste'])->name('membre.liste');
        Route::get('/edit/{membres}',[MembreController::class, 'edit'])->name('membre.editer');
        Route::get('/delete/{membre}',[MembreController::class,'delete'])->name('membre.delete');

    });

    Route::prefix('curriculum')->group(function(){
        Route::get('create',[CurriculumController::class, 'create'])->name('curriculum.create');
        Route::get('/liste',[CurriculumController::class, 'liste'])->name('curriculum.liste');
        Route::get('/edit/{curriculum}',[CurriculumController::class, 'edit'])->name('curriculum.edit');
        Route::get('/delete/{curricula}',[CurriculumController::class,'delete'])->name('curriculum.delete');

    });
    Route::prefix('mydiplome')->group(function(){
        Route::get('create',[MyDiplomeController::class, 'create'])->name('mydiplome.create');
        Route::get('/liste',[MyDiplomeController::class, 'liste'])->name('mydiplome.liste');
        Route::get('/edit/{mydiplome}',[MyDiplomeController::class, 'edit'])->name('mydiplome.edit');
        Route::get('/delete/{mydiplome}',[MyDiplomeController::class,'delete'])->name('mydiplome.delete');

    });
    Route::prefix('projet')->group(function(){
        Route::get('create',[ProjetController::class, 'create'])->name('projet.create');
        Route::post('create',[ProjetController::class, 'store'])->name('projet.store');
        Route::get('liste',[ProjetController::class, 'liste'])->name('projet.liste');
        Route::get('/edit/{projet}',[ProjetController::class,'editer'])->name('projet.editer');
        Route::put('/update/{projet}',[ProjetController::class,'update'])->name('projet.update');
        Route::get('/delete/{projet}',[ProjetController::class,'delete'])->name('projet.delete');
    });
    Route::prefix('article')->group(function(){
        Route::get('create',[ArticleController::class, 'create'])->name('article.create');
        Route::post('create',[ArticleController::class, 'store'])->name('article.store');
        Route::get('liste',[ArticleController::class, 'liste'])->name('article.liste');
        Route::get('/edit/{article}',[ArticleController::class,'editer'])->name('article.editer');
        Route::put('/update/{article}',[ArticleController::class,'update'])->name('article.update');
        Route::get('/delete/{article}',[ArticleController::class,'delete'])->name('article.delete');
    });
    Route::prefix('setting')->group(function(){
        Route::get('create',[YearController::class,'create'])->name('setting.create');
        Route::get('liste',[YearController::class,'liste'])->name('setting.liste');
    });

    Route::prefix('permissionrole')->group(function(){
        Route::get('/create',[PermissionTableController::class, 'create'])->name('permissionrole.create');
        Route::post('/create',[PermissionTableController::class, 'store'])->name('permissionrole.store');
        Route::get('/liste',[PermissionTableController::class, 'liste'])->name('permissionrole.liste');
        Route::get('/edit/{permissionrole}',[PermissionTableController::class, 'editer'])->name('permissionrole.editer');
        Route::put('/update/{permissionrole}',[PermissionTableController::class, 'update'])->name('permissionrole.update');
        Route::get('/delete/{permissionrole}',[PermissionTableController::class, 'delete'])->name('permissionrole.delete');

    });
    Route::prefix('role')->group(function(){
        Route::get('/create',[RoleController::class, 'create'])->name('role.create');
        Route::post('/create',[RoleController::class, 'store'])->name('role.store');
        Route::get('/liste',[RoleController::class, 'liste'])->name('role.liste');
        Route::get('/edit/{role}',[RoleController::class, 'editer'])->name('role.editer');
        Route::post('/edit/{role}',[RoleController::class, 'update'])->name('role.update');
        Route::get('/delete/{role}',[RoleController::class, 'delete'])->name('role.delete');

    });
    Route::prefix('demandepermission')->group(function(){
        Route::get('create',[DemandePermissionController::class, 'create'])->name('demandepermission.create');
        Route::get('liste',[DemandePermissionController::class, 'liste'])->name('demandepermission.liste');
        Route::get('/edit/{demandepermission}',[DemandePermissionController::class, 'edit'])->name('demandepermission.editer');
        Route::get('/delete/{demandepermission}',[DemandePermissionController::class, 'delete'])->name('demandepermission.delete');

    });
    Route::prefix('demandeantenne')->group(function(){
        // Route::get('create',[DemandeAntenneController::class, 'create'])->name('demandeantenne.create');
        Route::get('liste',[DemandeAntenneController::class, 'liste'])->name('demandeantenne.liste');
        Route::get('/edit/{demandeantenne}',[DemandeAntenneController::class, 'edit'])->name('demandeantenne.editer');
        Route::get('/delete/{demandeantenne}',[DemandeAntenneController::class, 'delete'])->name('demandeantenne.delete');

    });
    Route::prefix('demande_resp')->group(function(){
        Route::get('liste',[AcceptdemandeController::class, 'liste'])->name('demande_resp.liste');
        Route::get('/edit/{demande_resp}',[AcceptdemandeController::class, 'edit'])->name('demande_resp.editer');
        Route::get('/delete/{demande_resp}',[AcceptdemandeController::class, 'delete'])->name('demande_resp.delete');

    });
    Route::prefix('demandeconge')->group(function(){
        Route::get('create',[DemandePermissionCongeController::class, 'create'])->name('demandeconge.create');
        Route::get('liste',[DemandePermissionCongeController::class, 'liste'])->name('demandeconge.liste');
        Route::get('/edit/{demandeconge}',[DemandePermissionCongeController::class, 'edit'])->name('demandeconge.editer');
        // Route::get('/delete/{demandepermission}',[DemandePermissionCongeController::class, 'delete'])->name('demandeconge.delete');

    });
    Route::prefix('fourniture')->group(function(){
        Route::get('add',[FournitureController::class, 'add'])->name('fourniture.add');
        Route::get('dashboard',[FournitureController::class, 'tableaudebord'])->name('fourniture.dashboard');
        // Route::get('produit_article',[FournitureController::class, 'produit_article'])->name('produit.article');
        Route::post('add',[FournitureController::class, 'store'])->name('fourniture.store');
        Route::get('liste',[FournitureController::class, 'liste'])->name('fourniture.liste');
        Route::get('delete_fourniture/{fourniture}',[FournitureController::class,'delete_fourniture'])->name('delete_fourniture.delete');
        Route::get('add/{fourniture}',[FournitureController::class,'cash_fourniture'])->name('fourniture_cash');
        Route::get('detail/{fourniture}',[FournitureController::class,'detail'])->name('fourniture.detail');
        Route::post('detail/{fourniture}',[FournitureController::class,'store_detail'])->name('fourniture.store_detail');
        Route::get('edit',[FournitureController::class,'editer_article'])->name('fourniture.editer_article');
        Route::post('edit',[FournitureController::class,'update'])->name('fourniture.update_article');
        // Route::post('detail_article',[FournitureController::class,'detail_save'])->name('fourniture.detail_save');
        // Route::put('/update/{fourniture}',[FournitureController::class,'update_article'])->name('fourniture.update_article');
        Route::get('/validation',[FournitureController::class, 'validation'])->name('fourniture.validation');
        Route::get('/validation/edit/{fourniture}',[FournitureController::class,'edit'])->name('fourniture.edit');
        Route::get('/validation/edit_valid',[FournitureController::class,'edit_validation'])->name('fourniture.edit_valid');
        Route::post('/validation/edit_valid',[FournitureController::class,'update_edit_validation'])->name('fourniture.edit_update');
        // Route::get('/validation/edit_valid/{fourniture}',[FournitureController::class,'edit_validation'])->name('fourniture.edit_valid');
        Route::put('/validation/update_valid/{fourniture}',[FournitureController::class,'update_validation'])->name('fourniture.update_valid');
        Route::put('/validation/update/{fourniture}',[FournitureController::class,'update_fourniture'])->name('fourniture.update');
        Route::get('/delete/{fourniture}',[FournitureController::class,'delete'])->name('fourniture.delete');
    });
    Route::prefix('parking')->group(function(){
        Route::get('index',[ParkingController::class, 'index'])->name('parking.liste');
        Route::get('add',[ParkingController::class, 'add'])->name('parking.add');
        Route::post('add',[ParkingController::class, 'store'])->name('parking.store');
        // Route::post('add1',[ParkingController::class, 'save'])->name('parking.save');
    });
    Route::prefix('panier_article')->group(function(){
        Route::get('/',[PanierArticleController::class,'add'])->name('panier_article.add');
        Route::get('/edit', [PanierArticleController::class,'editer'])->name('panier_article.edit');
        Route::post('/edit', [PanierArticleController::class,'update'])->name('panier_article.update');
        Route::get('delete/{panier_article}', [PanierArticleController::class,'delete'])->name('panier_article.delete');
    });
    // Route::prefix('demande_fourniture')->group(function(){
    //     Route::get('create',[])
    //     Route::get('edit/{demande_fourniture}', [DemandeFournitureController::class,'editer'])->name('demande_fourniture.edit');
    //     Route::put('update/{demande_fourniture}', [PanierArticleController::class,'update'])->name('panier_article.update');
    //     Route::get('delete/{demande_fourniture}', [PanierArticleController::class,'delete'])->name('panier_article.delete');
    // });
});




