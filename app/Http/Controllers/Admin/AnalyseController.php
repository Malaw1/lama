<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Analyse;
use Illuminate\Http\Request;
use App\ObjetEssai;
use App\User;
use App\Faisabilite;
use App\FaParaMethode;
use App\Equipement;
use App\Reactif;
use App\Substance;
use App\Materiel;
use App\Methode;

class AnalyseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $model = str_slug('analyse','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $analyse = Analyse::where('code', 'LIKE', "%$keyword%")
                ->orWhere('objet_essai', 'LIKE', "%$keyword%")
                ->orWhere('reference', 'LIKE', "%$keyword%")
                ->orWhere('dci', 'LIKE', "%$keyword%")
                ->orWhere('dosage', 'LIKE', "%$keyword%")
                ->orWhere('etat', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $analyse = Analyse::paginate($perPage);
            }

            return view('analyse.index', compact('analyse'));
        }
        return response(view('403'), 403);

    }

    public function analyse(){
        $x = $request->input('ref');

        dd($x);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $ref = $_GET['ref'];
        $objetId = $_GET['objet'];
        $molecule = $_GET['codeMolecule'];

        $objet = ObjetEssai::where('id', $objetId)->first();
        $user = User::all();

      //  dd($objet);
        $model = str_slug('analyse','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $objet = ObjetEssai::where('id', $objetId)->first();

           // dd($objet->date_fab);
            return view('analyse.create', ['objet' => $objet, 'user' => $user]);
        }
        return response(view('403'), 403);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $model = str_slug('analyse','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'code' => 'required',
			'objet_essai' => 'required',
			'reference' => 'required',
			'dci' => 'required',
			'dosage' => 'required',
			'responsable' => 'required'
		]);
            $requestData = $request->all();
            
            Analyse::create($requestData);
            return redirect('analyse/analyse')->with('flash_message', 'Analyse added!');
        }
        return response(view('403'), 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $ana = Analyse::join('objet_essais', 'objet_essais.id', '=', 'analyses.objet_essai')
                        ->join('faisabilites', 'faisabilites.objet_essai', '=', 'objet_essais.id')
                        ->where('analyses.id', $id)
                        ->first();
        
        $faisabilite = Faisabilite::join('fa_methodes', 'fa_methodes.faisabilite_id', '=', 'faisabilites.id')
                        ->where('faisabilites.id', $ana->id)
                        ->get();
                       // dd($faisabilite);

        $equip = Equipement::all();
        $reactif = Reactif::all();
        $reactif1 = Reactif::all();
        $reactif2 = Reactif::all();
        $reactif3 = Reactif::all();
        $method = Methode::all();
        $subsRef = Substance::all();
        $matos = Materiel::all();
        $equip = Equipement::all();
        $objet = ObjetEssai::all();
        $user = User::all();
        $use = User::all();

        $ph = Equipement::All()
            ->where('appareil', 'pH metre');

        $balance = Equipement::All()
            ->where('appareil', 'Balance');

        $forme = $ana->forme_galenique;
        $model = str_slug('analyse','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $analyse = Analyse::findOrFail($id);
            return view('analyse.show', [
                'analyse' => $analyse, 
                'ana' => $ana, 
                'faisabilite' => $faisabilite,
                'equip' => $equip,
                'objet'=>$objet,
                'reactif' => $reactif,
                'reactif1' => $reactif,
                'reactif2' => $reactif,
                'reactif3' => $reactif,
                'method' => $method,
                'subsRef' => $subsRef,
                'matos' => $matos,
                'user' => $user,
                'use' => $use,
                'ph' => $ph,
                'balance' =>$balance,
                'forme' => $forme
                
            ]);
        }
        return response(view('403'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $model = str_slug('analyse','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $analyse = Analyse::findOrFail($id);
            return view('analyse.edit', compact('analyse'));
        }
        return response(view('403'), 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $model = str_slug('analyse','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'code' => 'required',
			'objet_essai' => 'required',
			'reference' => 'required',
			'dci' => 'required',
			'dosage' => 'required',
			'etat' => 'required'
		]);
            $requestData = $request->all();
            
            $analyse = Analyse::findOrFail($id);
             $analyse->update($requestData);

             return redirect('analyse/analyse')->with('flash_message', 'Analyse updated!');
        }
        return response(view('403'), 403);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $model = str_slug('analyse','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Analyse::destroy($id);

            return redirect('analyse/analyse')->with('flash_message', 'Analyse deleted!');
        }
        return response(view('403'), 403);

    }
}
