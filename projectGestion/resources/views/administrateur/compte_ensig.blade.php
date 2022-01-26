@extends('layouts.navfooter') 
@section('title','Compte utilisateur') 
@section('text1','nav-item')
@section('text2','dropdown')
@section('text3','dropdown active')

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
    <h1 class="liste">Liste des comptes des enseignants : </h1>
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
    @if($comptes->isNotEmpty())
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Role</th> 
                <th scope="col">Departement</th>  
                <th scope="col">Login</th> 
                <th scope="col">Mot de passe</th> 
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comptes as $compte)
            @if($compte->mode == "accepte")
            @if($compte->role == "chef de departement")
            <tr style="background-color: rgb(57, 230, 207)">
            @else
            <tr>
            @endif
                <th scope="row">{{$compte->id}}</th>
                <td>{{$compte->nom}}</td>
                <td>{{$compte->prenom}}</td>
                <td>{{$compte->role}}</td>
                <td>{{$compte->departement}}</td>
                <td>{{$compte->login}}</td>
                <td>{{$compte->password}}</td>
                <td>
                    <a class="btn btn-dark btn-sm" href="modifier_compteensignant/{{ $compte->id }}">
                      <i class="fa fa-edit"></i> Modifier
                      </a>
                    <a class="btn btn-danger btn-sm" href="/click_deletecompteensignant/{{$compte->id}}" >
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
            <h4 class="d">Il n'y a aucun compte ! </h4> 
            @endif 
</article>


@endsection