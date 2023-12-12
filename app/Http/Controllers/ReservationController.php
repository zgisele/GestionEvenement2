<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function accept($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'accepter';
        $reservation->admin_id = auth()->id();
        $reservation->save();

        // Ajoutez des messages de réussite ou des redirections selon vos besoins
    }

    public function reject($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'rejetter';
        $reservation->admin_id = auth()->id();
        $reservation->save();

        // Ajoutez des messages de réussite ou des redirections selon vos besoins
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $reservations = Reservation::all();

        return view('/reservations', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // return view('/reservation.reservations');
        return view('/reservation.reserve');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
