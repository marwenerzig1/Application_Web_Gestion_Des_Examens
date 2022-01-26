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

    .help-block {
      color: red ; 
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
    <h1 class="liste">Liste des Planification : </h1>
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
  @php
  $section = "" ; 
  $classe = "" ; 
  @endphp 

    <button class="btn btn-primary" id="btn1"><i class="fa fa-plus-circle"></i> Ajouter Matiere </button>
    @if($matieres->isNotEmpty())
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom Matiere</th>
                <th scope="col">Nom Classe</th>
                <th scope="col">Enseignant</th>
                <th scope="col">Surveillant 1</th>
                <th scope="col">Surveillant 2</th>
                <th scope="col">Classe</th>
                <th scope="col">Heure</th> 
                <th scope="col">Date</th> 
                <th scope="col">Action</th> 
            </tr>
        </thead>
        <tbody> 
            @foreach ($matieres as $matiere)
            <tr>
                @php
                $section = $matiere->nom_Section ; 
                $classe = $matiere->nom_Classe ; 
                @endphp 
                <th scope="row">{{$matiere->id}}</th>
                <td>{{$matiere->nom_Matiere}}</td>
                <td>{{$matiere->nom_Classe}}</td>
                <td>{{$matiere->prof_Matiere}}</td>
                <td>{{$matiere->surveillant1}}</td>
                <td>{{$matiere->surveillant2}}</td>
                <td>{{$matiere->classe}}</td>
                <td>{{$matiere->heure}}</td>
                <td>{{$matiere->date}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="http://127.0.0.1:8000/consulter_places/{{$matiere->nom_Matiere}}/{{$matiere->nom_Section}}/{{$matiere->nom_Classe}}">
                          <i class="fa fa-search"></i> Consulter places etudiants 
                        </a>
                    <a class="btn btn-dark btn-sm" href="http://127.0.0.1:8000/modifier_matiere/{{ $matiere->id }}">
                      <i class="fa fa-edit"></i> Modifier
                      </a>
                    <a class="btn btn-danger btn-sm" href="http://127.0.0.1:8000/click_deletematiere/{{$matiere->id}}" >
                        <i class="fa fa-trash"></i> Supprimer
                        </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>  <br> <br> <br> <br> <br> <br>
            @else
            <br> 
            <h4 class="d">Il n'y a aucun matiere ! </h4> 
            @endif 
</article>


<!-- Trigger/Open The Modal 
<button id="myBtn">Open Modal</button> -->

<!-- The Modal ajouter departement-->
<div id="myModal" class="modal">
<div class="modal-content">
  <span class="close">&times;</span>
  <center><h4 style="color: rgb(4, 33, 44)">Ajouter Matiere</h4></center><br><br>
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
  <form name="myForm" action="{{route('matieres.store')}}" method="POST" enctype="multipart/form-data" >
  @csrf 
      <label style="font-family: Georgia, serif"><h5>Entrez votre nom de matiere</h5></label>
      <input type="text" name="nom" class="form-control" placeholder="Exemple : Machine learning" aria-describedby="aideUserName"> <br>
      @if ($errors->has('nom'))
      <span class="help-block">
          <strong>{{ $errors->first('nom') }}</strong>
      </span><br>
      @endif
      <label style="font-family: Georgia, serif"><h5>Section : </h5></label>
      <input type="text" name="section" class="form-control"  value="{{session('section')}}" readonly> <br>
      <label style="font-family: Georgia, serif"><h5>Classe : </h5></label> 
      <input type="text" name="classe" class="form-control" value="{{session('classe')}}" readonly> <br>

      <label style="font-family: Georgia, serif"><h5>Enseignant : </h5></label>
      <!--<input type="text" name="enseignant" class="form-control" placeholder="Exemple : mmm mmm" aria-describedby="aideUserName"> <br> -->
      <select type="text" name="enseignant" class="form-control" id="floatingInput" > 
        <option value="" style="color:#888">Exemple : mmmm mmmm</option>
        @foreach ($comptes as $compte)
          @if ($compte->mode == "accepte")
            <option value="{{$compte->nom}} {{$compte->prenom}}">{{$compte->nom}} {{$compte->prenom}}</option>
          @endif
        @endforeach
      </select> <br>
      @if ($errors->has('enseignant'))
      <span class="help-block">
          <strong>{{ $errors->first('enseignant') }}</strong>
      </span><br>
      @endif

      <label style="font-family: Georgia, serif"><h5>Surveillant 1 : </h5></label>
      <!--<input type="text" name="surveillant1" class="form-control" placeholder="Exemple : mmm mmm" aria-describedby="aideUserName"> <br> -->
      <select type="text" name="surveillant1" class="form-control" id="floatingInput" > 
        <option value="">Exemple: mmmm mmmm </option>
        @foreach ($comptes as $compte)
          @if ($compte->mode == "accepte")
              <option value="{{$compte->nom}} {{$compte->prenom}}">{{$compte->nom}} {{$compte->prenom}}</option>
          @endif
        @endforeach
      </select> <br>
      @if ($errors->has('surveillant1'))
      <span class="help-block">
          <strong>{{ $errors->first('surveillant1') }}</strong>
      </span><br>
      @endif
      
      <label style="font-family: Georgia, serif"><h5>Surveillant 2 : </h5></label>
      <!-- <input type="text" name="surveillant2" class="form-control" placeholder="Exemple : mmm mmm" aria-describedby="aideUserName"> <br> -->
      <select type="text" name="surveillant2" class="form-control" id="floatingInput" > 
        <option value="">Exemple: mmmm mmmm </option>
        @foreach ($comptes as $compte)
          @if ($compte->mode == "accepte")
            <option value="{{$compte->nom}} {{$compte->prenom}}">{{$compte->nom}} {{$compte->prenom}}</option>
          @endif
        @endforeach
      </select> <br>
      @if ($errors->has('surveillant2'))
      <span class="help-block">
          <strong>{{ $errors->first('surveillant2') }}</strong>
      </span><br>
      @endif


      <label style="font-family: Georgia, serif"><h5>Classe : </h5></label>
      <input type="text" name="classe2" class="form-control" placeholder="Exemple : c102" aria-describedby="aideUserName"> <br>
      @if ($errors->has('classe2'))
      <span class="help-block">
          <strong>{{ $errors->first('classe2') }}</strong>
      </span><br>
      @endif

      <label style="font-family: Georgia, serif"><h5>Heure : </h5></label>
      <!--<input type="time" name="heure" class="form-control" min="08:30" max="18:00"  aria-describedby="aideUserName"> <br> --> 
      <select type="time" name="heure" class="form-control" id="floatingInput" >
        <option value="">Heure</option>
        <option value="08:30">08:30</option>
        <option value="10:05">10:05</option>
        <option value="11:40">11:40</option>
        <option value="13:15">13:15</option>
        <option value="14:50">14:50</option>
        <option value="16:25">16:25</option>
      </select> <br> 
      @if ($errors->has('heure'))
      <span class="help-block">
          <strong>{{ $errors->first('heure') }}</strong>
      </span><br>
      @endif

      <label style="font-family: Georgia, serif"><h5>Date : </h5></label>
      <input type="date" name="date" class="form-control"  min="2022-01-17" max="2022-12-30" aria-describedby="aideUserName"> <br>
      @if ($errors->has('date'))
      <span class="help-block">
          <strong>{{ $errors->first('date') }}</strong>
      </span><br>
      @endif

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