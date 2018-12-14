<?php

namespace App\Http\Controllers;

use App\Logistique;
use Illuminate\Http\Request;

class LogistiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('logistiques.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Logistique  $logistique
     * @return \Illuminate\Http\Response
     */
    public function show(Logistique $logistique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Logistique  $logistique
     * @return \Illuminate\Http\Response
     */
    public function edit(Logistique $logistique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Logistique  $logistique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logistique $logistique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Logistique  $logistique
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logistique $logistique)
    {
        //
    }
}
