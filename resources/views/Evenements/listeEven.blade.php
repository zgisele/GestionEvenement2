<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.css">
    <title>Enregistrement</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="/a">Home 
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="/Bienvenue">Creer un compte</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/homeAd">Home Admin</a>
        </li>
        <li class="nav-item dropdown">
          <!-- <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Se deconnecter</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
          </div> -->
          
                                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                      {{ auth()->guard('admin')->check() ? auth()->guard('admin')->user()->name : 'Inconnu' }}
                                      </a>

                                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                          <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">
                                              {{ __('Logout') }}
                                          </a>

                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                              @csrf
                                          </form>
                                      </div>
                

        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-sm-2" type="search" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div class="card-body ">
<table class="table table-hover  mt-5 ml-5 mr-5">
  <thead>
    <tr>
      
      <th scope="col">Libelle</th>
      <th  scope="col">Date Limite Inscription</th>
      <th  scope="col">Description</th>
      <th  scope="col">Image Mise En Avant</th>
      <th  scope="col">Statut</th>
      <th  scope="col">Date de L'evenement</th>
      <th  scope="col" >Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($evenements as $evenements )
    <tr>
      <td>{{$evenements->libelle}}</td>
      <td>{{$evenements->dateLimiteInscription}}</td>
      <td>{{$evenements->description}}</td>
      <td>{{$evenements->imageMiseEnAvant}}</td>
      <td>{{$evenements->statut}}</td>
      <td>{{$evenements->dateEvenement}}</td>
      
      <td class="d-flex">
      <a href="/pageAjout"><button type="button" class="btn btn-outline-success"> Ajout</button></a>
        <form action="{{'/supprimerEven/'.$evenements->id}}" method="post">
        <!-- <a href="{{'/supprimerEven/'.$evenements->id}}"> -->
          @method('delete')
          @csrf
          <button type="submite" class="btn btn-outline-danger">Sup</button>
        <!-- </a> -->
        </form>
      <a href="{{'/pageModification/'.$evenements->id}}">
        <button type="button" class="btn btn-outline-primary">Mod</button>
      </a>
      </td>
      
      
    </tr>
   @endforeach 
  </tbody>
</table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>