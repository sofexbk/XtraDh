<?php

namespace App\Http\Controllers;

use App\Models\Intervention;
use Illuminate\Http\Request;

class InterventionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interventions = Intervention::with(['etablissement:id,Nom'])
                            ->with(['enseignant:id,PPR,Nom,prenom'])
                            ->get();
        return response()->json($interventions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  @dd($request);
        $fields = $request->validate([
           'id_Intervenant'=>'required|exists:enseignants,id',
           'id_Etab'=>'required|exists:etablissements,id',
           'Intitule_Intervention'=>'required',
            'Annee_univ'=>'required',
            'Semestre'=>'required',
            'Date_debut'=>'required',
            'Date_fin'=>'required',
            'Nbr_heures'=>'required' 
        ]);
        $intervention = new Intervention($fields);
        return $intervention->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Intervention  $intervention
     * @return \Illuminate\Http\Response
     */
    public function show(Intervention $intervention)
    {
        return response()->json(
            $intervention->with(['etablissement:id,Nom'])
            ->with(['enseignant:id,PPR,Nom,prenom'])
            ->get()
    );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Intervention  $intervention
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $intervention = Intervention::find($id);
        //@dd($request);
        $fields = $request->validate([
            'id_Intervenant'=>'required|exists:enseignants,id',
            'id_Etab'=>'required|exists:etablissements,id',
            'Intitule_Intervention'=>'required',
             'Annee_univ'=>'required',
             'Semestre'=>'required',
             'Date_debut'=>'required',
             'Date_fin'=>'required',
             'Nbr_heures'=>'required' 
         ]);
         $intervention->update($fields);
          return response()->json($intervention);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Intervention  $intervention
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $intervention =Intervention::find($id);
       $intervention->delete();
       return $intervention;  
    }
}
