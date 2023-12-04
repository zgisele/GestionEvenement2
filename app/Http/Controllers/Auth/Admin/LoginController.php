<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// use App\Providers\RouteServiceProvider;
use App\Providers\RouteServiceProviderLog;
use App\Http\Controllers\EvenementController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProviderLog::HOMEuseur;
    // protected $redirectTo = Route::get('/listeEven',[EvenementController::class,'show']);
    // public function affichage()
    // {
    //     return view()
    // }
       

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showLoginForm()
    {
        return view('auth.admin.login');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
