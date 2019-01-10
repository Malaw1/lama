<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Faisabilite;
use Illuminate\Http\Request;
use App\FaParam;
use App\Parametre;
use App\FaMethode;
use App\ObjetEssai;
use App\FaEquipement;
use App\FaMateriel;
use App\FaReactif;
use App\FaSubstance;
use App\Methode;
use App\Equipement;
use App\Reactif;
use App\Substance;
use App\Materiel;
use App\FaParaMethode;


class FaisabiliteController extends Controller
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

        $model = str_slug('faisabilite','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $faisabilite = Faisabilite::where('reference', 'LIKE', "%$keyword%")
                ->orWhere('objet_essai', 'LIKE', "%$keyword%")
                ->orWhere('molecule', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $faisabilite = Faisabilite::paginate($perPage);
            }
            
            return view('faisabilite.index', compact('faisabilite'));
        }
        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $parametre = Parametre::all();
        $methode = Methode::all();
        $objet = ObjetEssai::all();
        $equipement = Equipement::all();
        $materiel = Materiel::all();
        $reactif = Reactif::all();
        $substance = Substance::all();

        $model = str_slug('faisabilite','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('faisabilite.create', [
                'parametre' => $parametre, 
                'methode' => $methode, 
                'objet' => $objet,
                'equipement' => $equipement,
                'materiel' => $materiel,
                'reactif' => $reactif,
                'substance' => $substance
                ]);
        }
        return response(view('403'), 403);

    }

    public function parametre(){
        $parametre_id = $request->input('parametre');
        $methode = Methode::where('parametre_id', '=', $parametre_id)->get();

        return response()->json($methode);
        
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
        $model = str_slug('faisabilite','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'reference' => 'required',
			'objet_essai' => 'required',
			'molecule' => 'required'
		]);
            $requestData = $request->all();
            
            $faisabilite = Faisabilite::create($requestData);
        }

        $faisabilite_id = $faisabilite->id;


        

        $param = $request->input('parametre');
        foreach ($param as $param) {            
        $fap = Faparam::create([
            'parametre' => $param,
            'faisabilite_id' => $faisabilite_id
            ]);
        }

        $methode = $request->input('methode');
        foreach ($methode as $methode) {            
        $fam = FaMethode::create([
            'methode' => $methode,
            'faisabilite_id' => $faisabilite_id
            ]);
        }

        $reactif = $request->input('reactif');
        foreach ($reactif as $reactif) {            
        FaReactif::create([
            'reactif' => $reactif,
            'faisabilite_id' => $faisabilite_id
            ]);
        }

        $substance = $request->input('methode');
        foreach ($substance as $methode) {            
        FaSubstance::create([
            'substance' => $methode,
            'faisabilite_id' => $faisabilite_id
            ]);
        }

        $materiel = $request->input('methode');
        foreach ($materiel as $methode) {            
        FaMateriel::create([
            'materiel' => $methode,
            'faisabilite_id' => $faisabilite_id
            ]);
        }

        $equipement = $request->input('methode');
        foreach ($equipement as $methode) {            
        FaEquipement::create([
            'methode' => $methode,
            'faisabilite_id' => $faisabilite_id
            ]);
        }

        $fapm = FaParaMethode::create([
            'methode' => $fam->methode,
            'parametre' => $fap->parametre,
            'faisabilite_id' => $faisabilite_id
            
        ]);


        return redirect('faisabilite/faisabilite')->with('flash_message', 'Faisabilite added!');

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
        $model = str_slug('faisabilite','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $faisabilite = Faisabilite::findOrFail($id);
            return view('faisabilite.show', compact('faisabilite'));
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
        $model = str_slug('faisabilite','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $faisabilite = Faisabilite::findOrFail($id);
            return view('faisabilite.edit', compact('faisabilite'));
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
        $model = str_slug('faisabilite','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'reference' => 'required',
			'objet_essai' => 'required',
			'molecule' => 'required'
		]);
            $requestData = $request->all();
            
            $faisabilite = Faisabilite::findOrFail($id);
             $faisabilite->update($requestData);

             return redirect('faisabilite/faisabilite')->with('flash_message', 'Faisabilite updated!');
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
        $model = str_slug('faisabilite','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Faisabilite::destroy($id);

            return redirect('faisabilite/faisabilite')->with('flash_message', 'Faisabilite deleted!');
        }
        return response(view('403'), 403);

    }
}
