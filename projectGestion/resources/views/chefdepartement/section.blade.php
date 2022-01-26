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
    
    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
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
    </style>
<article>
    <div>
      <h1 class="liste">Liste des sections : </h1> 
      <a href="/deconnexion2" class="aa"><img src="{{ asset('images/logout.png') }}" alt="tag" width="70px" height="60px"></a>
      </div>
      @section('content2')
      <p class="pp"> {{session('nom')}} {{session('prenom')}}</p>
      @endsection
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
    <button class="btn btn-primary" id="btn1"><i class="fa fa-plus-circle"></i> Ajouter Section </button>
    @if($sections->isNotEmpty())
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Section </th>
                <th scope="col">Abrévation </th>
                <th scope="col">departement</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sections as $section)
            @if ($section->departement == session('departement'))
              <tr>
                  <th scope="row">{{$section->id}}</th>
                  <td>{{$section->nom_Section}}</td>
                  <td>{{$section->abrevation}}</td>
                  <td>{{$section->departement}}</td>
                  <td>
                      <a class="btn btn-primary btn-sm" href="consulter_classe/{{$section->nom_Section}}/{{$section->departement}}">
                          <i class="fa fa-search"></i> Consulter
                          </a>
                      <a class="btn btn-dark btn-sm" href="modifier_section/{{ $section->id }}">
                        <i class="fa fa-edit"></i> Modifier
                        </a>
                      <a class="btn btn-danger btn-sm" href="click_deletesection/{{$section->id}}" >
                          <i class="fa fa-trash"></i> Supprimer
                          </a>
                  </td>
              </tr>
            @endif
            @endforeach
        </tbody>
    </table>  <br> <br> <br> <br> <br> <br>
            @else
            <br> 
            <h4 class="d">Il n'y a aucun section ! </h4> 
            @endif 
</article>

<!-- Trigger/Open The Modal 
<button id="myBtn">Open Modal</button> -->

<!-- The Modal ajouter departement-->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <center><h4 style="color: rgb(4, 33, 44)">Ajouter Section</h4></center><br><br>
    <form name="myForm"  action="{{route('sections.store')}}" method="POST" enctype="multipart/form-data" >
    @csrf 
        <label style="font-family: Georgia, serif"><h5>Entrez votre nom de section</h5></label>
        <input type="text" name="nom" class="form-control" id="nom" placeholder="Exemple : developement systeme d'inforamtion" aria-describedby="aideUserName"> 
        @if ($errors->has('nom'))
        <span class="help-block">
            <strong style="color: red">{{ $errors->first('nom') }}</strong>
        </span>
        @endif
        <br>

        <label style="font-family: Georgia, serif"><h5>Entrez votre abrévation de section</h5></label>
        <input type="text" name="abrevation" class="form-control" id="nom" placeholder="Exemple : DSI" aria-describedby="aideUserName">
        @if ($errors->has('abrevation'))
        <span class="help-block">
            <strong style="color: red">{{ $errors->first('abrevation') }}</strong>
        </span>
        @endif
        <br>

        <label style="font-family: Georgia, serif"><h5>Entrez votre departement</h5></label>
        <input type="text" name="departement" class="form-control" id="nom" value="{{session('departement')}}" aria-describedby="aideUserName" readonly>

        <br><center><button type="submit" class="btn btn-secondary">Ajouter</button></center><br>
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