<?php

namespace App\Http\Controllers;

use App\Reactif;
use Illuminate\Http\Request;

class ReactifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reactifs = Reactif::all();
        return view('reactifs.index', ['reactifs' => $reactifs]);
       }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reactifs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addReactifs = Reactif::create([
            'dateRecu' => $request->input('dateRecu'),
            'nomProduit' => $request->input('nomProduit'),
            'lot' => $request->input('lot'),
            'fabricant' => $request->input('fabricant'),
            'qtRecu' => $request->input('qtRecu'),
            'dateFab' => $request->input('dateFab'),
            'expDate' => $request->input('expDate'),
            'depositaire' => $request->input('depositaire'),
            'conditionnement' => $request->input('conditionnement'),
            'user_id' => $request->input('user_id')
        ]);

        if($addReactifs){
            $reactifs = Reactif::all();
            return view('reactifs.index', ['reactifs' => $reactifs]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reactif  $reactif
     * @return \Illuminate\Http\Response
     */
    public function show(Reactif $reactif)
    {
        //  $reactif = Reactif::join('pphysiques', 'reactifs.id', '=', 'pphysiques.reactif_id')
        //      ->join('pchimiques', 'pchimiques.id', '=', 'pchimiques.reactif_id')
        //      ->select('reactifs.*', 'pphysiques.*', 'pchimiques.*')
        //       ->where('reactifs.id', $reactif->id)
        //      ->get();
        //     //dd($react);
        //     return view('reactifs.show', ['reactif' => $reactif]);


        $reactif = Reactif::where('id', $reactif->id)->first();
        return view('reactifs.show', ['reactif'=>$reactif]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reactif  $reactif
     * @return \Illuminate\Http\Response
     */
    public function edit(Reactif $reactif)
    {
        $reactif = Reactif::where('id', $reactif->id)->first();
        return view('reactifs.edit', ['reactif'=>$reactif]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reactif  $reactif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reactif $reactif)
    {
        $reactifUpdate = Reactif::where('id', $reactif->id)->update([
            'dateRecu' => $request->input('dateRecu'),
            'nomProduit' => $request->input('nomProduit'),
            'lot' => $request->input('lot'),
            'fabricant' => $request->input('fabricant'),
            'qtRecu' => $request->input('qtRecu'),
            'dateFab' => $request->input('dateFab'),
            'expDate' => $request->input('expDate'),
            'depositaire' => $request->input('depositaire'),
            'conditionnement' => $request->input('conditionnement'),
            'user_id' => $request->input('user_id')
        ]);

        if($reactifUpdate){
            return redirect()->route('reactifs.show', ['reactif'=>$reactif->id])->with('success', 'Reactif modifié avec succés');
        }
        //Redirect

        return back()->withInput();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reactif  $reactif
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reactif $reactif)
    {
        //
    }
}
