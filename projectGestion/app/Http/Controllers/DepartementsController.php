<?php

namespace App\Http\Controllers;

use App\Models\Departement ; 
use App\Models\Section ;
use App\Models\Compteenseignant ;
use App\Models\Compteetudiant ; 
use App\Models\Classe ; 

use Illuminate\Http\Request;

class DepartementsController extends Controller
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
        $departement = new Departement;
        $departements = $departement::all();
        return view('administrateur.departement',compact('departements')) ;
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
        ]);
        try{
            $data = new Departement(); 
            $data->nom_Departement = $request->nom ; 
            $data->save();
            session()->flash("flash_message","Ajouté avec succes") ;
            return back();
        }
        catch(\Illuminate\Database\QueryException $e){
            session()->flash("flash_erreur","Nom Departement deja utilisé") ;
            return back(); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $departement = new Departement;
        $departements = $departement::all();
        return view('connexion.inscrireEtudiant', compact('departements')); 
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show2()
    {
        //
        $departement = new Departement;
        $departements = $departement::all();
        return view('connexion.inscrireEnseignant', compact('departements')); 
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
        $departement = Departement::findOrFail($id);
        return view('administrateur.modifier_departement', compact('departement'));
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
            /*$data = Departement::findOrFail($id);
            $data->nom_Departement = $request->nom ; 
            $data->save(); */ 
            try{
                $data = Departement::findOrFail($id);
                $tt = $data->nom_Departement ; 
                $data->nom_Departement = $request->nom ; 
                $data->save();
            }
            catch(\Illuminate\Database\QueryException $e){
                session()->flash("flash_erreur","Nom Departement deja utilisé") ;
                return back(); 
            }
            $sections = Section::query()
            ->where('departement', 'LIKE', "{$tt}")
            ->get();
            foreach ($sections as $section){
                $section->departement = $request->nom ; 
                $section->save(); 
            }
            $compteenss = Compteenseignant::query()
            ->where('departement', 'LIKE', "{$tt}")
            ->get();
            foreach ($compteenss as $compteens){
                $compteens->departement = $request->nom ; 
                $compteens->save(); 
            }
            $compteetudss = Compteetudiant::query()
            ->where('departement', 'LIKE', "{$tt}")
            ->get();
            foreach ($compteetudss as $compteetuds){
                $compteetuds->departement = $request->nom ; 
                $compteetuds->save(); 
            }
            $classes = Classe::query()
            ->where('departement', 'LIKE', "{$tt}")
            ->get();
            foreach ($classes as $classe){
                $classe->departement = $request->nom ; 
                $classe->save(); 
            }



            
            session()->flash("flash_message","Modifie avec succes") ;
            return redirect('/departement')->with('success', 'Game Data is successfully updated');
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
        /*        
        $departement = Departement::find($id);  
        $departement->delete(); 
         */

        $data = Departement::findOrFail($id);

        $sections = Section::query()
        ->where('departement', 'LIKE', "{$data->nom_Departement}")
        ->get();

        foreach ($sections as $section){
            session()->flash("flash_erreur","Suppression impossible !!! ") ;
            return back();
        }

        $data->delete();

        session()->flash("flash_message","supprimer avec succes") ;
        return back();
    }
}
