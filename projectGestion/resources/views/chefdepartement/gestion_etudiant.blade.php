@extends('layouts.navfooter4') 
@section('title','Sections') 
@section('text4','nav-item active')
@section('text1','nav-item')

@section('content')
<style>
    .d{
        padding: 2% ; 
    }
</style>
<style>
    body {font-family: Arial, Helvetica, sans-serif;}
    
    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      padding-top: 100px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }
    
    /* Modal Content */
    .modal-content {
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
    }
    
    /* The Close Button */
    .close {
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .pp{
        font-size: 20px ; 
        color: white ; 
        position: relative; 
        top:6px ; 
        left: 4px ;
    }
    .aa{
        position: relative;
        top: -110px ; 
        left: 1350px ; 
    }
    
    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }
    </style>
<article>
    <div>
      <h1 class="liste">Liste des Etudiants de matiere {{session('matiere2')}} : </h1>
      <a href="/deconnexion2" class="aa"><img src="{{ asset('images/logout.png') }}" alt="tag" width="70px" height="60px"></a>
      </div>
      @section('content2')
      <p class="pp"> {{session('nom')}} {{session('prenom')}}</p>
      @endsection>
    <div class="container">
      <div class="row">
          <div class="col-6">
              @if (session()->has('flash_message'))
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                  <ul>
                      <li>{{session()->get('flash_message')}}</li>
                  </ul>
                  </div>
              @endif
              @if (session()->has('flash_erreur'))
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                  <ul>
                      <li>{{session()->get('flash_erreur')}}</li>
                  </ul>
                  </div>
              @endif
          </div>
      </div>
    </div>
    <button class="btn btn-primary" id="btn1"><i class="fa fa-plus-circle"></i> Ajouter Etudiant </button>
    @if($etudiants->isNotEmpty())
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Classe</th>
                <th scope="col">Section</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($etudiants as $etudiant)
            <tr>
                <th scope="row">{{$etudiant->id}}</th>
                <td>{{$etudiant->nom}}</td>
                <td>{{$etudiant->prenom}}</td>
                <td>{{$etudiant->nom_Classe}}</td>
                <td>{{$etudiant->nom_Section}}</td>
                <td>
                    <a class="btn btn-dark btn-sm" href="http://127.0.0.1:8000/modifier_etud/{{ $etudiant->id }}">
                      <i class="fa fa-edit"></i> Modifier
                      </a>
                    <a class="btn btn-danger btn-sm" href="http://127.0.0.1:8000/click_deleteetud/{{$etudiant->id}}" >
                        <i class="fa fa-trash"></i> Supprimer
                        </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>  <br> <br> <br> <br> <br> <br>
            @else
            <br> 
            <h4 class="d">Il n'y a aucun etudiant dans cette matiere ! </h4> 
            @endif 
</article>


<!-- Trigger/Open The Modal 
<button id="myBtn">Open Modal</button> -->

<!-- The Modal ajouter departement-->
<div id="myModal" class="modal">
<div class="modal-content">
  <span class="close">&times;</span>
  <center><h4 style="color: rgb(4, 33, 44)">Ajouter Etudiant</h4></center><br><br>
  <form name="myForm" action="{{route('etudiants.store')}}" method="POST" enctype="multipart/form-data" >
  @csrf 
      <label style="font-family: Georgia, serif"><h5>Etudiant </h5></label>
      <!-- <input type="text" name="nom" class="form-control" placeholder="votre nom" aria-describedby="aideUserName"> --> 
      <select type="text" name="nometprenom" class="form-control" id="floatingInput" > 
        <option value="">Choisir Etudiant</option>
        @foreach ($compteEtudiant as $compte)
          @if ($compte->mode == "accepte")
                  <option value="{{$compte->nom}} {{$compte->prenom}}">{{$compte->nom}} {{$compte->prenom}}</option>
                }
          @endif
        @endforeach
      </select> 
      @if ($errors->has('nometprenom'))
      <span class="help-block">
          <strong style="color: red">{{ $errors->first('nometprenom') }}</strong>
      </span> 
      @endif
      <br>

      <!-- <label style="font-family: Georgia, serif"><h5>Prenom</h5></label>
      <input type="text" name="prenom" class="form-control" placeholder="votre prenom" aria-describedby="aideUserName">
      <select type="text" name="prenom" class="form-control" id="floatingInput" > 
        <option value="">Choisir Prenom Etudiant</option>
        @foreach ($compteEtudiant as $compte)
          @if ($compte->mode == "accepte")
              @if($etudiants->isEmpty()){
                <option value="{{$compte->prenom}}">{{$compte->prenom}}</option>
              }
              @else{
                @foreach ($etudiants as $etudiant)
                    @if ( $etudiant->prenom != $compte->prenom )
                      <option value="{{$compte->prenom}}">{{$compte->prenom}}</option>
                    @endif
                @endforeach
              }
              @endif
          @endif
        @endforeach
      </select> 
      @if ($errors->has('prenom'))
      <span class="help-block">
          <strong style="color: red">{{ $errors->first('prenom') }}</strong>
      </span> 
      @endif
      <br> --> 
      <label style="font-family: Georgia, serif"><h5>Classe : </h5></label>
      <input type="text" name="classe" class="form-control" value="{{session('classe2')}}" readonly> <br>
      <label style="font-family: Georgia, serif"><h5>Section : </h5></label>
      <input type="text" name="section" class="form-control"  value="{{session('section2')}}" readonly> <br>
      <label style="font-family: Georgia, serif"><h5>Matiere : </h5></label>
      <input type="text" name="matiere" class="form-control"  value="{{session('matiere2')}}" readonly> <br>

      

      <br><center><button type="submit" class="btn btn-secondary" >Ajouter</button></center><br>
  </form>
</div>

</div> 



<script>

    // Get the modal
    var modal = document.getElementById("myModal");
    
    // Get the button that opens the modal
    var btn = document.getElementById("btn1");
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
</script>


@endsection