<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



<div class="col-md-12 ">
<div class="card mb-4 box-shadow">

<div class="row">
    @foreach($evenements as $evenements)
    <div class="col-md-4">
        <div class="card mb-4 box-shadow">
            <img class="card-img-top" src="{{asset('storage/image/'.$evenements->imageMiseEnAvant)}}" width="200" height="200">
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

    
</body>
</html>