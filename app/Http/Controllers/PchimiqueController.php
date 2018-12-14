<?php

namespace App\Http\Controllers;

use App\Pchimique;
use Illuminate\Http\Request;

class PchimiqueController extends Controller
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
        //To create a new record you should go to edit reactif view
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addPc = Pchimique::create([
            'formuleBrute' => $request->input('formuleBrute'),
            'momentDipolaire' => $request->input('momentDipolaire'),
            'diametreMoleculaire' => $request->input('diametreMoleculaire'),
            'masseMolaire' => $request->input('masseMolaire'),
            'reactif_id' => $request->input('reactif_id')
        ]);
        if($addPc){
            $pchimique = Pchimique::where('reactif_id', $pchimique->reactif_id)->first();
            return view('reactifs.edit', ['reactif'=>$reactif]);
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pchimique  $pchimique
     * @return \Illuminate\Http\Response
     */
    public function show(Pchimique $pchimique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pchimique  $pchimique
     * @return \Illuminate\Http\Response
     */
    public function edit(Pchimique $pchimique)
    {
        $pchimique = Pchimique::where('reactif_id', $pchimique->reactif_id)->first();
        return view('reactifs.edit', ['reactif'=>$reactif]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pchimique  $pchimique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pchimique $pchimique)
    {
        $pcUpdate = Pchimique::where('reactif_id', $pchimique->reactif_id)->update([
            'formuleBrute' => $request->input('formuleBrute'),
            'momentDipolaire' => $request->input('momentDipolaire'),
            'diametreMoleculaire' => $request->input('diametreMoleculaire'),
            'masseMolaire' => $request->input('masseMolaire'),
            'reactif_id' => $request->input('reactif_id')
        ]);
        if($pcUpdate){
            return redirect()->route('reactifs.show', ['pchimique'=>$pchimique->reactif_id])->with('success', 'Reactif modifié avec succés');
         }
        //Redirect

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pchimique  $pchimique
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pchimique $pchimique)
    {
        //
    }
}
