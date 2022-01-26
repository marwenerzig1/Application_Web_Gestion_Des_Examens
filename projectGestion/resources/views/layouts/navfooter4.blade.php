<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title','title inconnu')</title>
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
            .liste {
        padding-top: 50px;
        padding-right: 30px;
        padding-bottom: 50px;
        padding-left: 80px;
    }
    
    #btn1 {
        position: relative;
        top: -20px;
        left: 1200px;
    }
    
    .footer{
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height:100px;
    background:#ccc;
}
    
    .dropdown {
        position: relative;
        display: inline-block;
    }
    
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }
    
    .dropdown-content a:hover {
        background-color: #ddd;
    }
    
    .dropdown:hover .dropdown-content {
        display: block;
    }

    .pp{
        font-size: 20px ; 
        color: white ; 
        position: relative; 
        top:6px ; 
        left: 4px ;
    }
    
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }
    </style>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <a class="navbar-brand" href="#"> <img src="{{ asset('images/tu1.png') }}" alt="tag" width="100px" height="80px"> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @if (session('role') == "chef de departement")
                <li class="@yield('text1','nav-item active')" >
                    <a class="nav-link" href="/enseignant/{{session('nom')}}/{{session('prenom')}}/{{session('role')}}/{{session('departement')}}">Planification<span class="sr-only">(current)</span></a>
                </li>
                <li class="@yield('text2','nav-item')">
                    <a class="nav-link" href="/surveillant/{{session('nom')}}/{{session('prenom')}}">planification de surveillance<span class="sr-only">(current)</span></a>
                </li>
                <li class="@yield('text3','nav-item')">
                    <a class="nav-link" href="/notes/{{session('nom')}}/{{session('prenom')}}">Notes<span class="sr-only">(current)</span></a>
                </li>
                <li class="@yield('text4','nav-item')">
                    <a class="nav-link" href="/section">Section<span class="sr-only">(current)</span></a>
                </li>
                @else
                <li class="@yield('text1','nav-item active')" >
                    <a class="nav-link" href="/enseignant/{{session('nom')}}/{{session('prenom')}}/{{session('role')}}/{{session('departement')}}">Planification<span class="sr-only">(current)</span></a>
                </li>
                <li class="@yield('text2','nav-item')">
                    <a class="nav-link" href="/surveillant/{{session('nom')}}/{{session('prenom')}}">planification de surveillance<span class="sr-only">(current)</span></a>
                </li>
                <li class="@yield('text3','nav-item')">
                    <a class="nav-link" href="/notes/{{session('nom')}}/{{session('prenom')}}">Notes<span class="sr-only">(current)</span></a>
                </li>
                @endif
            </ul>

            
            <div class="dropdown" >
                <div class="form-inline my-2 my-lg-0" >
                <img src="{{ asset('images/icon.png') }}" alt="tag" width="50px" height="50px">
                @yield('content2')
                </div>
                <div class="dropdown-content">
                    <a href="/gerer_compte_enseignant/{{session('idd')}}}}">Gérer votre compte</a>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    @yield('br')

    <footer class="bg-dark text-center text-white">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2021 Copyright:
            <a class="text-white" href="#">Gestion-Examens.com</a>
        </div>
    </footer>

</body>
</html>