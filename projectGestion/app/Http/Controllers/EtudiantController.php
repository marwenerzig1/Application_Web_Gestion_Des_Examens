<?php

namespace App\Http\Controllers;

use App\Models\Compteetudiant;
use Illuminate\Http\Request;
use App\Models\Etudiants ;

class EtudiantController extends Controller
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
            "nometprenom"=>'required|string|max:159', 
            "section"=>'required|string|max:159', 
            "classe"=>'required|string|max:159',  
            "matiere"=>'required|string|max:159',  
        ]);

        $nom = explode(" ", $request->nometprenom );
        echo $nom[0]; // piece1
        echo $nom[1];


        $etudiants = Etudiants::query()
        ->where('nom', 'LIKE', "{$nom[0]}")
        ->where('prenom', 'LIKE', "{$nom[1]}")
        ->where('nom_Section', 'LIKE', "{$request->section}")
        ->where('nom_Classe', 'LIKE', "{$request->classe}")
        ->where('matiere', 'LIKE', "{$request->matiere}")
        ->get(); 
        foreach($etudiants as $etudiant){
            session()->flash("flash_erreur","nom et prenom deja utilisé ") ;
            return back();
        }


        $data = new Etudiants(); 
        $data->nom = $nom[0] ; 
        $data->prenom = $nom[1] ; 
        $data->matiere = $request->matiere ; 
        $data->nom_Section = $request->section ; 
        $data->nom_Classe = $request->classe ; 
        $data->note = "--" ; 
        $data->place = "--" ; 
        $data->save();
        session()->flash("flash_message","Ajouté avec succes") ;
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nom_Matiere , $nom_Section , $nom_Classe )
    {
        //
        $etudiants = Etudiants::query()
        ->where('matiere', 'LIKE', "{$nom_Matiere}")
        ->where('nom_Section', 'LIKE', "{$nom_Section}")
        ->where('nom_Classe', 'LIKE', "{$nom_Classe}")
        ->get();
        return view('chefdepartement.etudiant', compact('etudiants')); 
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show2($nom_Matiere , $nom_Section , $nom_Classe )
    {
        //
        $etudiants = Etudiants::query()
        ->where('matiere', 'LIKE', "{$nom_Matiere}")
        ->where('nom_Section', 'LIKE', "{$nom_Section}")
        ->where('nom_Classe', 'LIKE', "{$nom_Classe}")
        ->get();
        return view('chefdepartement.noteEtudiant', compact('etudiants')); 
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
        $places = Etudiants::query()
        ->where('nom', 'LIKE', "{$nom}")
        ->where('prenom', 'LIKE', "{$prenom}")
        ->where('nom_Classe', 'LIKE', "{$classe}")
        ->where('nom_Section', 'LIKE', "{$section}")
        ->get();

        return view('etudiant.places', compact('places')); 
    }

            /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */       
    public function show4( $nom , $prenom , $classe , $section )
    {
        //
        $notes = Etudiants::query()
        ->where('nom', 'LIKE', "{$nom}")
        ->where('prenom', 'LIKE', "{$prenom}")
        ->where('nom_Classe', 'LIKE', "{$classe}")
        ->where('nom_Section', 'LIKE', "{$section}")
        ->get();

        return view('etudiant.notes', compact('notes')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */       
    public function show5($matiere ,$section ,$classe )
    {
        //
        $notess = Etudiants::query()
        ->where('matiere', 'LIKE', "{$matiere}")
        ->where('nom_Classe', 'LIKE', "{$classe}")
        ->where('nom_Section', 'LIKE', "{$section}")
        ->get();

        session()->put('nom_matiere',$matiere);

        return view('enseignant.note', compact('notess')); 
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */       
    public function show6( $nom_Matiere , $nom_Section , $nom_Classe )
    {
        //
        $etudiants = Etudiants::query()
        ->where('matiere', 'LIKE', "{$nom_Matiere}")
        ->where('nom_Classe', 'LIKE', "{$nom_Classe}")
        ->where('nom_Section', 'LIKE', "{$nom_Section}")
        ->get();


        $compteEtudiant = Compteetudiant::query()
        ->where('classe', 'LIKE', "{$nom_Classe}")
        ->where('section', 'LIKE', "{$nom_Section}")
        ->get();



        session()->put('matiere2',$nom_Matiere);
        session()->put('section2',$nom_Section);
        session()->put('classe2',$nom_Classe);

        return view('chefdepartement.gestion_etudiant', compact('etudiants','compteEtudiant')); 
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

        
        $etudiant = Etudiants::findOrFail($id);

        $compteEtudiant = Compteetudiant::query()
        ->where('classe', 'LIKE', "{$etudiant->nom_Classe}")
        ->where('section', 'LIKE', "{$etudiant->nom_Section}")
        ->get();


        return view('chefdepartement.modifier_etudiant', compact('etudiant','compteEtudiant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id , $nom_Matiere)
    {
        //
        $request->validate([
            "place"=>'required|string|max:159', 
        ]);
            $etudiants = Etudiants::query()
            ->where('matiere', 'LIKE', "{$nom_Matiere}")
            ->get();
            foreach($etudiants as $etudiant){
                if($etudiant->place == $request->place){
                    session()->flash("flash_erreur","place deja utilisé") ;
                    return back();
                }
            }

            $data = Etudiants::findOrFail($id);
            $data->place = $request->place ; 
            $data->save();
            session()->flash("flash_message","Modifie avec succes") ;
            return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update2(Request $request, $id)
    {
        //
        $request->validate([
            "note"=>'required|string|max:159', 
        ]);
            $data = Etudiants::findOrFail($id);
            $data->note = $request->note ; 
            $data->save();
            session()->flash("flash_message","Modifie avec succes") ;
            return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update3(Request $request, $id)
    {    
        //
        $request->validate([
            "nometprenom"=>'required|string|max:159',
        ]);

        $nom = explode(" ", $request->nometprenom );
        
        $data = Etudiants::findOrFail($id);


        $etudiants = Etudiants::query()
        ->where('nom', 'LIKE', "{$nom[0]}")
        ->where('prenom', 'LIKE', "{$nom[1]}")
        ->get(); 
        foreach($etudiants as $etudiant){
            if($etudiant != $data ){
                session()->flash("flash_erreur","nom et prenom deja utilisé ") ;
                return back();
            }
        }

            $data = Etudiants::findOrFail($id);
            $data->nom = $nom[0] ; 
            $data->prenom = $nom[1] ; 
            $data->save();
            session()->flash("flash_message","Modifie avec succes") ;
            return redirect('/gestion_Etudiant/'.$data->matiere.'/'.$data->nom_Section.'/'.$data->nom_Classe)->with('success', 'Game Data is successfully updated');
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
        $compte =  Etudiants::find($id);  
        $compte->delete(); 
        session()->flash("flash_message","supprimer avec succes") ;
        return back();
    }
}
