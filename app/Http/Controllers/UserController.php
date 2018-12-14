<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perso = User::all();
        return view('personel.index', ['perso' => $perso]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addUser = User::create([
            'prenom' => $request->input('prenom'),
            'nom' => $request->input('nom'),
            'sexe' => $request->input('sexe'),
            'csp' => $request->input('csp'),
            'specialite' => $request->input('specialite'),
            'fonction' => $request->input('fonction'),
            'statut' => $request->input('statut'),
            'employeur' => $request->input('employeur'),
            'zone' => $request->input('zone'),
            'adresse' => $request->input('adresse'),
            'email' => $request->input('email'),
            'telephone' => $request->input('telephone'),
            'password' => $request->input('password'),
            'dateNaiss' => $request->input('dateNaiss')
        ]);

        if($addUser){
            $personel = User::all();
            return view('personel.index', ['personel' => $personel]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personel  $personel
     * @return \Illuminate\Http\Response
     */
    public function show(Personel $personel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personel  $personel
     * @return \Illuminate\Http\Response
     */
    public function edit(Personel $personel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personel  $personel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personel $personel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personel  $personel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personel $personel)
    {
        //
    }
}
