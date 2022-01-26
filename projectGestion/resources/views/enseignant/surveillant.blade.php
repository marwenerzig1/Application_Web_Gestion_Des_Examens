@extends('layouts.navfooter4') 
@section('title','Planification des examens') 
@section('text1','nav-item')
@section('text2','nav-item active')
@section('text3','nav-item') 
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
    <h1 class="liste">planification de surveillance : </h1> 
    <a href="/deconnexion2" class="aa"><img src="{{ asset('images/logout.png') }}" alt="tag" width="70px" height="60px"></a>
    </div>
    @section('content2')
    <p class="pp"> {{session('nom')}} {{session('prenom')}}</p>
    @endsection
    @if($surveillantes->isNotEmpty())
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom Matiere</th>
                <th scope="col">Nom Classe</th>
                <th scope="col">Classe</th>
                <th scope="col">Heure</th> 
                <th scope="col">Date</th>  
            </tr>
        </thead>
        <tbody>
            @foreach ($surveillantes as $surveillant)
                <th scope="row">{{$surveillant->id}}</th>
                <td>{{$surveillant->nom_Matiere}}</td>
                <td>{{$surveillant->nom_Classe}}</td>
                <td>{{$surveillant->classe}}</td>
                <td>{{$surveillant->heure}}</td>
                <td>{{$surveillant->date}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>  <br> <br> <br> <br> <br> <br>
            @else
            <br> 
            <h4 class="d">Il n'y a aucun planification de surveillance ! </h4> 
            @endif 
</article>


@endsection