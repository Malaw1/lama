<?php

namespace App\Http\Controllers;

use App\SubsRef;
use Illuminate\Http\Request;

class SubsRefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subs = SubsRef::all();
        return view('substances.index', ['subs' => $subs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('substances.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addSubs = SubsRef::create([
            'dateRecu' => $request->input('dateRecu'),
            'nomProduit' => $request->input('nomProduit'),
            'lot' => $request->input('lot'),
            'fabricant' => $request->input('fabricant'),
            'qtRecu' => $request->input('qtRecu'),
            'dateFab' => $request->input('dateFab'),
            'dateExp' => $request->input('dateExp'),
            'depositaire' => $request->input('depositaire'),
            'certificat' => $request->input('certificat')
        ]);

        if($addSubs){
            $subs = SubsRef::all();
            return view('substances.index', ['subs' => $subs]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubsRef  $subsRef
     * @return \Illuminate\Http\Response
     */
    public function show(SubsRef $subsRef)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubsRef  $subsRef
     * @return \Illuminate\Http\Response
     */
    public function edit(SubsRef $subsRef)
    {
        $subsRef = SubsRef::where('id', $subsRef->id)->first();
        return view('substances.edit', ['subsRef'=>$subsRef]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubsRef  $subsRef
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubsRef $subsRef)
    {
        $subsUpdate = SubsRef::where('id', $subsRef->id)->update([
            'dateRecu' => $request->input('dateRecu'),
            'nomProduit' => $request->input('nomProduit'),
            'lot' => $request->input('lot'),
            'fabricant' => $request->input('fabricant'),
            'qtRecu' => $request->input('qtRecu'),
            'dateFab' => $request->input('dateFab'),
            'dateExp' => $request->input('dateExp'),
            'depositaire' => $request->input('depositaire'),
            'certificat' => $request->input('certificat')
        ]);
        if($subsUpdate){
            return redirect()->route('substances.show', ['subsRef'=>$subsRef->id])->with('success', 'SubsRef modifié avec succés');
        }
        //Redirect

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubsRef  $subsRef
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubsRef $subsRef)
    {
        //
    }
}
