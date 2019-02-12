<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Faisabilite;
use Illuminate\Http\Request;
use App\FaParam;
use App\CatalogReactif;
use App\CatalogRef;
use App\Parametre;
use App\FaMethode;
use App\ObjetEssai;
use App\FaEquipement;
use App\FaMateriel;
use App\FaReactif;
use App\FaSubstance;
use App\Methode;
use App\Molecule;
use App\Equipement;
use App\Reactif;
use App\Substance;
use App\Consommable;
use App\FaParaMethode;
use App\Pharmacopee;
use App\FaConsommable;
use App\ReactifError;
use App\FaMolecule;
use App\EqQualif;

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
                $faisabilite = Faisabilite::join('objet_essais', 'objet_essais.id', '=', 'faisabilites.objet_essais')->where('reference', 'LIKE', "%$keyword%")
                ->orWhere('objet_essais', 'LIKE', "%$keyword%")
                ->orWhere('molecule', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $faisabilite = Faisabilite::join('objet_essais', 'objet_essais.id', '=', 'faisabilites.objet_essais')->paginate($perPage);
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
        $demande = ObjetEssai::where('code', $_GET['code'])->first();
        $objet = ObjetEssai::all();
        // $molecule = Molecule::join('demandes', 'demandes.id', '=', 'molecules.demande')
        // ->where('demandes.code', $_GET['id'])->get();
        $equipement = EqQualif::all();
        $consommable = Consommable::all();
        $reactif = CatalogReactif::all();
        // $reactif = CatalogRef::all();
        $substance = CatalogRef::all();
        $refs = Pharmacopee::all();
        $molecule = Molecule::all();
        $model = str_slug('faisabilite','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
          return view('faisabilite.create', [
              'parametre' => $parametre,
              'methode' => $methode,
              'objet' => $objet,
              'equipement' => $equipement,
              'consommable' => $consommable,
              'reactif' => $reactif,
              'substance' => $substance,
              'refs' => $refs,
              'molecule' => $molecule
              ]);
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
        $model = str_slug('faisabilite','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'reference' => 'required',
			'objet_essais' => 'required',
			// 'status' => 'required',
			'user_id' => 'required'
		]);

            $requestData = $request->all();

          $faisa =  Faisabilite::create($requestData);
          $faisabilite_id = $faisa->id;

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



        $substance = $request->input('substance');
        foreach ($substance as $methode) {
        FaSubstance::create([
            'substance' => $methode,
            'faisabilite_id' => $faisabilite_id
            ]);
        }

        $materiel = $request->input('consommable');
        foreach ($materiel as $methode) {
        FaConsommable::create([
            'designation' => $methode,
            'faisabilite_id' => $faisabilite_id
            ]);
        }

        $equipement = $request->input('appareil');
        foreach ($equipement as $methode) {
        FaEquipement::create([
            'appareil' => $methode,
            'faisabilite_id' => $faisabilite_id
            ]);
        }


        $params = $request->input('molecule');
        $quants = $request->input('dosage');

        // dd($params, $quants);
        for($i = 0; $i < count($params) ; $i++){
      $mole =  FaMolecule::create([
        'molecule' => $params[$i],
        'dosage' => $quants[$i],
        'faisabilite_id' => $faisabilite_id
        ]);
        }

   //dd($mole);

$errors = null;
        $pc = $request->input('reactif');
        foreach ($pc as $key ) {
             $req = Reactif::where('designation', '=', $key)->first();
             // $pp = $req->designation;
             if ($req == null) {
               ReactifError::create([
               'designation' => $key,
               'faisabilite_id' => $faisabilite_id
               ]);
               $errors[] = $key;
             }else {
                   if(strcasecmp($key, $req->designation ) == 0){
                     FaReactif::create([
                      'reactif' => $key,
                      'faisabilite_id' => $faisabilite_id
                      ]);
                   }else {
                   ReactifError::create([
                   'designation' => $key,
                   'faisabilite_id' => $faisabilite_id
                   ]);
                    }
                  }

                }

                if (($errors != null)) {
                  echo "Errors is not null";
                  $fais = Faisabilite::where('id', $faisabilite_id)
                  ->update(['etat' => 'Non Faisable']);
                //  dd($errors);
                $params = FaParam::where('fa_params.faisabilite_id', $faisabilite_id)->get();
                $methode = FaMethode::where('fa_methodes.faisabilite_id', $faisabilite_id)->get();
                $equip = FaEquipement::where('fa_equipements.faisabilite_id', $faisabilite_id)->get();
                $reactif = FaReactif::where('fa_reactifs.faisabilite_id', $faisabilite_id)->get();
                $substance = FaSubstance::where('fa_substances.faisabilite_id', $faisabilite_id)->get();
                $cons = FaConsommable::where('fa_consommables.faisabilite_id', $faisabilite_id)->get();
                $err = ReactifError::where('reactif_errors.faisabilite_id', $faisabilite_id)->get();
                  $faisabilite = Faisabilite::where('id', $faisabilite_id)->first();

                  return view('faisabilite.show', [
                    'faisabilite' => $faisabilite,
                    'params' => $params,
                    'methode' => $methode,
                    'equip' => $equip,
                    'reactif' =>$reactif,
                    'cons' => $cons,
                    'substance' =>$substance,
                    'errors' => $errors,
                    'err' => $err
                  ]);
                }else {
                  return redirect('faisabilite/faisabilite')->with('flash_message', 'Faisabilite added!');
                }
                // dd($errors);

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
        $model = str_slug('faisabilite','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            // $faisabilite = Faisabilite::findOrFail($id);
            $faisabilite = Faisabilite::join('objet_essais', 'faisabilites.objet_essais', '=', 'objet_essais.id')->findOrFail($id);
            $params = FaParam::where('fa_params.faisabilite_id', $id)->get();
            $methode = FaMethode::where('fa_methodes.faisabilite_id', $id)->get();
            $equip = FaEquipement::where('fa_equipements.faisabilite_id', $id)->get();
            $reactif = FaReactif::where('fa_reactifs.faisabilite_id', $id)->get();
            $cons = FaConsommable::where('fa_consommables.faisabilite_id', $id)->get();
            $err = ReactifError::where('reactif_errors.faisabilite_id', $id)->get();


            return view('faisabilite.show', [
              'faisabilite' => $faisabilite,
              'params' => $params,
              'methode' => $methode,
              'equip' => $equip,
              'reactif' =>$reactif,
              'cons' => $cons,
              'err' => $err
            ]);
            // return view('faisabilite.show', compact('faisabilite'));
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
			'objet_essais' => 'required',
			'molecule' => 'required',
			'user_id' => 'required'
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
