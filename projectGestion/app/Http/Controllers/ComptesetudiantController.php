<?php

namespace App\Http\Controllers;

use App\Models\Compteetudiant ; 
use App\Models\Compteenseignant ;
use App\Models\Departement;
use App\Models\Etudiants;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password ;

class ComptesetudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $compte = new Compteetudiant;
        $comptes = $compte::all();
        return view('administrateur.compte_etudiant',compact('comptes')) ;
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create2()
    {
        //
        $compte = new Compteetudiant;
        $comptes = $compte::all();
        return view('administrateur.compte_etudiantenattente',compact('comptes')) ;
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "nom"=>'required|string|max:159', 
            "prenom"=>'required|string|max:159', 
            "matricule"=>'required|string|max:159', 
            "departement"=>'required|string|max:159', 
            "section"=>'required|string|max:159', 
            "classe"=>'required|string|max:159', 
            "login"=>'required|string|max:159', 
            "password"=>'required|string|min:6', 
            'passwordConfirmation'=>'required|string|min:6', 
            ]);

            $enseignants = Compteenseignant::query()
            ->get();
            foreach($enseignants as $enseignant){
                if($enseignant->login == $request->login){
                    session()->flash("flash_erreur","Login deja utilisé") ;
                    return back();
                }
            }

            try{
                if($request->password == $request->passwordConfirmation){
                $data = new Compteetudiant(); 
                $data->nom = $request->nom ;  
                $data->prenom = $request->prenom ; 
                $data->classe = $request->classe ; 
                $data->matricule = $request->matricule ; 
                $data->mode = "en attente" ; 
                $data->departement = $request->departement ; 
                $data->section = $request->section ; 
                $data->login = $request->login ; 
                $data->password = $request->password ; 
                $data->save();
                session()->flash("flash_message","inscription avec succes !!  votre demande envoyée avec succes !! on va repondre pendant 15 jours !!! ") ;
                return back();
                }
                else{
                    session()->flash("flash_erreur","s'il vous plaît écrivez vos coordonnées correctement") ;
                    return back();
                }
            }
            catch(\Illuminate\Database\QueryException $e){
                session()->flash("flash_erreur","Login deja utilisé") ;
                return back(); 
            }   
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $compte = Compteetudiant::findOrFail($id); 
        $compte->mode = "accepte";
        $compte->save();
        session()->flash("flash_message","Compte accepté avec succes") ;
        return back(); 
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit2($id)
    {
        //
        $compte = Compteetudiant::findOrFail($id); 

        $departements = Departement::query()
        ->get(); 

        return view('administrateur.modifier_compte', compact('compte','departements'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit3($id)
    {
        //

        $comptes = Compteetudiant::findOrFail($id); 

        return view('etudiant.modifier_Compte_Etudiant', compact('comptes'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //'nom','prenom','matricule','mode','departement','section','login','password'
        $request->validate([
            "nom"=>'required|string|max:159', 
            "prenom"=>'required|string|max:159', 
            "matricule"=>'required|string|max:159', 
            "classe"=>'required|string|max:159', 
            "departement"=>'required|string|max:159',  
            "section"=>'required|string|max:159',  
            "login"=>'required|string|max:159',  
            "password" => 'required|string|min:6'
        ]);
        $enseignants = Compteenseignant::query()
        ->get();
        foreach($enseignants as $enseignant){
            if($enseignant->login == $request->login){
                session()->flash("flash_erreur","Login deja utilisé") ;
                return back();
            }
        }
        try{
            $data = Compteetudiant::findOrFail($id);

            $etudiantss = Compteetudiant::query()
            ->get();
            foreach($etudiantss as $etudiant){
                    if($data != $etudiant){
                        if(($etudiant->nom == $request->nom)&&($etudiant->prenom == $request->prenom)){
                            session()->flash("flash_erreur","nom et prenom deja utilisé") ;
                        return back();
                    }
                }
            }
            $etudiants = Etudiants::query()
            ->where('nom', 'LIKE', "{$data->nom}")
            ->where('prenom', 'LIKE', "{$data->prenom}")
            ->get();
            foreach ($etudiants as $etudiant){
                $etudiant->nom = $request->nom ; 
                $etudiant->prenom = $request->prenom ; 
                $etudiant->save(); 
            }
            $data->nom = $request->nom ; 
            $data->prenom = $request->prenom ; 
            $data->matricule = $request->matricule ; 
            $data->classe = $request->classe ; 
            $data->departement = $request->departement ; 
            $data->section = $request->section ; 
            $data->login = $request->login ; 
            $data->mode = "accepte" ; 
            $data->password = $request->password ; 
            $data->save();
            session()->flash("flash_message","Modifie avec succes") ;
            return redirect('/comptesetudiant')->with('success', 'Game Data is successfully updated');
        }
        catch(\Illuminate\Database\QueryException $e){
            session()->flash("flash_erreur","Login deja utilisé") ;
            return back(); 
        }  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update5(Request $request, $id)
    {

        $request->validate([
            "nom"=>'required|string|max:159', 
            "prenom"=>'required|string|max:159',  
            "login"=>'required|string|max:159',  
            "password_ancien" => 'required|string|min:6',
            "password_nouveaux" => 'required|string|min:6',
            "confirmation_password" => 'required|string|min:6',
        ]);
        $enseignants = Compteenseignant::query()
        ->get();
        foreach($enseignants as $enseignant){
            if($enseignant->login == $request->login){
                session()->flash("flash_erreur","Login deja utilisé") ;
                return back();
            }
        }
        try{
            $data = Compteetudiant::findOrFail($id);
            if($request->password_ancien == $data->password){
            if($request->password_nouveaux == $request->confirmation_password){
            $etudiantss = Compteetudiant::query()
            ->get();
            foreach($etudiantss as $etudiant){
                    if($data != $etudiant){
                        if(($etudiant->nom == $request->nom)&&($etudiant->prenom == $request->prenom)){
                            session()->flash("flash_erreur","nom et prenom deja utilisé") ;
                        return back();
                    }
                }
            }
            $etudiants = Etudiants::query()
            ->where('nom', 'LIKE', "{$data->nom}")
            ->where('prenom', 'LIKE', "{$data->prenom}")
            ->get();
            foreach ($etudiants as $etudiant){
                $etudiant->nom = $request->nom ; 
                $etudiant->prenom = $request->prenom ; 
                $etudiant->save(); 
            }
            $data->nom = $request->nom ; 
            $data->prenom = $request->prenom ; 
            $data->login = $request->login ; 
            $data->password = $request->password_nouveaux ; 
            $data->save();
            session()->flash("flash_message","Modifie avec succes") ;
            return back(); 
        } 
            else{
                session()->flash("flash_erreur","mot de passe incorrect :( ") ;
                return back(); 
            }
        }
        else{
            session()->flash("flash_erreur","Ancien mot de passe incorrect :( ") ;
            return back(); 
        }
        }
        catch(\Illuminate\Database\QueryException $e){
            session()->flash("flash_erreur","Login deja utilisé") ;
            return back(); 
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $compte =  Compteetudiant::find($id);  

        $etudiants = Etudiants::query()
        ->where('nom', 'LIKE', "{$compte->nom}")
        ->where('prenom', 'LIKE', "{$compte->prenom}")
        ->where('nom_Section', 'LIKE', "{$compte->section}")
        ->get();

        foreach ($etudiants as $etudiant){
            session()->flash("flash_erreur","Suppression impossible !!! ") ;
            return back();
        }

        $compte->delete(); 
        session()->flash("flash_message","supprimer avec succes") ;
        return back();
    }
}
