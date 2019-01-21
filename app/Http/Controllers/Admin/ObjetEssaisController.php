<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ObjetEssai;
use App\Fabricant;
use App\Demande;
use App\Molecule;
use Illuminate\Http\Request;

class ObjetEssaisController extends Controller
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
        $model = str_slug('objetessais','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $objetessais = ObjetEssai::where('code', 'LIKE', "%$keyword%")
                ->orWhere('forme_galenique', 'LIKE', "%$keyword%")
                ->orWhere('date_recue', 'LIKE', "%$keyword%")
                ->orWhere('quantite', 'LIKE', "%$keyword%")
                ->orWhere('lot', 'LIKE', "%$keyword%")
                ->orWhere('date_fab', 'LIKE', "%$keyword%")
                ->orWhere('date_exp', 'LIKE', "%$keyword%")
                ->orWhere('provenance', 'LIKE', "%$keyword%")
                ->orWhere('fabricant', 'LIKE', "%$keyword%")
                ->orWhere('demandeur', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $objetessais = ObjetEssai::paginate($perPage);
            }

            return view('objet-essais.index', compact('objetessais'));
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
        $fabricant = Fabricant::all();
        $demande = Demande::all();
        $model = str_slug('objetessais','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('objet-essais.create', ['fabricant' => $fabricant, 'demande' => $demande]);
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
      // $mol = $request->input('molecule');
      //
      // dd($mol);
      $date = $request->input('date_recue');
        $dat = explode('-', $date, 3);
        $year = substr($dat[0], -2);
        $month = $dat[1];
        $day = $dat[2];
        if($request->input('forme_galenique') != 'vaccin'){
            $form = 'M';
        }
        else {
            $form = 'V';
        }


        // $forme = $request->input('forme_galenique');
        // $form = substr($forme[0], -2);

        $objet = ObjetEssai::All()->last();

        if($objet == null){
            $f = '0001';
          //  dd($id);
        }
        else{
          if ($objet->id < 10) {
            $id =$objet->id + 1;
            $f = '000'.$id;
          }elseif ($objet->id < 100) {
            $id =$objet->id + 1;
            $f = '00'.$id;
          }elseif ($objet->id < 1000) {
            $id =$objet->id + 1;
            $f = '0'.$id;
          }
        }

        $code = $form.''.$day.''.$month.''.$year.''.$f;
        // dd($code);
        $model = str_slug('objetessais','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
          $addObjet = ObjetEssai::create([
            'code' => $code,
            'designation' => $request->input('designation'),
            'forme_galenique' => $request->input('forme_galenique'),
            'date_recue' => $request->input('date_recue'),
            'quantite_recue' => $request->input('quantite_recue'),
            'lot' => $request->input('lot'),
            'date_fab' => $request->input('date_fab'),
            'date_exp' => $request->input('date_exp'),
            'provenance' => $request->input('provenance'),
            'fabricant' => $request->input('fabricant'),
            'demandeur' => $request->input('demandeur')
      		]);

        $objet_essai = $addObjet->id;

        $molecule = $request->input('molecule');
        foreach ($molecule as $mole) {
        Molecule::create([
            'molecule' => $mole,
            'objet_essai' => $objet_essai
            ]);
        }
            $requestData = $request->all();

            // ObjetEssai::create($requestData);
            return redirect('objet-essais/objet-essais')->with('flash_message', 'ObjetEssai added!');
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
        $model = str_slug('objetessais','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $objetessai = ObjetEssai::findOrFail($id);
            return view('objet-essais.show', compact('objetessai'));
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
        $model = str_slug('objetessais','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $objetessai = ObjetEssai::findOrFail($id);
            return view('objet-essais.edit', compact('objetessai'));
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
        $model = str_slug('objetessais','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'code' => 'required',
			'forme_galenique' => 'required',
			'date_recue' => 'required',
			'quantite' => 'required',
			'lot' => 'required',
			'date_fab' => 'required',
			'date_exp' => 'required',
			'provenance' => 'required',
			'fabricant' => 'required',
			'demandeur' => 'required'
		]);
            $requestData = $request->all();

            $objetessai = ObjetEssai::findOrFail($id);
             $objetessai->update($requestData);

             return redirect('objet-essais/objet-essais')->with('flash_message', 'ObjetEssai updated!');
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
        $model = str_slug('objetessais','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            ObjetEssai::destroy($id);

            return redirect('objet-essais/objet-essais')->with('flash_message', 'ObjetEssai deleted!');
        }
        return response(view('403'), 403);

    }
}
