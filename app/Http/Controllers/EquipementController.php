<?php

namespace App\Http\Controllers;

use App\Equipement;
use Illuminate\Http\Request;

class EquipementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equip = Equipement::All();
        return view('equipements.index', ['equip' => $equip]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addequip = Equipement::create([
            'appareil' => $request->input('appareil'),
            'code' => $request->input('code'),
            'fabricant' => $request->input('fabricant'),
            'type' => $request->input('type'),
            'serie' => $request->input('serie'),
            'societeContacter' => $request->input('societerContacter'),
            'dateInstallation' => $request->input('dateInstallation'),
            'documentTechDispo' => $request->input('documentTechDispo'),
            'etat' => $request->input('etat'),
            'salle' => $request->input('salle'),
            'commentaires' => $request->input('commentaires'),
            'dateQualification' => $request->input('dateQualification'),

        ]);

        if($addequip){$equip = Equipement::All();
            return view('equipements.index', ['equip' => $equip]);}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipement  $equipement
     * @return \Illuminate\Http\Response
     */
    public function show(Equipement $equipement)
    {
        $equipement = Equipement::join('equalifs', 'equipements.id', '=', 'equiused.equipement_id')
            ->join('equalifs', 'equipused.id', '=', 'equalifs.equipement_id')
            ->select('equipements.*', 'equipused.*', 'equalifs.*')
             ->where('equipements.id', $equipement->id)
            ->get();
            //dd($react);
            return view('equipements.show', ['equipement' => $equipement]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipement  $equipement
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipement $equipement)
    {
        $equipement = Equipement::where('id', $equipement->id)->first();
        return view('equipements.edit', ['equipement'=>$equipement]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipement  $equipement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipement $equipement)
    {
        $equipUpdate = Equipement::where('id', $equipement->id)->update([
            'appareil' => $request->input('appareil'),
            'code' => $request->input('code'),
            'fabricant' => $request->input('fabricant'),
            'type' => $request->input('type'),
            'serie' => $request->input('serie'),
            'societeContacter' => $request->input('societerContacter'),
            'dateInstallation' => $request->input('dateInstallation'),
            'documentTechDispo' => $request->input('documentTechDispo'),
            'etat' => $request->input('etat'),
            'salle' => $request->input('salle'),
            'commentaires' => $request->input('commentaires'),
        ]);
        if($equipUpdate){
            return redirect()->route('equipements.index', ['equipement'=>$equipement->id])->with('success', 'equipement modifié avec succés');
        }
        //Redirect

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipement  $equipement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipement $equipement)
    {
        //
    }
}
