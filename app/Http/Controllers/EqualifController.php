<?php

namespace App\Http\Controllers;

use App\Equalif;
use Illuminate\Http\Request;

class EqualifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equalif = Equalif::All();
        return view('qualification.index', ['equalif' => $equalif]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('qualification.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addQualif = Equipement::create([
            'dateQualification' => $request->input('dateQualification'),
            'equipement_id' => $request->input('equipement_id')
        ]);
        if($addQualif){
            return redirect()->route('qualification.index', ['equalif' => $equalif->id])->with('success', 'Appareil qualifié avec succés');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equalif  $equalif
     * @return \Illuminate\Http\Response
     */
    public function show(Equalif $equalif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equalif  $equalif
     * @return \Illuminate\Http\Response
     */
    public function edit(Equalif $equalif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equalif  $equalif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equalif $equalif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equalif  $equalif
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equalif $equalif)
    {
        //
    }
}
