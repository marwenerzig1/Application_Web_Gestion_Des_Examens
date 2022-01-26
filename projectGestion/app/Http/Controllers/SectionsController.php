<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Compteetudiant;
use App\Models\Etudiants;
use App\Models\Matiere;
use Illuminate\Http\Request;
use App\Models\Section ;

class SectionsController extends Controller
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
        $section = new Section;
        $sections = $section::all();
        return view('chefdepartement.section',compact('sections')) ;
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
            "abrevation"=>'required|string|max:159', 
            "departement"=>'required|string|max:159', 
        ]);
        try{
            $data = new Section(); 
            $data->nom_Section = $request->nom ; 
            $data->abrevation = $request->abrevation ; 
            $data->departement = $request->departement ; 
            $data->save();
            session()->flash("flash_message","Ajouté avec succes") ;
            return back();
        }
        catch(\Illuminate\Database\QueryException $e){
            session()->flash("flash_erreur","section deja existe") ;
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
        $section = Section::findOrFail($id);
        return view('chefdepartement.modifier_section', compact('section'));
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
            "abrevation"=>'required|string|max:159', 
            "departement"=>'required|string|max:159',  
        ]);
            /* $data = Section::findOrFail($id);
            $data->nom_Section = $request->nom ; 
            $data->abrevation = $request->abrevation ; 
            $data->departement = $request->departement ;  
            $data->save();
            session()->flash("flash_message","Modifie avec succes") ;
            return redirect('/section')->with('success', 'Game Data is successfully updated'); */
            /*  fff */

            try{
                $data = Section::findOrFail($id);
                $tt = $data->nom_Section ; 
                $data->nom_Section = $request->nom ; 
                $data->abrevation = $request->abrevation ; 
                $data->departement = $request->departement ;  
                $data->save();
            }
            catch(\Illuminate\Database\QueryException $e){
                session()->flash("flash_erreur","Section deja utilisé") ;
                return back(); 
            }


            
            $classes = Classe::query()
            ->where('section', 'LIKE', "{$tt}")
            ->get();
            foreach ($classes as $classe){
                $classe->section = $request->nom ; 
                $classe->save(); 
            }
            $etudiants = Etudiants::query()
            ->where('nom_Section', 'LIKE', "{$tt}")
            ->get();
            foreach ($etudiants as $etudiant){
                $etudiant->nom_Section = $request->nom ; 
                $etudiant->save(); 
            }
            $matieres = Matiere::query()
            ->where('nom_Section', 'LIKE', "{$tt}")
            ->get();
            foreach ($matieres as $matiere){
                $matiere->nom_Section = $request->nom ; 
                $matiere->save(); 
            }
            $compteetudss = Compteetudiant::query()
            ->where('section', 'LIKE', "{$tt}")
            ->get();
            foreach ($compteetudss as $compteetuds){
                $compteetuds->section = $request->nom ; 
                $compteetuds->save(); 
            }
 
            session()->flash("flash_message","Modifie avec succes") ;
            return redirect('/section')->with('success', 'Game Data is successfully updated');
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
        $section = Section::find($id); 
        
        $classes = Classe::query()
        ->where('section', 'LIKE', "{$section->nom_Section}")
        ->get();

        foreach ($classes as $classe){
            session()->flash("flash_erreur","Suppression impossible !!! ") ;
            return back();
        }

        $etudiants = Compteetudiant::query()
        ->where('section', 'LIKE', "{$section->nom_Section}")
        ->get();

        foreach ($etudiants as $etudiant){
            session()->flash("flash_erreur","Suppression impossible !!! ") ;
            return back();
        }

        $section->delete(); 
        session()->flash("flash_message","supprimer avec succes") ;
        return back();
    }
}
