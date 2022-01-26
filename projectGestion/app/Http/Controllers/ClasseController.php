<?php

namespace App\Http\Controllers;

use App\Models\Classe ;
use App\Models\Compteetudiant ;
use App\Models\Etudiants;
use App\Models\Matiere;
use Illuminate\Http\Request;

class ClasseController extends Controller
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
            "departement2"=>'required|string|max:159', 
        ]);

        try{
            $data = new Classe(); 
            $data->nom_Classe = $request->nom ; 
            $data->section = $request->section ; 
            $data->departement = $request->departement2 ; 
            $data->save();
            session()->flash("flash_message","Ajouté avec succes") ;
            return back();
        }
        catch(\Illuminate\Database\QueryException $e){
            session()->flash("flash_erreur","classe deja existe") ;
            return back(); 
        }  

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nom_Section,$departement)
    {
        session(['departement' => $departement]);
        session(['section' => $nom_Section]);
        //
       // $classes = Classe::findOrFail($nom_Section,$departement);
       // return view('chefdepartement.classe', compact('classes')); 
       $classes = Classe::query()
       ->where('section', 'LIKE', "{$nom_Section}")
       ->get();
       return view('chefdepartement.classe', compact('classes')); 
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
        $classe = Classe::findOrFail($id);
        return view('chefdepartement.modifier_classe', compact('classe'));
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
        ]);
           /* $data = Classe::findOrFail($id);
            $data->nom_Classe = $request->nom ; 
            $data->save();
            session()->flash("flash_message","Modifie avec succes") ;
            return redirect('/consulter_classe/'.$data->section.'/'.$data->departement)->with('success', 'Game Data is successfully updated'); */

            //return redirect()->action([ClasseController::class, 'show']);

            try{
                $data = Classe::findOrFail($id);
                $tt = $data->nom_Classe ; 
                $data->nom_Classe = $request->nom ; 
                $data->save();
            }
            catch(\Illuminate\Database\QueryException $e){
                session()->flash("flash_erreur","Classe deja utilisé") ;
                return back(); 
            }

            $matieres = Matiere::query()
            ->where('nom_Classe', 'LIKE', "{$tt}")
            ->get();
            foreach ($matieres as $matiere){
                $matiere->nom_Classe = $request->nom ; 
                $matiere->save(); 
            }
            $etudiants = Etudiants::query()
            ->where('nom_Classe', 'LIKE', "{$tt}")
            ->get();
            foreach ($etudiants as $etudiant){
                $etudiant->nom_Classe = $request->nom ; 
                $etudiant->save(); 
            }
            $compteetudss = Compteetudiant::query()
            ->where('classe', 'LIKE', "{$tt}")
            ->get();
            foreach ($compteetudss as $compteetuds){
                $compteetuds->classe = $request->nom ; 
                $compteetuds->save(); 
            }

            session()->flash("flash_message","Modifie avec succes") ;
            return redirect('/consulter_classe/'.$data->section.'/'.$data->departement)->with('success', 'Game Data is successfully updated');

           
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

        $data = Classe::find($id);  

        $matieres = Matiere::query()
        ->where('nom_Classe', 'LIKE', "{$data->nom_Classe}")
        ->get();

        foreach ($matieres as $matiere){
            session()->flash("flash_erreur","Suppression impossible !!! ") ;
            return back();
        }

        $data->delete();

        session()->flash("flash_message","supprimer avec succes") ;
        return back();


    }
}
