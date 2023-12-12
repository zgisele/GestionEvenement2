<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web,admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // public function AffichageUser()
    // {
    //     $evenements = Evenement::where('user_id', auth()->id())->get(); // Exemple de récupération d'evenements pour l'utilisateur
    //     return view('home', compact('evenements'));
    // }
}
