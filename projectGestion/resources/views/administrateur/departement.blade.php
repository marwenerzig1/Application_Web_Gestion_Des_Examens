@extends('layouts.navfooter') 
@section('title','Départements') 
@section('text1','nav-item active')
@section('text2','dropdown')
@section('text3','dropdown')

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

    .aa{
        position: relative;
        top: -110px ; 
        left: 1350px ; 
    }
    
    </style>
<article>
  <div>
    <h1 class="liste">Liste des départements : </h1>
    <a href="/deconnexion3" class="aa"><img src="{{ asset('images/logout.png') }}" alt="tag" width="70px" height="60px"></a>
  </div>
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

    <button class="btn btn-primary" id="btn1"><i class="fa fa-plus-circle"></i> Ajouter Departement </button>
    @if($departements->isNotEmpty())
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Département </th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departements as $departement)
            <tr>
                <th scope="row">{{$departement->id}}</th>
                <td>{{$departement->nom_Departement}}</td>
                <td>
                    <a class="btn btn-dark btn-sm" href="modifier_departement/{{ $departement->id }}">
                      <i class="fa fa-edit"></i> Modifier
                      </a>
                    <a class="btn btn-danger btn-sm" href="click_delete/{{$departement->id}}" >
                        <i class="fa fa-trash"></i> Supprimer
                        </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>  <br> <br> <br> <br> <br> <br>
            @else
            <br> 
            <h4 class="d">Il n'y a aucun departement ! </h4> 
            @endif 
</article>

<!-- Trigger/Open The Modal 
<button id="myBtn">Open Modal</button> -->

<!-- The Modal ajouter departement-->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <center><h4 style="color: rgb(4, 33, 44)">Ajouter Departement</h4></center><br><br>
    <form name="myForm"  action="{{route('departements.store')}}" method="POST" enctype="multipart/form-data" >
    @csrf 
        <label style="font-family: Georgia, serif"><h5>Entrez votre nom de departement</h5></label>
        <input type="text" name="nom" class="form-control" id="nom" placeholder="Exemple : département informatique" aria-describedby="aideUserName">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p style="color: red">*Champ obligatoire</p>
        @endforeach
        @endif
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