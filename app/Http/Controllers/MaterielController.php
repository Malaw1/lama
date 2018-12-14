<?php

namespace App\Http\Controllers;

use App\Materiel;
use Illuminate\Http\Request;

class MaterielController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matos = Materiel::All();
        return view('materiels.index', ['matos' => $matos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('materiels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addMatos = Materiel::create([
            'dateRecep' => $request->input('dateRecep'),
            'nomMateriel' => $request->input('nomMateriel'),
            'lot' => $request->input('lot'),
            'fabricant' => $request->input('fabricant'),
            'qtRecu' => $request->input('qtRecu'),
            'type' => $request->input('type')
        ]);
        if($addMatos){
            $matos = Materiel::All();
        return view('materiels.index', ['matos' => $matos]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Materiel  $materiel
     * @return \Illuminate\Http\Response
     */
    public function show(Materiel $materiel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materiel  $materiel
     * @return \Illuminate\Http\Response
     */
    public function edit(Materiel $materiel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materiel  $materiel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materiel $materiel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materiel  $materiel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materiel $materiel)
    {
        //
    }
}
