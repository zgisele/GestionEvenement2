@extends('layout.entete')

@section('content')
<div class="container bg-dark mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }} Evenement</div>

                <div class="card-body">
                    <form method="post" action="/stocageEven"  >
                        @csrf
        

                        <div class="row mb-3">
                            <label for="libelle" class="col-md-4 col-form-label text-md-end">Libelle</label>

                            <div class="col-md-6">
                                <input id="libelle" type="text" class="form-control @error('libelle') is-invalid @enderror" name="libelle" value="{{ old('libelle') }}" required autocomplete="libelle" autofocus>

                                @error('libelle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
        
                            <label for="dateLimiteInscription" class="col-md-4 col-form-label text-md-end">Date Limite Inscription</label>

                            <div class="col-md-6">
                                <input id="dateLimiteInscription" type="date" class="form-control @error('dateLimiteInscription') is-invalid @enderror" name="dateLimiteInscription" value="{{ old('dateLimiteInscription') }}" required autocomplete="dateLimiteInscription" autofocus>

                                @error('dateLimiteInscription')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">Description</label>

                            <div class="col-md-6">
                                <!-- <input id="slogan" type="text" class="form-control @error('slogan') is-invalid @enderror" name="slogan" value="{{ old('slogan') }}" required autocomplete="slogan"> -->
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('slogan') is-invalid @enderror" value="{{ old('description') }}" required autocomplete="description"></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="imageMiseEnAvant" class="col-md-4 col-form-label text-md-end">Image Mise En Avant</label>

                            <div class="col-md-6">
                                <input id="imageMiseEnAvant" type="file" class="form-control @error('imageMiseEnAvant') is-invalid @enderror" name="imageMiseEnAvant" value="{{ old('imageMiseEnAvant') }}" required autocomplete="imageMiseEnAvant">

                                @error('imageMiseEnAvant')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="statut" class="col-md-4 col-form-label text-md-end">Statut</label>

                            <div class="col-md-6">
                                <!-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"> -->
                                <select name="statut" id="statut" class="form-control @error('statut') is-invalid @enderror"  required autocomplete="statut">
                                    <option value="cloturer">Cloturer</option>
                                    <option value="ouvert">Ouvert</option>

                                </select>
                                @error('statut')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
        
                            <label for="dateEvenement" class="col-md-4 col-form-label text-md-end">Date de L'evenement</label>

                            <div class="col-md-6">
                                <input id="dateEvenement" type="date" class="form-control @error('dateEvenement') is-invalid @enderror" name="dateEvenement" value="{{ old('dateEvenement') }}" required autocomplete="dateEvenement" autofocus>

                                @error('dateEvenement')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary bg-success">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
