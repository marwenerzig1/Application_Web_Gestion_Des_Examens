<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inscription Etudiant</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<style>
    body {
        font-family: "Lato", sans-serif;
    }



    .main-head{
        height: 150px;
        background: #FFF;
    
    }

    .sidenav {
        height: 100%;
        background-color: #000;
        overflow-x: hidden;
        padding-top: 20px;
    }


    .main {
        padding: 0px 10px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
    }

    @media screen and (max-width: 450px) {
        .login-form{
            margin-top: 10%;
        }

        .register-form{
            margin-top: 10%;
        }
    }

    @media screen and (min-width: 768px){
        .main{
            margin-left: 40%; 
        }

        .sidenav{
            width: 40%;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
        }

        .login-form{
            margin-top: 80%;
        }

        .register-form{
            margin-top: 20%;
        }
    }


    .login-main-text{
        margin-top: 20%;
        padding: 60px;
        color: #fff;
        position: relative;
        top: -180px; 
    }

    .login-main-text h2{
        font-weight: 300;
    }

    .btn-black{
        background-color: #000 !important;
        color: #fff;
    }

    #btn{
        position: relative; 
        top: 5px ; 
        left: 106px ; 
    }

    .main{
        position: relative; 
        top: 20px ; 
        left: -220px ; 
    }

    .title{
        position: relative;
        left: 10px ; 
    }

    .container{
        position: relative; 
        left: 450px ; 
    }

</style>


<nav>
    <div class="sidenav">
        <div class="login-main-text">
        <img src="{{ asset('images/tu1.png') }}" alt="tag" width="200px" height="160px">
           <h2>Application Gestion d'examen <br>Page d'inscription</h2>
           <p>Formulaire d'inscription étudiants.</p>  
           <a href="/connexion" class="text-white-50">return </a>
        </div>
     </div>
     <div class="main">
        <div class="row py-5 mt-4 align-items-center">

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


            <!-- Registeration Form -->
            <div class="col-md-7 col-lg-6 ml-auto">
                <form name="myForm"  action="{{route('etudiants22.store')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
    
                        <div class="title">
                            <h3 style="font-family: cursive">Formulaire d'inscription étudiants</h3>
                            <br>
                        </div>
                        <!-- First Name -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-user text-muted"></i>
                                </span>
                            </div>
                            <input id="firstName" type="text" name="prenom" placeholder="Prénom" class="form-control bg-white border-left-0 border-md">
                            @if ($errors->has('prenom'))
                            <span class="help-block">
                                <strong style="color: red">{{ $errors->first('prenom') }}</strong>
                            </span>
                            @endif
                        </div>
    
                        <!-- Last Name -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-user text-muted"></i>
                                </span>
                            </div>
                            <input id="lastName" type="text" name="nom" placeholder="Nom de famille" class="form-control bg-white border-left-0 border-md">
                            @if ($errors->has('nom'))
                            <span class="help-block">
                                <strong style="color: red">{{ $errors->first('nom') }}</strong>
                            </span>
                            @endif
                        </div>
    
                        <!-- Email Address -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-envelope text-muted"></i>
                                </span>
                            </div>
                            <input id="email" type="email" name="login" placeholder="Adresse e-mail" class="form-control bg-white border-left-0 border-md">
                            @if ($errors->has('login'))
                            <span class="help-block">
                                <strong style="color: red">{{ $errors->first('login') }}</strong>
                            </span>
                            @endif
                        </div>
    

                        <!--  matricule  -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-black-tie text-muted"></i>
                                </span>
                            </div>
                            <input id="email" type="text" name="matricule" placeholder="Matricule" class="form-control bg-white border-left-0 border-md">
                            @if ($errors->has('matricule'))
                            <span class="help-block">
                                <strong style="color: red">{{ $errors->first('matricule') }}</strong>
                            </span>
                            @endif
                        </div> 

                        <!--  classe  -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-black-tie text-muted"></i>
                                </span>
                            </div>
                            <input type="text" name="classe" placeholder="Classe" class="form-control bg-white border-left-0 border-md"><br>
                            @if ($errors->has('classe'))
                            <span class="help-block">
                                <strong style="color: red">{{ $errors->first('classe') }}</strong>
                            </span>
                            @endif
                        </div> 

                        <!--  Section  -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-black-tie text-muted"></i>
                                </span>
                            </div>
                            <input id="email" type="text" name="section" placeholder="Section" class="form-control bg-white border-left-0 border-md">
                            @if ($errors->has('section'))
                            <span class="help-block">
                                <strong style="color: red">{{ $errors->first('section') }}</strong>
                            </span>
                            @endif
                        </div> 
    
    
    
                        <!-- Job -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-black-tie text-muted"></i>
                                </span>
                            </div>
                            <select id="job" name="departement" class="form-control custom-select bg-white border-left-0 border-md">
                                <option value="">Choisissez votre département</option> 
                                @foreach ($departements as $departement)
                                <option value="{{$departement->nom_Departement}}">{{$departement->nom_Departement}}</option> 
                                @endforeach
                            </select>
                            @if ($errors->has('departement'))
                            <span class="help-block">
                                <strong style="color: red">{{ $errors->first('departement') }}</strong>
                            </span>
                            @endif
                        </div>
    
                        <!-- Password -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-lock text-muted"></i>
                                </span>
                            </div>
                            <input id="password" type="password" name="password" placeholder="Mot de passe" class="form-control bg-white border-left-0 border-md">
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong style="color: red">{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
    
                        <!-- Password Confirmation -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-lock text-muted"></i>
                                </span>
                            </div>
                            <input id="passwordConfirmation" type="password" name="passwordConfirmation" placeholder="Confirmation le mot de passe" class="form-control bg-white border-left-0 border-md">
                            @if ($errors->has('passwordConfirmation'))
                            <span class="help-block">
                                <strong style="color: red">{{ $errors->first('passwordConfirmation') }}</strong>
                            </span>
                            @endif
                        </div>
    
                        <!-- Submit Button -->
                        <div class="form-group col-lg-12 mx-auto mb-0">
                            <button type="submit" class="btn btn-primary btn-block py-2">
                                <span class="font-weight-bold">Créez votre compte</span>
                            </button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
    
         </div>
</nav>



</body>
</html>