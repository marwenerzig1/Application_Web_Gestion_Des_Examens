
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
<form name="myForm" action="{{route('sections.update', $section->id )}}" method="POST" enctype="multipart/form-data" >
    @csrf
    @method('PATCH')
    <img class="mb-4" src="{{ asset('images/modifier.png') }}"  alt="" width="100" height="100">
    <h1 class="h3 mb-3 fw-normal" style="color: rgb(8, 24, 49)">Modifier Section</h1> <br>

      <label id="tt">Nom Section : </label>
      <input type="text" name="nom" class="form-control" value="{{$section->nom_Section}}" id="floatingInput" > 
      @if ($errors->has('nom'))
      <span class="help-block">
          <strong style="color: red">{{ $errors->first('nom') }}</strong>
      </span>
      @endif
      <br> 

      <label id="tt">Abrévation Section : </label>
      <input type="text" name="abrevation" class="form-control" value="{{$section->abrevation}}" id="floatingInput" > 
      @if ($errors->has('abrevation'))
      <span class="help-block">
          <strong style="color: red">{{ $errors->first('abrevation') }}</strong>
      </span>
      @endif
      <br> 
      
      <label id="tt">Departement : </label>
      <input type="text" name="departement" class="form-control" value="{{$section->departement}}" id="floatingInput" readonly> 
      @if ($errors->has('departement'))
      <span class="help-block">
          <strong style="color: red">{{ $errors->first('departement') }}</strong>
      </span>
      @endif
      <br> 

  <br><br>
  </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Modifier</button>
</form>
</main>


    
  </body>
</html>