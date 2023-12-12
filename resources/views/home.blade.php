@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <!-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div> -->
        
        <div class="row mt-5">
            @foreach($evenements as $evenements)
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{asset('storage/image/'.$evenements->imageMiseEnAvant)}}"  height="150">
                    <div class="card-body">
                        <h5 class="card-title">libelle :{{$evenements->libelle}}</h5>
                        <h5 class="card-title">Date Limite :{{$evenements->dateLimiteInscription}}</h5>
                        <p class="card-text">description :{{$evenements->description}}</p>
                        <p class="card-text">Statut :{{$evenements->statut}}</p>
                        <p class="card-text">Date Evenement:{{$evenements->dateEvenement}}</p>
                        <a href="/li/{{$evenements->id}}" class="btn btn-info">Voir Plus</a>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>

@endsection
