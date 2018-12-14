<?php

namespace App\Http\Controllers;

use App\ObjetEssai;
use App\Client;
use App\Demande;
use Illuminate\Http\Request;
use App\Fabricant;

class ObjetEssaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $objet = ObjetEssai::All();
       // dd($objet);
        return view('objetEssai.index', ['objet' => $objet]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $demande = Demande::all();
        return view('objetEssai.create', ['demande' => $demande]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addObjet = ObjetEssai::create([
            'dateRecue' => $request->input('dateRecue'),
            'designation' => $request->input('designation'),
            'lot' => $request->input('lot'),
            'fabricant' => $request->input('fabricant'),
            'qtRecue' => $request->input('qtRecue'),
            'dateFab' => $request->input('dateFab'),
            'dateExp' => $request->input('dateExp'),
            'formeGalenique' => $request->input('formeGalenique'),
            'demande_id' => $request->input('demande_id')
        ]);

        if($addObjet){
            $objet = ObjetEssai::all();
            return view('objetEssai.index', ['objet' => $objet]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ObjetEssai  $objetEssai
     * @return \Illuminate\Http\Response
     */
    public function show(ObjetEssai $objetEssai)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ObjetEssai  $objetEssai
     * @return \Illuminate\Http\Response
     */
    public function edit(ObjetEssai $objetEssai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ObjetEssai  $objetEssai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ObjetEssai $objetEssai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ObjetEssai  $objetEssai
     * @return \Illuminate\Http\Response
     */
    public function destroy(ObjetEssai $objetEssai)
    {
        //
    }
}
