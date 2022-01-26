@extends('layouts.navfooter3') 
@section('title','Gerer Compte Etudiant') 
@section('text1','nav-item')
@section('text2','nav-item')
@section('text3','nav-item') 
@section('content2')
<p class="pp"> {{session('nom')}} {{session('prenom')}}</p>
@endsection
@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-12 sidebar_heading text-center mb-2">
        <br><br>
    <h1 class="h3  mb-0 folot-left headerTitle">GERER VOTRE COMPTE</h1>
    </div>
    </div>
    </div>
    <div class="container">
    <div class="row no-gutters">
    <div class="col-lg-6 iframe-full-height-wrap ">
    <img class="for-contac-image" id="contact" width="85%" height="80%" src="{{ asset('images/contact.png') }}" alt="contact">
    </div>
    <div class="col-lg-6 for-send-message px-4 px-xl-5  box-shadow-sm">

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


        <br>
        <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
    <form name="myForm" action="{{route('modifiercompteetudiant.update5', $comptes->id )}}"  method="POST" enctype="multipart/form-data" >
    @csrf
    @method('PATCH')
            <label>Votre nom</label>
            <input class="form-control name" name="nom" type="text" value="{{$comptes->nom}}">
            @if ($errors->has('nom'))
            <span class="help-block">
                <strong style="color: red">{{ $errors->first('nom') }}</strong>
            </span>
            @endif
        </div>
        </div>

        <div class="col-sm-6">
        <div class="form-group">
                <label>Votre prenom</label>
                <input class="form-control subject" type="text" name="prenom" value="{{$comptes->prenom}}"  >
                @if ($errors->has('prenom'))
                <span class="help-block">
                    <strong style="color: red">{{ $errors->first('prenom') }}</strong>
                </span>
                @endif
        </div>
        </div>

        <div class="col-sm-6">
        <div class="form-group">
            <label for="cf-email">Adresse e-mail</label>
            <input class="form-control email" name="login" type="email" value="{{$comptes->login}}"  >
            @if ($errors->has('login'))
            <span class="help-block">
                <strong style="color: red">{{ $errors->first('login') }}</strong>
            </span>
            @endif
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
            <label>Ancien Mot de passe</label>
            <input class="form-control mobile_number" type="text" name="password_ancien" placeholder="Ancien mot de passe" >
            @if ($errors->has('password_ancien'))
            <span class="help-block">
                <strong style="color: red">{{ $errors->first('password_ancien') }}</strong>
            </span>
            @endif
        </div>
        </div>

        <div class="col-sm-6">
        <div class="form-group">
            <label>Mot de passe </label>
            <input class="form-control mobile_number" type="password" name="password_nouveaux" placeholder="Nouveaux mot de passe" >
            @if ($errors->has('password_nouveaux'))
            <span class="help-block">
                <strong style="color: red">{{ $errors->first('password_nouveaux') }}</strong>
            </span>
            @endif
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
            <label>Confirmation Mot de passe</label>
            <input class="form-control mobile_number" type="password" name="confirmation_password" placeholder="confirmation mot de passe" >
            @if ($errors->has('confirmation_password'))
            <span class="help-block">
                <strong style="color: red">{{ $errors->first('confirmation_password') }}</strong>
            </span>
            @endif
        </div>
        </div>



        </div>
        <button class="btn btn-primary" type="submit" id="submit">Modifier votre compte</button>
        </div>
        </div>
        </div>
    </form>
@endsection

@section('br')
    <br><br><br>
    <br><br><br>
@endsection