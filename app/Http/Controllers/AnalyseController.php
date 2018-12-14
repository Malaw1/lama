<?php

namespace App\Http\Controllers;

use App\Analyse;
use App\User;
use App\ObjetEssai;
use Illuminate\Http\Request;

class AnalyseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $essai = Analyse::All();
    //    // return view('analyses.show', ['user' => $user]);
         return view('analyses.index', ['essai' => $essai]);
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
        // $q = $request->input('q');
        // $user = User::where('fname','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
        // if(count($user) > 0){
        //     return view('analyses.show', ['user' => $user]);
        // }
        // else
        //     return view ('analyses.show')->withMessage('No Details found. Try to search again !');


            $x = $request->input('objet');
            $objet = ObjetEssai::where('code','LIKE','%'.$x.'%');


            return view('analyses.show', ['objet' => $objet]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Analyse  $analyse
     * @return \Illuminate\Http\Response
     */
    public function show(Analyse $analyse)
    {
        $x = $request->input('objet');
            $objet = ObjetEssai::where('code','LIKE','%'.$x.'%');
            return view('analyses.show', ['objet' => $objet]);
    }

    public function search(Request $request)
    {
        $q = $request->input('q');
        $user = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
        if(count($user) > 0)
            return view('analyses.index')->withDetails($user)->withQuery ( $q );
        else return view ('analyses.index')->withMessage('No Details found. Try to search again !');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Analyse  $analyse
     * @return \Illuminate\Http\Response
     */
    public function edit(Analyse $analyse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Analyse  $analyse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Analyse $analyse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Analyse  $analyse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Analyse $analyse)
    {
        //
    }
}
