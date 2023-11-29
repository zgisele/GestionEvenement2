<?php

use App\Http\Controllers\Auth\Admin\LoginController;
use App\Http\Controllers\Auth\Admin\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('/PageAcueil', function () {
    return view('index');
});

Auth::routes();
Route::get('/admin/login',[LoginController::class,'showLoginForm']);
Route::post('/admin/login',[LoginController::class,'login'])->name('Adminlogin');

Route::get('/admin/register',[RegisterController::class,'showRegisterForm']);
Route::post('/admin/register',[RegisterController::class,'register'])->name('admineRegister');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
