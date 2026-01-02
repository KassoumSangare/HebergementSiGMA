<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ModuleController;
use App\Http\Controllers\backend\NewsLettersController;
use App\Http\Controllers\backend\ParametreController;
use App\Http\Controllers\backend\PermissionController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\CommandeServiceController;
use App\Http\Controllers\frontend\BaseController;
use App\Http\Controllers\frontend\HebergementController;
use App\Http\Controllers\frontend\NomDomaineController;
use Illuminate\Support\Facades\Route;






Route::fallback(function () {
    return view('backend.utility.auth-404-basic');
});

Route::middleware(['admin'])->prefix('admin')->group(function () {

    // login and logout
    Route::controller(AdminController::class)->group(function () {
        route::get('/login', 'login')->name('admin.login')->withoutMiddleware('admin'); // page formulaire de connexion
        route::post('/login', 'login')->name('admin.login')->withoutMiddleware('admin'); // envoi du formulaire
        route::post('/logout', 'logout')->name('admin.logout');
    });



    // dashboard admin
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    // parametre application
    Route::prefix('parametre')->controller(ParametreController::class)->group(function () {
        route::get('', 'index')->name('parametre.index');
        route::post('store', 'store')->name('parametre.store');
        route::get('maintenance-up', 'maintenanceUp')->name('parametre.maintenance-up');
        route::get('maintenance-down', 'maintenanceDown')->name('parametre.maintenance-down');
        route::get('optimize-clear', 'optimizeClear')->name('parametre.optimize-clear');
        Route::get('download-backup/{file}', 'downloadBackup')->name('setting.download-backup');  // download backup db
    });


    //register admin
    Route::prefix('register')->controller(AdminController::class)->group(function () {
        route::get('', 'index')->name('admin-register.index');
        route::post('store', 'store')->name('admin-register.store');
        route::post('update/{id}', 'update')->name('admin-register.update');
        route::get('delete/{id}', 'delete')->name('admin-register.delete');
        route::get('profil/{id}', 'profil')->name('admin-register.profil');
        route::post('change-password', 'changePassword')->name('admin-register.new-password');
    });

    //role
    Route::prefix('role')->controller(RoleController::class)->group(function () {
        route::get('', 'index')->name('role.index');
        route::post('store', 'store')->name('role.store');
        route::post('update/{id}', 'update')->name('role.update');
        route::get('delete/{id}', 'delete')->name('role.delete');
    });

    //permission
    Route::prefix('permission')->controller(PermissionController::class)->group(function () {
        route::get('', 'index')->name('permission.index');
        route::get('create', 'create')->name('permission.create');
        route::post('store', 'store')->name('permission.store');
        route::get('edit{id}', 'edit')->name('permission.edit');
        route::put('update/{id}', 'update')->name('permission.update');
        route::get('delete/{id}', 'delete')->name('permission.delete');
    });

    //module
    Route::prefix('module')->controller(ModuleController::class)->group(function () {
        route::get('', 'index')->name('module.index');
        route::post('store', 'store')->name('module.store');
        route::post('update/{id}', 'update')->name('module.update');
        route::get('delete/{id}', 'delete')->name('module.delete');
    });


    // newsletter subscribers
    Route::prefix('newsletters')->controller(NewsLettersController::class)->group(function () {
        route::get('', 'index')->name('newsletters.index');
        route::post('store', 'store')->name('newsletter.store');
        route::post('delete/{id}', 'destroy')->name('newsletters.destroy');
        route::post('send', 'sendToAll')->name('newsletters.send');
    });
    // Commande Service Form Submission

    Route::prefix('commande_web')->controller(CommandeServiceController::class)->group(function () {
        Route::post('commander', 'store')->name('commande.service.store');
        Route::get('', 'index')->name('commande.service.index');
    });
});











// ###############################
// Frontend Routes
// ###############################
Route::prefix('/')->controller(BaseController::class)->group(function () {
    route::get('', 'index')->name('frontend.index');
});


Route::prefix('domaines')->group(function () {
    Route::get('researcher', function () {
        return view('frontend.domaines.researcher');
    })->name('domaine.researcher');

    Route::get('transfer', function () {
        return view('frontend.domaines.transfer');
    })->name('domaine.transfer');

    Route::get('renew', function () {
        return view('frontend.domaines.renew');
    })->name('domaine.renew');

    // Ajax routes
    Route::post('ajax/search', [NomDomaineController::class, 'search'])
        ->name('domaine.ajax.search');
    Route::post('ajax/transfer', [NomDomaineController::class, 'transfer'])
        ->name('domaine.ajax.transfer');
    Route::post('ajax/renew', [NomDomaineController::class, 'renew'])
        ->name('domaine.ajax.renew');
});

Route::prefix('hebergements')
    ->controller(HebergementController::class)
    ->group(function () {

        Route::get('mutualise', 'hebergementMutualise')->name('hebergement.mutualise');
        Route::get('cloud', 'hebergementCloud')->name('hebergement.cloud');
        Route::get('windows', 'hebergementWindows')->name('hebergement.windows');
        Route::get('linux', 'hebergementLinux')->name('hebergement.linux');
        Route::get('commander', 'commanderHebergement')->name('hebergement.commander');

        Route::get('inscription', 'inscription')->name('hebergement.inscription');

        Route::get('serveur_infogerence', 'hebergementServeurInfogerence')
            ->name('hebergement.serveur_infogerence');

        Route::get('serveur_dedie_libre', 'hebergementServeurDedieLibre')
            ->name('hebergement.serveur_dedie_libre');

        Route::get('serveur_dedie', 'hebergementServeurDedieVPS')
            ->name('hebergement.serveur_dedie_vps');

        Route::get('index_serveur_dedie', 'index_serveur_dedie')
            ->name('hebergement.index_serveur_dedie');
    });
