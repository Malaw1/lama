<?php

namespace App\Http\Controllers;

use App\Demande;
use App\Reactif;
use App\Equipement;
use App\SubsRef;
use App\Materiel;
use App\User;
use App\Test;
use App\Methode;
use App\ObjetEssai;
use App\Client;


use Carbon\Carbon;

use Illuminate\Http\Request;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {
        $id = ObjetEssai::all()->last();
        $date = Carbon::now();

        // set some things
        $date->format('d/m/Y');
       // $id = $id.'00';
        //$last = DB::table('items')->latest()->first();
        return view('demandes.index', ['id' => $id, 'date' => $date]);
    }

    // public function search(){
    //     $reactifs = Reactif::all();
    //     return view('demandes.index', ['reactifs' => $reactifs]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('demandes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addObjet = Demande::create([
            'code' => $request->input('code'),
            'test' => $request->input('test'),
            'client_id' => $request->input('client_id')
        ]);

        if($addObjet){
            $objet = ObjetEssai::all();
            $demande = Demande::all();
            $client = Client::all();
            $test = Test::all();
            return view('objetEssai.create', ['objet' => $objet, 'demande' => $demande, 'client' => $client, 'test' => $test]);
        }

            // $react = $request->input('test'); //<-- we use global request to get the param of URI

            // $reactif = Reactif::where('nomProduit','LIKE','%'.$react.'%')->get(['nomProduit', 'lot']);

            // $equip = $request->input('equip'); //<-- we use global request to get the param of URI

            // $equipe = Equipement::where('appareil','LIKE','%'.$equip.'%')->get(['appareil', 'code']);

            // $subs = $request->input('subs'); //<-- we use global request to get the param of URI

            // $substance = SubsRef::where('nomProduit','LIKE','%'.$subs.'%')->get(['nomProduit', 'lot']);

            // $mat = $request->input('materiel'); //<-- we use global request to get the param of URI

            // $materiel = Materiel::where('nomMateriel','LIKE','%'.$mat.'%')->get(['nomMateriel']);

            // $perso = $request->input('perso'); //<-- we use global request to get the param of URI

            // $personel = User::where('fname','LIKE','%'.$perso.'%')->get(['fname', 'lname']);

            // $test = $request->input('test'); //<-- we use global request to get the param of URI

            // $tests = Test::where('nomTest','LIKE','%'.$test.'%')->get(['nomTest']);

            // $method = $request->input('perso'); //<-- we use global request to get the param of URI

            // $methodes = Methode::where('nomMethode','LIKE','%'.$method.'%')->get(['nomMethode']);

            // dd($reactif, $equipe, $substance, $materiel, $personel, $tests, $methodes );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function show(Demande $demande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function edit(Demande $demande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demande $demande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demande $demande)
    {
        //
    }
}
