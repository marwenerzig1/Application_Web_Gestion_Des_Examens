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
      <h1 class="liste">Liste des Matieres : </h1>
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
          </div>
      </div>
  </div> 


    @if($matieres->isNotEmpty())
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom Matiere</th>
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
                <td>
                    <a class="btn btn-primary btn-sm" href="http://127.0.0.1:8000/consulter_notesEtudiant/{{$matiere->nom_Matiere}}/{{$matiere->nom_Section}}/{{$matiere->nom_Classe}}">
                          <i class="fa fa-search"></i> Consulter notes etudiants 
                        </a>
                    <a class="btn btn-secondary btn-sm" href="http://127.0.0.1:8000/gestion_Etudiant/{{$matiere->nom_Matiere}}/{{$matiere->nom_Section}}/{{$matiere->nom_Classe}}">
                          <i class="fa fa-search"></i> Gérer les étudiants de chaque matière
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



<script>
</script>


@endsection