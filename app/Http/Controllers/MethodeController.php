<?php

namespace App\Http\Controllers;

use App\Methode;
use Illuminate\Http\Request;

class MethodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('methodes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('methodes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addMethode = Methode::create([
            'nomMethode' => $request->input('nomMethode'),
            'id_test' => $request->input('id_test'),
        ]);
        if($addMethode){
            $methode = Test::all();
            return view('methodes.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Methode  $methode
     * @return \Illuminate\Http\Response
     */
    public function show(Methode $methode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Methode  $methode
     * @return \Illuminate\Http\Response
     */
    public function edit(Methode $methode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Methode  $methode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Methode $methode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Methode  $methode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Methode $methode)
    {
        //
    }
}
