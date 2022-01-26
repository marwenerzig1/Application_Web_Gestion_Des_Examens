<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Modifier Section</title>

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
            left: -80px ; 
        }

    </style>

  </head>
<main class="form-signin">
  <body class="text-center">
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
<form name="myForm" action="{{route('matieres.update', $matiere->id )}}" method="POST" enctype="multipart/form-data" >
    @csrf
    @method('PATCH')
    <img class="mb-4" src="{{ asset('images/modifier.png') }}"  alt="" width="100" height="100">
    <h1 class="h3 mb-3 fw-normal" style="color: rgb(8, 24, 49)">Modifier Matiere</h1> <br>

      <label id="tt">Nom Matiere : </label>
      <input type="text" name="nom" class="form-control" value="{{$matiere->nom_Matiere}}" id="floatingInput" > <br>
      @if ($errors->has('nom'))
      <span class="help-block">
          <strong>{{ $errors->first('nom') }}</strong>
      </span><br>
      @endif 

      <label id="tt">Nom Classe : </label>
      <input type="text" name="classe" class="form-control" value="{{$matiere->nom_Classe}}" id="floatingInput" > <br>
      @if ($errors->has('classe'))
      <span class="help-block">
          <strong>{{ $errors->first('classe') }}</strong>
      </span><br>
      @endif 

      <label id="tt">Enseignant : </label>
      <!-- <input type="text" name="enseignant" class="form-control" value="{{$matiere->prof_Matiere}}" id="floatingInput" >  --> 
      <select type="text" name="enseignant" class="form-control" id="floatingInput" > 
        <option value="{{$matiere->prof_Matiere}}">{{$matiere->prof_Matiere}}</option>
        @foreach ($comptes as $compte)
          @if ($compte->mode == "accepte")
            @if ( $matiere->prof_Matiere != ($compte->nom." ".$compte->prenom) )
              <option value="{{$compte->nom}} {{$compte->prenom}}">{{$compte->nom}} {{$compte->prenom}}</option>
            @endif
          @endif
        @endforeach
      </select> <br>
      @if ($errors->has('enseignant'))
      <span class="help-block">
          <strong>{{ $errors->first('enseignant') }}</strong>
      </span><br>
      @endif

      <label id="tt">Surveillant 1 : </label>
      <!-- <input type="text" name="surveillant1" class="form-control" value="{{$matiere->surveillant1}}" id="floatingInput" > <br> -->
      <select type="text" name="surveillant1" class="form-control" id="floatingInput" > 
        <option value="{{$matiere->surveillant1}}">{{$matiere->surveillant1}}</option>
        @foreach ($comptes as $compte)
          @if ($compte->mode == "accepte")
            @if ( $matiere->surveillant1 != ($compte->nom." ".$compte->prenom) )
              <option value="{{$compte->nom}} {{$compte->prenom}}">{{$compte->nom}} {{$compte->prenom}}</option>
            @endif
          @endif
        @endforeach
      </select> <br>
      @if ($errors->has('surveillant1'))
      <span class="help-block">
          <strong>{{ $errors->first('surveillant1') }}</strong>
      </span><br>
      @endif

      <label id="tt">Surveillant 2 : </label>
      <!-- <input type="text" name="surveillant2" class="form-control" value="{{$matiere->surveillant2}}" id="floatingInput" > <br> -->
      <select type="text" name="surveillant2" class="form-control" id="floatingInput" > 
        <option value="{{$matiere->surveillant2}}">{{$matiere->surveillant2}}</option>
        @foreach ($comptes as $compte)
          @if ($compte->mode == "accepte")
            @if ( $matiere->surveillant2 != ($compte->nom." ".$compte->prenom) )
              <option value="{{$compte->nom}} {{$compte->prenom}}">{{$compte->nom}} {{$compte->prenom}}</option>
            @endif
          @endif
        @endforeach
      </select> <br>
      @if ($errors->has('surveillant2'))
      <span class="help-block">
          <strong>{{ $errors->first('surveillant2') }}</strong>
      </span><br>
      @endif

      <label id="tt">Classe : </label>
      <input type="text" name="classe2" class="form-control" value="{{$matiere->classe}}" id="floatingInput" > <br>
      @if ($errors->has('classe2'))
      <span class="help-block">
          <strong>{{ $errors->first('classe2') }}</strong>
      </span><br>
      @endif

      <label id="tt">Heure : </label>
      <!-- <input type="time" name="heure" class="form-control" value="{{$matiere->heure}}" min="08:30" max="18:00" id="floatingInput" > <br> -->
      <select type="time" name="heure" class="form-control" id="floatingInput" >
        <option value="{{$matiere->heure}}">{{$matiere->heure}}</option>
        @if ($matiere->heure != "08:30")
          <option value="08:30">08:30</option>
        @endif
        @if ($matiere->heure != "10:05")
          <option value="10:05">10:05</option>
        @endif
        @if ($matiere->heure != "11:40")
          <option value="11:40">11:40</option>
        @endif
        @if ($matiere->heure != "13:15")
          <option value="13:15">13:15</option>
        @endif
        @if ($matiere->heure != "14:50")
          <option value="14:50">14:50</option>
        @endif
        @if ($matiere->heure != "16:25")
          <option value="16:25">16:25</option>
        @endif
      </select> <br> 
      @if ($errors->has('heure'))
      <span class="help-block">
          <strong>{{ $errors->first('heure') }}</strong>
      </span><br>
      @endif

      <label id="tt">Date : </label>
      <input type="date" name="date" class="form-control"  min="2022-01-17" max="2022-12-30" value="{{$matiere->date}}" id="floatingInput" > <br>
      @if ($errors->has('date'))
      <span class="help-block">
          <strong>{{ $errors->first('date') }}</strong>
      </span><br>
      @endif


     

    <button class="w-100 btn btn-lg btn-primary" type="submit">Modifier</button>
</form>
</main>


    
  </body>
</html>