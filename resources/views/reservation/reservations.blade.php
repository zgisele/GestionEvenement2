



<!-- resources/views/reservations.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Liste des Réservations</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Utilisateur</th>
                <th>Événement</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->user->name }}</td>
                    <td>{{ $reservation->evenement->libelle }}</td>
                    <td>{{ $reservation->status }}</td>
                    <td>
                        @if($reservation->status === 'pending')
                            <form method="post" action="{{ route('reservations.accept', ['id' => $reservation->id]) }}">
                                @csrf
                                <button type="submit">Accepter</button>
                            </form>
                            <form method="post" action="{{ route('reservations.reject', ['id' => $reservation->id]) }}">
                                @csrf
                                <button type="submit">Refuser</button>
                            </form>
                        @else
                            {{-- Afficher un message ou autre chose pour les réservations déjà acceptées ou refusées --}}
                            {{ $reservation->status }}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
