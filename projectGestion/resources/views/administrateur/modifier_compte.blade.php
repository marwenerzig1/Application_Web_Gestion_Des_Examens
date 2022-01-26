<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Modifier Compte Etudiant </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

    <!-- Bootstrap core CSS -->





    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
            body {
        height: 100%;
        }

        body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
        }

        .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
        }

        .form-signin input[type="text"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        }

        #tt{
            position: relative;
            left: -130px ; 
        }

        #tt1{
            position: relative;
            left: -120px ; 
        }

        #tt2{
            position: relative;
            left: -64px ; 
        }

        #tt3{
            position: relative;
            left: -100px ; 
        }

        #tt4{
            position: relative;
            left: -120px ; 
        }

        #tt5{
            position: relative;
            left: -125px ; 
        }

        #tt6{
            position: relative;
            left: -70px ; 
        }

        #tt7{
            position: relative;
            left: -65px ; 
        }
        #tt8{
            position: relative;
            left: -123px ; 
        }
        #btn1{
            position: relative;
            top: 10px ; 
        }

    </style>

  </head>
  <body class="text-center">

<main class="form-signin"> 
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
<form name="myForm" action="{{route('comptes2.update', $compte->id )}}" method="POST" enctype="multipart/form-data" >
    @csrf
    @method('PATCH')
    <img class="mb-4" src="{{ asset('images/modifier.png') }}"  alt="" width="100" height="100">
    <h1 class="h3 mb-3 fw-normal" style="color: rgb(8, 24, 49)">Modifier Compte Etudiant</h1> <br>

      <label id="tt">Nom : </label>
      <input type="text" name="nom" class="form-control" value="{{$compte->nom}}" id="floatingInput" > 
      @if ($errors->has('nom'))
      <span class="help-block">
          <strong style="color: red">{{ $errors->first('nom') }}</strong>
      </span>
      @endif 
      <br> 
      <label id="tt1">Prenom : </label>
      <input type="text" name="prenom" class="form-control" value="{{$compte->prenom}}" id="floatingInput" >
      @if ($errors->has('prenom'))
      <span class="help-block">
          <strong style="color: red">{{ $errors->first('prenom') }}</strong>
      </span>
      @endif 
      <br> 
      <label id="tt2">Matricule carte etudiant : </label>
      <input type="text" name="matricule" class="form-control" value="{{$compte->matricule}}" id="floatingInput" >
      @if ($errors->has('matricule'))
      <span class="help-block">
          <strong style="color: red">{{ $errors->first('matricule') }}</strong>
      </span>
      @endif 
      <br>  
      <label id="tt8">Classe : </label>
      <input type="text" name="classe" class="form-control" value="{{$compte->classe}}" id="floatingInput" > 
      @if ($errors->has('classe'))
      <span class="help-block">
          <strong style="color: red">{{ $errors->first('classe') }}</strong>
      </span>
      @endif 
      <br>  
      <label id="tt3">Departement : </label>
      <!-- <input type="text" name="departement" class="form-control" value="{{$compte->departement}}" id="floatingInput" > -->
      <select name="departement" class="form-control" >
        <option value="{{$compte->departement}}">{{$compte->departement}}</option>
        @foreach ($departements as $departement)
            @if ($departement->nom_Departement != $compte->departement)
                <option value="{{$departement->nom_Departement}}">{{$departement->nom_Departement}}</option>
            @endif
        @endforeach
        </select>
      @if ($errors->has('departement'))
      <span class="help-block">
          <strong style="color: red">{{ $errors->first('departement') }}</strong>
      </span>
      @endif 
      <br> 
      <label id="tt4">Section : </label>
      <input type="text" name="section" class="form-control" value="{{$compte->section}}" id="floatingInput" > 
      @if ($errors->has('section'))
      <span class="help-block">
          <strong style="color: red">{{ $errors->first('section') }}</strong>
      </span>
      @endif 
      <br> 
      <label id="tt5">Login : </label>
      <input type="email" name="login" class="form-control" value="{{$compte->login}}" id="floatingInput" > 
      @if ($errors->has('login'))
      <span class="help-block">
          <strong style="color: red">{{ $errors->first('login') }}</strong>
      </span>
      @endif 
      <br> 
      <label id="tt7">Mot de passe : </label>
      <input type="text" name="password" class="form-control" value="{{$compte->password}}" id="floatingInput" >
      @if ($errors->has('password'))
      <span class="help-block">
          <strong style="color: red">{{ $errors->first('password') }}</strong>
      </span>
      @endif 
      <br> 
<br>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Modifier</button>
</form>
<a class="w-100 btn btn-lg btn-primary" href="/comptesetudiant" id="btn1">Annuler</a>
</main>
  </body>
</html>