<?php

namespace App\Http\Controllers;

use App\Pphysique;
use Illuminate\Http\Request;

class PphysiqueController extends Controller
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
        //Go to reactif.edit to save a new record in physique properties
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addPp = Pphysique::create([
            'tempFusion' => $request->input('tempFusion'),
            'tempEbulution' => $request->input('tempEbulution'),
            'parametreDeSolubilite' => $request->input('parametreDeSolubilite'),
            'masseVolumique' => $request->input('masseVolumique'),
            'tempAutoInflamation' => $request->input('tempAutoInflamation'),
            'limitesExplosiviteAir' => $request->input('limitesExplosiviteAir'),
            'pressionVapeurSaturante' => $request->input('pressionVapeurSaturante'),
            'ViscositeDynamique' => $request->input('ViscositeDynamique'),
            'pointCritique' => $request->input('pointCritique'),
            'reactif_id' => $request->input('reactif_id')
        ]);
        if($addPp){
            $pphysique = Pphysique::where('reactif_id', $pphysique->reactif_id)->first();
            return view('reactifs.edit', ['reactif'=>$reactif]);
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pphysique  $pphysique
     * @return \Illuminate\Http\Response
     */
    public function show(Pphysique $pphysique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pphysique  $pphysique
     * @return \Illuminate\Http\Response
     */
    public function edit(Pphysique $pphysique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pphysique  $pphysique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pphysique $pphysique)
    {
        $ppUpdate = Pphysique::where('reactif_id', $pphysique->reactif_id)->update([
            'tempFusion' => $request->input('tempFusion'),
            'tempEbulution' => $request->input('tempEbulution'),
            'parametreDeSolubilite' => $request->input('parametreDeSolubilite'),
            'masseVolumique' => $request->input('masseVolumique'),
            'tempAutoInflamation' => $request->input('tempAutoInflamation'),
            'limitesExplosiviteAir' => $request->input('limitesExplosiviteAir'),
            'pressionVapeurSaturante' => $request->input('pressionVapeurSaturante'),
            'ViscositeDynamique' => $request->input('ViscositeDynamique'),
            'pointCritique' => $request->input('pointCritique'),
            'reactif_id' => $request->input('reactif_id')
        ]);
        if($ppUpdate){
            return redirect()->route('reactifs.show', ['pphysique'=>$pphysique->reactif_id])->with('success', 'Reactif modifié avec succés');
         }
        //Redirect

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pphysique  $pphysique
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pphysique $pphysique)
    {
        //
    }
}
