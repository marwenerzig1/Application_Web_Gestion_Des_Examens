@extends('layouts.navfooter4') 
@section('title','Planification des examens') 
@section('text1','nav-item')
@section('text2','nav-item')
@section('text3','nav-item active') 
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
    <h1 class="liste">Notes de examen {{session('nom_matiere')}} : </h1> 
    <a href="/deconnexion2" class="aa"><img src="{{ asset('images/logout.png') }}" alt="tag" width="70px" height="60px"></a>
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
            </div>
        </div>
    </div> 
    @section('content2')
    <p class="pp"> {{session('nom')}} {{session('prenom')}}</p>
    @endsection
    @if($notess->isNotEmpty())
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Note</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notess as $note)
            <tr>
                <th scope="row">{{$note->id}}</th>
                <td>{{$note->nom}}</td>
                <td>{{$note->prenom}}</td>
                <form name="myForm" action="{{route('notes.update2', $note->id )}}" method="POST" enctype="multipart/form-data" >
                  @csrf
                  @method('PATCH')
                  <td><input type="number" min="0" max="20" name="note" value="{{$note->note}}"></td>
                  <td><button class="btn btn-dark btn-sm" type="submit" id="submit" ><i class="fa fa-edit"></i> Valider</button></td>
                  </form>
            </tr>
            @endforeach
        </tbody>
    </table>  <br> <br> <br> <br> <br> <br>
            @else
            <br> 
            <h4 class="d">Il n'y a aucun etudiant ! </h4> 
            @endif 
</article>


@endsection