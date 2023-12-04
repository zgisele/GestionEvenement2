<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('/Evenements/ajoutEven');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
        
    //     $request->validate([
    //         'libelle' => 'required',
    //         'dateLimiteInscription' => 'required',
    //         'description' => 'required',
           
    //         'statut' => 'required',
    //         'dateEvenement' => 'required',
            
    //     ]);

    //     // $admin= new Admin();
    //     $evenements= new Evenement([
    //         'libelle' => $request->get('libelle'),
    //         'dateLimiteInscription' => $request->get('dateLimiteInscription'),
    //         'description' => $request->get('description'),
    //         'imageMiseEnAvant' => $request->get('imageMiseEnAvant'),
    //         'statut' => $request->get('statut'),
    //         'dateEvenement' => $request->get('dateEvenement'),
    //         'admin_id' =>1,
            
    //     ]);
    //     $evenements->save();
    //     return back();
     
    // }

    /**
     * Display the specified resource.
     */
    public function show(Evenement $evenements)
    {
        //
        $evenements = Evenement::all(); // Récupérer tous les biens depuis le modèle article
        return view('/Evenements/listeEven',compact('evenements')); // Passer les Articles à la vue
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
        $evenements= Evenement::findOrFail($id);
        return view('/Evenements/modifierEven',compact('evenements'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        //
        $request->validate([
                'libelle' => 'required',
                'dateLimiteInscription' => 'required',
                'description' => 'required',
                // 'imageMiseEnAvant' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'statut' => 'required',
                'dateEvenement' => 'required',
                
            ]);

        $evenements= Evenement::findOrFail($id);
        
        $evenements->libelle = $request->libelle;
        $evenements->dateLimiteInscription = $request->dateLimiteInscription;
        $evenements->description = $request->description;
        if ($request->file('image')) {
            $imagePath = $request->file('imageMiseEnAvant')->storestore('storage/image', 'public');
            $evenements->imageMiseEnAvant = $imagePath;
        }
        $evenements->statut = $request->statut;
        $evenements->dateEvenement = $request->dateEvenement;
        $evenements->update();
       return back()->with('status', 'Article mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evenement $evenement,$id)
    {
        //
        $evenement = Evenement::findOrFail($id);
        // Storage::disk('public')->delete($article->image);
        $evenement->delete();
        return back()->with('success', 'Article supprimer avec succès');
    }

    public function store(Request $request)
    {
        // $admin = auth()->user();
        // $admin = auth()->user();
        $admin = auth()->guard('admin')->user();
        // $admin = Admin::all();
        if ($admin){
        $event = new Evenement();
        $event->libelle =$request->libelle;
        $event->dateLimiteInscription =$request->dateLimiteInscription;
        $event->description =$request->description;
        $event->statut =$request->statut;
        $event->admin_id = $admin->id;
        $event->dateEvenement =$request->dateEvenement;
        $event->imageMiseEnAvant =$request->imageMiseEnAvant;

        // if ($request->file('imageMiseEnAvant')) {
        //     $imagePath = $request->file('imageMiseEnAvant')->storestore('storage/image', 'public');
        //     $event->imageMiseEnAvant = $imagePath;
        // }
        $event->save();
        return redirect()->back();
    } else {
        // Gérer le cas où aucun admin n'est connecté
        // Par exemple, rediriger vers une page de connexion
        return redirect('admin/login');
    }

    }
}
