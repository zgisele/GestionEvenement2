<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\Auth\Admin\LoginController;
use App\Http\Controllers\Auth\Admin\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// les route pour mes user et admine(pour etablier les relation entre les page)
// Route::get('/adminlog', function () {
//     return view('admin/login');});

// page accueil
// Route::get('/PageAcueil', function () {
//     return view('index');
// });
Route::get('/PageAcueil',[EvenementController::class,'AffichageAcueil']);

// page bienvenue
Route::get('/Bienvenue', function () {
    return view('bienvenue');
});

// Enregistrement et login des Admins
Auth::routes();
Route::get('/admin/login',[LoginController::class,'showLoginForm']);
Route::post('/admin/login',[LoginController::class,'login'])->name('Adminlogin');

Route::get('/admin/register',[RegisterController::class,'showRegisterForm']);
Route::post('/admin/register',[RegisterController::class,'register'])->name('admineRegister');

// espace personnelle

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home',[EvenementController::class,'AffichageUser']);
// les evenements
// page ajout

Route::get('/homeAd', function () {
    return view('/homeAdmin');
});

Route::get('/pageAjout',[EvenementController::class,'index']);
Route::post('/stocageEven',[EvenementController::class,'store']);
Route::get('/listeEven',[EvenementController::class,'show']);
Route::get('/pageModification/{id}',[EvenementController::class,'edit']);
// Route::post('/modifierEvenement/{id}',[EvenementController::class,'update']);
Route::PATCH('/modifierEvenement/{id}',[EvenementController::class,'update']);
Route::delete('/supprimerEven/{id}',[EvenementController::class,'destroy']);



    // Route::middleware(['auth', 'role:admin'])->group(function () {
    //     Route::prefix('reservations')->group(function () {
        // accepter','rejetter'
            // routes/web.php

use App\Http\Controllers\ReservationController;

            Route::get('/Reservations', [ReservationController::class, 'create']);
            Route::get('/reservations', [ReservationController::class, 'index']);
            // ->name('reservations.index');

            Route::post('/accept/{id}', 'ReservationController@accepter')->name('reservations.accept');
            Route::post('/reject/{id}', 'ReservationController@rejetter')->name('reservations.reject');


            
//     });
// });

// Route::get('/Reservations', function () {
//     return view('/reservation/reservations');
// });
// Route::get('/Reservations', function () {
//     return view('/reservation.reserve');
// });

// Route::get('/listeEvenClient',[EvenementController::class,'AffichageClient']);




Route::get('/listeEvenIndex',[EvenementController::class,'AffichageClient']);








