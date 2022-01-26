<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matiere ;
use App\Models\Section ;
use App\Models\Compteenseignant ;
use App\Models\Etudiants;

class MatieresController extends Controller
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
            "section"=>'required|string|max:159', 
            "classe"=>'required|string|max:159', 
            "enseignant"=>'required|string|max:159', 
            "surveillant1"=>'required|string|max:159', 
            "surveillant2"=>'required|string|max:159', 
            "classe2"=>'required|string|max:159', 
            "heure"=>'required|string|max:159', 
            "date"=>'required|string|max:159', 
        ]);

        $matieres = Matiere::query()
        ->get();
        foreach($matieres as $matiere)
        {
            if(($matiere->heure == $request->heure) && ($matiere->date == $request->date) && ($matiere->classe == $request->classe2))
            {
                session()->flash("flash_erreur","la salle a été réservée pour cette heure et cette date") ;
                return back();
            }
            if( ($matiere->heure == $request->heure) && ($matiere->date == $request->date)  ) 
            {      
                if( ($matiere->surveillant1 == $request->surveillant1)||($matiere->surveillant1 == $request->surveillant2)||($matiere->surveillant2 == $request->surveillant1)||($matiere->surveillant2 == $request->surveillant2) )
                {
                        session()->flash("flash_erreur","le surveillant a été réservée pour cette heure et cette date") ;
                        return back();
                }
            }
            if($matiere->nom_Classe == $request->classe ){
                if( $matiere->nom_Matiere == $request->nom ){
                    session()->flash("flash_erreur","Matiere deja existé") ;
                    return back(); 
                }
            }

        }


        try{
            if($request->surveillant1 != $request->surveillant2 ){ 
                $data = new Matiere(); 
                $data->nom_Matiere = $request->nom ; 
                $data->nom_Section = $request->section ; 
                $data->nom_Classe = $request->classe ; 
                $data->prof_Matiere = $request->enseignant ; 
                $data->surveillant1 = $request->surveillant1 ; 
                $data->surveillant2 = $request->surveillant2 ; 
                $data->classe = $request->classe2 ; 
                $data->heure = $request->heure ; 
                $data->date = $request->date ; 
                $data->save();
                session()->flash("flash_message","Ajouté avec succes") ;
                return back();
            }
            else{
                session()->flash("flash_erreur","il faut que surveillant 1 different a surveillant 2  ") ;
                return back(); 
            }
        }
        catch(\Illuminate\Database\QueryException $e){
            session()->flash("flash_erreur","Nom Matiere deja utilisé") ;
            return back(); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $section , $nom_Classe )
    {
        //
        session(['section' => $section ]);
        session(['classe' => $nom_Classe ]);
        $matieres = Matiere::query()
        ->where('nom_Classe', 'LIKE', "{$nom_Classe}")
        ->get();

        $sections = Section::query()
        ->where('nom_Section' , 'LIKE' , "{$section}")
        ->get(); 

        foreach ($sections as $section){
            $tt = $section->departement ; 
            break ; 
        }

        $comptes = Compteenseignant::query()
        ->where('departement', 'LIKE', "{$tt}")
        ->get();

        return view('chefdepartement.planing', compact('matieres','comptes')); 
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show2( $section , $nom_Classe )
    {
        //
        $matieres = Matiere::query()
        ->where('nom_Classe', 'LIKE', "{$nom_Classe}")
        ->get();
        return view('chefdepartement.note', compact('matieres')); 
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */       
    public function show3( $nom , $prenom , $classe , $section )
    {
        //
        $matieress = Matiere::query()
        ->where('nom_Classe', 'LIKE', "{$classe}")
        ->where('nom_Section', 'LIKE', "{$section}")
        ->get();

        session()->put('nom',$nom);
        session()->put('prenom',$prenom);
        session()->put('classe',$classe);
        session()->put('section',$section);

        return view('etudiant.etudiant', compact('matieress')); 
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */       
    public function show4( $nom , $prenom , $role , $departement)
    {
        //

        $result = $nom." ".$prenom ; 

        $matieresss = Matiere::query()
        ->where('prof_Matiere', 'LIKE', "{$result}")
        ->get();

        session()->put('nom',$nom);
        session()->put('prenom',$prenom);
        session()->put('role',$role);
        session()->put('departement',$departement);

        return view('enseignant.enseignant', compact('matieresss')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */       
    public function show5( $nom , $prenom)
    {
        //

        $result = $nom." ".$prenom ; 

        $surveillantes = Matiere::query()
        ->where('surveillant1', 'LIKE', "{$result}")
        ->orwhere('surveillant2', 'LIKE', "{$result}")
        ->get();

        session()->put('nom',$nom);
        session()->put('prenom',$prenom);

        return view('enseignant.surveillant', compact('surveillantes')); 
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */       
    public function show6( $nom , $prenom)
    {
        //

        $result = $nom." ".$prenom ; 

        $notes = Matiere::query()
        ->where('prof_Matiere', 'LIKE', "{$result}")
        ->get();

        session()->put('nom',$nom);
        session()->put('prenom',$prenom);

        return view('enseignant.notes', compact('notes')); 
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
        $matiere = Matiere::findOrFail($id);
        $compte = new Compteenseignant;
        $comptes = $compte::all();
        return view('chefdepartement.modifier_planing', compact('matiere','comptes'));
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
        //
        $request->validate([
            "nom"=>'required|string|max:159', 
            "classe"=>'required|string|max:159', 
            "enseignant"=>'required|string|max:159', 
            "surveillant1"=>'required|string|max:159', 
            "surveillant2"=>'required|string|max:159', 
            "classe2"=>'required|string|max:159', 
            "heure"=>'required|string|max:159', 
            "date"=>'required|string|max:159', 
        ]);

        $matieres = Matiere::query()
        ->get();
        $data = Matiere::findOrFail($id);
        foreach($matieres as $matiere)
        {
            if(($matiere->heure == $request->heure) && ($matiere->date == $request->date) && ($matiere->classe == $request->classe2))
            {
                if($matiere != $data ){
                session()->flash("flash_erreur","la salle a été réservée pour cette heure et cette date") ;
                return back();
                }
            }
            if( ($matiere->heure == $request->heure) && ($matiere->date == $request->date)  ) 
            {      
                if( ($matiere->surveillant1 == $request->surveillant1)||($matiere->surveillant1 == $request->surveillant2)||($matiere->surveillant2 == $request->surveillant1)||($matiere->surveillant2 == $request->surveillant2) )
                {
                    if($matiere != $data ){
                        session()->flash("flash_erreur","le surveillant a été réservée pour cette heure et cette date") ;
                        return back();
                        }
                }
            }
            if($matiere != $data){
                if($matiere->nom_Classe == $request->classe ){
                    if( $matiere->nom_Matiere == $request->nom ){
                        session()->flash("flash_erreur","Matiere deja existé") ;
                        return back(); 
                    }
                }
            }

        }

            try{
                if($request->surveillant1 != $request->surveillant2 ){
                $data = Matiere::findOrFail($id);
                $etudiants = Etudiants::query()
                ->where('matiere', 'LIKE', "{$data->nom_Matiere}")
                ->get();
                foreach ($etudiants as $etudiant){
                    $etudiant->matiere = $request->nom ; 
                    $etudiant->save(); 
                }
                $data->nom_Matiere = $request->nom ; 
                $data->nom_Classe = $request->classe ; 
                $data->prof_Matiere = $request->enseignant ; 
                $data->surveillant1 = $request->surveillant1 ; 
                $data->surveillant2 = $request->surveillant2 ; 
                $data->classe = $request->classe2 ; 
                $data->heure = $request->heure ; 
                $data->date = $request->date ; 
                $data->save();
                session()->flash("flash_message","Modifie avec succes") ;
                return redirect('/consulter_planification/'.$data->nom_Section.'/'.$data->nom_Classe)->with('success', 'Game Data is successfully updated');
            }
            else{
                session()->flash("flash_erreur","il faut que surveillant 1 different a surveillant 2  ") ;
                return back(); 
            }
            }
            catch(\Illuminate\Database\QueryException $e){
                session()->flash("flash_erreur","Nom Matiere deja utilisé") ;
                return back(); 
            }
           
            //return redirect()->action([ClasseController::class, 'show']);
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
        $data = Matiere::find($id);  
        $data->delete(); 
        session()->flash("flash_message","supprimer avec succes") ;
        return back();
    }
}
