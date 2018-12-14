<?php

namespace App\Http\Controllers;

use App\Faisabilite;
use App\Reactif;
use App\ObjetEssai;
use App\Equipement;
use App\SubsRef;
use App\Materiel;
use App\User;
use App\Test;
use App\Methode;
use Illuminate\Http\Request;
use App\Faparam;
use App\Famethode;
use App\Fareactif;
use App\Faequipement;
use App\Fasubstance;
use App\Demande;

class FaisabiliteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reactif = Reactif::all();
        $test = Test::all();
        $method = Methode::all();
        $subsRef = SubsRef::all();
        $matos = Materiel::all();
        $equip = Equipement::all();
        $objet = ObjetEssai::all();
        $user = User::all();
        $use = User::all();


        $dem = ObjetEssai::join('demandes', 'objet_essais.demande_id', '=', 'demandes.id')
        ->select('objet_essais.code', 'objet_essais.lot', 'objet_essais.dateExp','demandes.id', 'demandes.test', 'demandes.codeDem', 'demandes.molecule')
        ->get();



       // dd($reactif, $test, $method, $subsRef );

        return view('logistiques.faisabilite',[
            'reactif' => $reactif,
            'test' => $test ,
            'method' => $method,
            'subsRef' => $subsRef,
            'matos' => $matos,
            'objet' => $objet,
            'equip' => $equip,
            'user' => $user,
            'dem' => $dem,
            'use' => $use
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faisabilites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addFa = Faisabilite::create([
            'ref' => $request->input('ref'),
            'codeMolecule' => $request->input('codeMolecule'),
        ]);

        $param = $request->input('param');
        $essai = serialize($param);
            Faparam::create([
            'parametre' => $essai,
            'faisabilite_id' => $request->input('id')
        ]);

        $method = $request->input('methode');
        $met = serialize($method);
            Famethode::create([
            'methode' => $met,
            'faisabilite_id' => $request->input('id')
        ]);

        if($addFa){

                 return view('analyses.index', ['essai' => $essai] );
             }


        // $addFa = Faparam::create([
        //     'pa' => $request->input('dateRecu'),
        //     'nomProduit' => $request->input('nomProduit'),
        // ]);

        // $addFa = Faisailite::create([
        //     'dateRecu' => $request->input('dateRecu'),
        //     'nomProduit' => $request->input('nomProduit'),
        // ]);

        // $addFa = Faisailite::create([
        //     'dateRecu' => $request->input('dateRecu'),
        //     'nomProduit' => $request->input('nomProduit'),
        // ]);

        // $addFa = Faisailite::create([
        //     'dateRecu' => $request->input('dateRecu'),
        //     'nomProduit' => $request->input('nomProduit'),
        // ]);

        // $addFa = Faisailite::create([
        //     'dateRecu' => $request->input('dateRecu'),
        //     'nomProduit' => $request->input('nomProduit'),
        // ]);

        // $addFa = Faisailite::create([
        //     'dateRecu' => $request->input('dateRecu'),
        //     'nomProduit' => $request->input('nomProduit'),
        // ]);

        // $addFa = Faisailite::create([
        //     'dateRecu' => $request->input('dateRecu'),
        //     'nomProduit' => $request->input('nomProduit'),
        // ]);

        // $addFa = Faisailite::create([
        //     'dateRecu' => $request->input('dateRecu'),
        //     'nomProduit' => $request->input('nomProduit'),
        // ]);

        // if($addReactifs){
        //     $reactifs = Reactif::all();
        //     return view('reactifs.index', ['reactifs' => $reactifs]);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faisabilite  $faisabilite
     * @return \Illuminate\Http\Response
     */
    public function show(Faisabilite $faisabilite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faisabilite  $faisabilite
     * @return \Illuminate\Http\Response
     */
    public function edit(Faisabilite $faisabilite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faisabilite  $faisabilite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faisabilite $faisabilite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faisabilite  $faisabilite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faisabilite $faisabilite)
    {
        //
    }
}
