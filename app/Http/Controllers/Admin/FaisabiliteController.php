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
use App\FaPc;
use App\Methode;
use App\Equipement;
use App\ProduitChimique;
use App\Consommable;
<<<<<<< HEAD
use App\FaParaMethode;
use App\Pharmacopee;
use App\Catalog;
=======
use App\FaConsommable;
use App\FaParaMethode;
use App\Pharmacopee;
use App\Catalog;
use App\PcError;
>>>>>>> develop

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
                ->orWhere('molecule', 'LIKE', "%$keyword%")
                ->orWhere('objet_essai', 'LIKE', "%$keyword%")
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
        $consommable = Consommable::all();
        $catalog = Catalog::all();
        $pharma = Pharmacopee::all();
        $model = str_slug('faisabilite','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('faisabilite.create',
            [
                'parametre' => $parametre,
                'methode' => $methode,
                'objet' => $objet,
                'equipement' => $equipement,
                'consommable' => $consommable,
                'catalog' => $catalog,
                'pharma' => $pharma
            ]
          );
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
			'molecule' => 'required',
			'objet_essai' => 'required',
      'user_id' => 'required'
		]);
            $requestData = $request->all();

<<<<<<< HEAD
            Faisabilite::create($requestData);
=======
          $faisabilite =  Faisabilite::create($requestData);
>>>>>>> develop

            $faisabilite_id = $faisabilite->id;



<<<<<<< HEAD
=======
            // $rek = $pc;
            //
            // $var [] = '';

            // foreach ($rek as $re) {
            //   if (($req = ProduitChimique::all()->where('designation', $re)) == null ) {
            //     $var = $re;
            //   }
            // }

        //    dd($pc);

>>>>>>> develop

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

<<<<<<< HEAD

=======
>>>>>>> develop
        $consommable = $request->input('consommable');
        foreach ($consommable as $cons) {
        FaConsommable::create([
            'consommable' => $cons,
            'faisabilite_id' => $faisabilite_id
            ]);
        }

<<<<<<< HEAD
        $equipement = $request->input('methode');
        foreach ($equipement as $methode) {
        FaEquipement::create([
            'methode' => $methode,
=======
        $equipement = $request->input('equipement');
        foreach ($equipement as $equip) {
        FaEquipement::create([
            'equipement' => $equip,
>>>>>>> develop
            'faisabilite_id' => $faisabilite_id
            ]);
        }

<<<<<<< HEAD
        // $stock = ProduitChimique::->where('designation', 'pattern')


        $pc = $request->input('pc');
        foreach ($pc as $pc) {
        FaPc::create([
            'reactif' => $pc,
            'faisabilite_id' => $faisabilite_id
            ]);
        }

        //
        // $fapm = FaParaMethode::create([
        //     'methode' => $fam->methode,
        //     'parametre' => $fap->parametre,
        //     'faisabilite_id' => $faisabilite_id
        //
        // ]);
        //

            return redirect('faisabilite/faisabilite')->with('flash_message', 'Faisabilite added!');
=======
        $pc = $request->input('pc');
        foreach ($pc as $key ) {
             $req = ProduitChimique::where('designation', '=', $key)
             ->first();

             FaPc::create([
                 'designation' => $key,
                 'faisabilite_id' => $faisabilite_id
                 ]);

             if ($req <=> $key) {
               PcError::create([
                   'designation' => $key,
                   'faisabilite_id' => $faisabilite_id
                   ]);
               $errors[] = $key;
             }

        }

        if ($errors == null) {
        return redirect('faisabilite/faisabilite')->with('flash_message', 'Faisabilite Reussi!');

        }else {

          $faisabilite = Faisabilite::join('objet_essais', 'faisabilites.objet_essai', '=', 'objet_essais.id')->findOrFail($faisabilite_id);
          $faisabilite->fill(['status' => 'Non Faisable']);

          $params = FaParam::where('fa_params.faisabilite_id', $faisabilite_id)->get();
          $methode = FaMethode::where('fa_methodes.faisabilite_id', $faisabilite_id)->get();
          $equip = FaEquipement::where('fa_equipements.faisabilite_id', $faisabilite_id)->get();
          $pc = FaPc::where('fa_pcs.faisabilite_id', $faisabilite_id)->get();
          $cons = FaConsommable::where('fa_consommables.faisabilite_id', $faisabilite_id)->get();
          $err = PcError::where('pc_errors.faisabilite_id', $faisabilite_id)->get();

          return view('faisabilite.show', [
            'faisabilite' => $faisabilite,
            'params' => $params,
            'methode' => $methode,
            'equip' => $equip,
            'pc' =>$pc,
            'cons' => $cons,
            'erros' => $errors,
            'err' => $err
          ]);
        }

>>>>>>> develop
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
<<<<<<< HEAD
            $faisabilite = Faisabilite::findOrFail($id);
            return view('faisabilite.show', compact('faisabilite'));
=======
            $faisabilite = Faisabilite::join('objet_essais', 'faisabilites.objet_essai', '=', 'objet_essais.id')->findOrFail($id);

            $params = FaParam::where('fa_params.faisabilite_id', $id)->get();
            $methode = FaMethode::where('fa_methodes.faisabilite_id', $id)->get();
            $equip = FaEquipement::where('fa_equipements.faisabilite_id', $id)->get();
            $pc = FaPc::where('fa_pcs.faisabilite_id', $id)->get();
            $cons = FaConsommable::where('fa_consommables.faisabilite_id', $id)->get();
            $err = PcError::where('pc_errors.faisabilite_id', $id)->get();


            return view('faisabilite.show', [
              'faisabilite' => $faisabilite,
              'params' => $params,
              'methode' => $methode,
              'equip' => $equip,
              'pc' =>$pc,
              'cons' => $cons,
              'err' => $err
            ]);
>>>>>>> develop
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
			'molecule' => 'required',
			'objet_essai' => 'required'
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
