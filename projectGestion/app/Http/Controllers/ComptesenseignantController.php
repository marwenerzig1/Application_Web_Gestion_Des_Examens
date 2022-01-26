<?php

namespace App\Http\Controllers;

use App\Models\Compteenseignant ;
use App\Models\Compteetudiant;
use App\Models\Departement;
use App\Models\Matiere;
use Illuminate\Http\Request;

class ComptesenseignantController extends Controller
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
        $compte = new Compteenseignant;
        $comptes = $compte::all();
        return view('administrateur.compte_ensig',compact('comptes')) ;
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create2()
    {
        //
        $compte = new Compteenseignant;
        $comptes = $compte::all();
        return view('administrateur.compte_ensigenattente',compact('comptes')) ;
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
            "role"=>'required|string|max:159', 
            "departement"=>'required|string|max:159', 
            "login"=>'required|string|max:159', 
            "password"=>'required|string|min:6', 
            "passwordConfirmation"=>'required|string|min:6', 
            ]);

            $etudiants = Compteetudiant::query()
            ->get();
            foreach($etudiants as $etudiant){
                if($etudiant->login == $request->login){
                    session()->flash("flash_erreur","Login deja utilisé") ;
                    return back();
                }
            }

            try{
                if($request->password == $request->passwordConfirmation){
                $data = new Compteenseignant(); 
                $data->nom = $request->nom ;  
                $data->prenom = $request->prenom ; 
                $data->role = $request->role ; 
                $data->mode = "en attente" ; 
                $data->departement = $request->departement ; 
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store2(Request $request)
    {
        //
        $request->validate([
            "login"=>'required|string|max:159', 
            "password"=>'required|string|max:159', 
            ]);
            


            $comptesEns = Compteenseignant::query()
            ->get();
            $comptesEtu = Compteetudiant::query()
            ->get();
            
            foreach($comptesEns as $compte){
            if($compte->login == $request->login){
                    if($compte->password == $request->password){
                            if($compte->mode == "accepte"){
                                    $data = $request->input();
                                    session()->put('idd',(String)$compte->id);
                                    $request->session()->put('login_enseignant',$data['login']);
                                    return redirect('/enseignant/'.$compte->nom.'/'.$compte->prenom.'/'.$compte->role.'/'.$compte->departement) ;
                            }
                            else{
                                return redirect('reparation') ;
                            }                    
                    }
                    else{
                        session()->flash("flash_erreur","Mot de passe incorrecte !  ") ;
                        return back() ;
                    }
            }
            }

            foreach($comptesEtu as $comptee){
                if($comptee->login == $request->login){
                        if($comptee->password == $request->password){
                            if($comptee->mode == "accepte"){
                                $data = $request->input();
                                session()->put('id',(String)$comptee->id);
                                $request->session()->put('login',$data['login']);
                                return redirect('/etudiant/'.$comptee->nom.'/'.$comptee->prenom.'/'.$comptee->classe.'/'.$comptee->section)->with('success', 'Game Data is successfully updated');
                            }
                            else{
                                return redirect('reparation') ;
                            }  
                        }
                        else{
                            session()->flash("flash_erreur","Mot de passe incorrecte !  ") ;
                            return back() ;
                        }
                }
            }

            if(($request->login == "admin@admin.com")&&($request->password == "admin")){
                //return view('administrateur.departement');
                $data = $request->input();
                $request->session()->put('admin',$data['login']);
                return redirect('departement');
            }
            else{
                session()->flash("flash_erreur","s'il vous plaît écrivez vos coordonnées correctement !! votre password ou login incorect !! ") ;
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
        $compte = Compteenseignant::findOrFail($id); 
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
        $compte = Compteenseignant::findOrFail($id);

        $departements = Departement::query()
        ->get();

        return view('administrateur.modifier_compteensignant', compact('compte','departements'));
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
        $comptes = Compteenseignant::findOrFail($id);

        return view('enseignant.modifier_Compte_Enseignant', compact('comptes'));
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
        //     'nom','prenom','role','mode','departement','login','password'
        $request->validate([
            "nom"=>'required|string|max:159', 
            "prenom"=>'required|string|max:159', 
            "role"=>'required|string|max:159', 
            "departement"=>'required|string|max:159',  
            "login"=>'required|string|max:159',  
            "password"=>'required|string|min:6', 
        ]);
        $etudiants = Compteetudiant::query()
        ->get();
        foreach($etudiants as $etudiant){
            if($etudiant->login == $request->login){
                session()->flash("flash_erreur","Login deja utilisé") ;
                return back();
            }
        }
        try{
            $data = Compteenseignant::findOrFail($id);

            $enseignants = Compteenseignant::query()
            ->get();
            foreach($enseignants as $enseignant ){
                    if($data != $enseignant){
                        if(($enseignant->nom == $request->nom)&&($enseignant->prenom == $request->prenom)){
                            session()->flash("flash_erreur","nom et prenom deja utilisé") ;
                        return back();
                    }
                }
            }

            $matieres = Matiere::query()
            ->where('prof_Matiere', 'LIKE', "{$data->nom} {$data->prenom}")
            ->get();
            foreach ($matieres as $matiere){
                $matiere->prof_Matiere = $request->nom." ".$request->prenom ; 
                $matiere->save(); 
            }
            $matieres = Matiere::query()
            ->where('surveillant1', 'LIKE', "{$data->nom} {$data->prenom}")
            ->get();
            foreach ($matieres as $matiere){
                $matiere->surveillant1 = $request->nom." ".$request->prenom ; 
                $matiere->save(); 
            }
            $matieres = Matiere::query()
            ->where('surveillant2', 'LIKE', "{$data->nom} {$data->prenom}")
            ->get();
            foreach ($matieres as $matiere){
                $matiere->surveillant2 = $request->nom." ".$request->prenom ; 
                $matiere->save(); 
            }
            $data->nom = $request->nom ; 
            $data->prenom = $request->prenom ; 
            $data->role = $request->role ; 
            $data->mode = "accepte" ;  
            $data->departement = $request->departement ; 
            $data->login = $request->login ; 
            $data->password = $request->password ; 
            $data->save();
            session()->flash("flash_message","Modifie avec succes") ;
            return redirect('/comptesensignant')->with('success', 'Game Data is successfully updated');
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
        //     'nom','prenom','role','mode','departement','login','password'
        $request->validate([
            "nom"=>'required|string|max:159', 
            "prenom"=>'required|string|max:159',  
            "login"=>'required|string|max:159',  
            "password_ancien" => 'required|string|min:6',
            "password_nouveaux" => 'required|string|min:6',
            "confirmation_password" => 'required|string|min:6',
        ]);
        $etudiants = Compteetudiant::query()
        ->get();
        foreach($etudiants as $etudiant){
            if($etudiant->login == $request->login){
                session()->flash("flash_erreur","Login deja utilisé") ;
                return back();
            }
        }
        try{
            $data = Compteenseignant::findOrFail($id);
            if($request->password_ancien == $data->password){
            if($request->password_nouveaux == $request->confirmation_password){
            $enseignants = Compteenseignant::query()
            ->get();
            foreach($enseignants as $enseignant ){
                    if($data != $enseignant){
                        if(($enseignant->nom == $request->nom)&&($enseignant->prenom == $request->prenom)){
                            session()->flash("flash_erreur","nom et prenom deja utilisé") ;
                        return back();
                    }
                }
            }

            $matieres = Matiere::query()
            ->where('prof_Matiere', 'LIKE', "{$data->nom} {$data->prenom}")
            ->get();
            foreach ($matieres as $matiere){
                $matiere->prof_Matiere = $request->nom." ".$request->prenom ; 
                $matiere->save(); 
            }
            $matieres = Matiere::query()
            ->where('surveillant1', 'LIKE', "{$data->nom} {$data->prenom}")
            ->get();
            foreach ($matieres as $matiere){
                $matiere->surveillant1 = $request->nom." ".$request->prenom ; 
                $matiere->save(); 
            }
            $matieres = Matiere::query()
            ->where('surveillant2', 'LIKE', "{$data->nom} {$data->prenom}")
            ->get();
            foreach ($matieres as $matiere){
                $matiere->surveillant2 = $request->nom." ".$request->prenom ; 
                $matiere->save(); 
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
        $compte =  Compteenseignant::find($id);  

        $matieres1 = Matiere::query()
        ->where('prof_Matiere', 'LIKE', "{$compte->nom} {$compte->prenom}")
        ->get();

        foreach ($matieres1 as $matiere){
            session()->flash("flash_erreur","Suppression impossible !!! ") ;
            return back();
        }

        $matieres2 = Matiere::query()
        ->where('surveillant1', 'LIKE', "{$compte->nom} {$compte->prenom}")
        ->get();

        foreach ($matieres2 as $matiere){
            session()->flash("flash_erreur","Suppression impossible !!! ") ;
            return back();
        }

        $matieres3 = Matiere::query()
        ->where('surveillant2', 'LIKE', "{$compte->nom} {$compte->prenom}")
        ->get();

        foreach ($matieres3 as $matiere){
            session()->flash("flash_erreur","Suppression impossible !!! ") ;
            return back();
        }
        $compte->delete(); 
        session()->flash("flash_message","supprimer avec succes") ;
        return back();

    }
}
