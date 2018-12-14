<?php

namespace App\Http\Controllers;

use App\Fabricant;
use Illuminate\Http\Request;

class FabricantController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addClient = Fabricant::create([
            'companyName' => $request->input('companyName'),
            'adresse' => $request->input('adresse'),
            'telephone' => $request->input('telephone'),
            'email' => $request->input('email'),
            'date' => $request->input('date')
        ]);

        if($addClient){
            $client = Fabricant::all();
            return view('clients.index', ['client' => $client]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fabricant  $fabricant
     * @return \Illuminate\Http\Response
     */
    public function show(Fabricant $fabricant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fabricant  $fabricant
     * @return \Illuminate\Http\Response
     */
    public function edit(Fabricant $fabricant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fabricant  $fabricant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fabricant $fabricant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fabricant  $fabricant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fabricant $fabricant)
    {
        //
    }
}
