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
            $perPage = 1000000;

            if (!empty($keyword)) {
                $objetessais = ObjetEssai::join('demandes', 'demandes.id', '=', 'objet_essais.demandeur')
                ->where('code', 'LIKE', "%$keyword%")
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
                $objetessais = ObjetEssai::join('demandes', 'demandes.id', '=', 'objet_essais.demandeur')
                ->select('*', 'objet_essais.code')
                ->paginate($perPage);
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

    //  dd($_GET['id']);
        $demande = Demande::where('code', $_GET['id'])->first();
        $molecule = Molecule::join('demandes', 'demandes.id', '=', 'molecules.demande')
        ->where('demandes.code', $_GET['id'])->get();
        //dd($molecule);

      // dd($demande);
        $model = str_slug('objetessais','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('objet-essais.create', ['demande' => $demande, 'molecule' => $molecule]);
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

        $code = $form.''.$year.''.$f;
        // dd($code);
        $model = str_slug('objetessais','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
          $addObjet = ObjetEssai::create([
            'code' => $code,
            'designation' => $request->input('designation'),
            'forme_galenique' => $request->input('forme_galenique'),
            'date_recue' => $request->input('date_recue'),
            'quantite' => $request->input('quantite'),
            'lot' => $request->input('lot'),
            'date_fab' => $request->input('date_fab'),
            'date_exp' => $request->input('date_exp'),
            'provenance' => $request->input('provenance'),
            'fabricant' => $request->input('fabricant'),
            'demandeur' => $request->input('demandeur'),
            'user_id' => $request->input('user_id')
      		]);

          // dd($request->input('demandeur'));
            $requestData = $request->all();
            $objet = ObjetEssai::All()->last();
            // $objet = ObjetEssai::join('demandes', 'demandes.code', '=', );
            // dd($objet);
return redirect('objet-essais/objet-essais/'.$objet->code);
            // ObjetEssai::create($requestData);
            // return redirect('objet-essais/objet-essais')->with('flash_message', 'ObjetEssai added!');
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
              // $objetessai = ObjetEssai::findOrFail($id);
              $objetessai = ObjetEssai::join('demandes', 'demandes.id', '=', 'objet_essais.demandeur')
              ->join('clients', 'clients.id', '=', 'demandes.client')
              // ->join('molecules', 'molecules.demande', '=', 'demandes.id')
              ->select('*', 'objet_essais.code', 'demandes.id')
              ->where('objet_essais.code', $id)
              ->first();

              $code = $objetessai->id;
              // dd($code);
              $molecule = Molecule::join('demandes', 'molecules.demande', '=', 'demandes.id')
              ->where('molecules.demande', $code)
              ->get();
               // dd($objetessai);
               // dd($molecule);

            // $objetessai = ObjetEssai::join('demandes', 'demandes.id', '=', 'objet_essais.demandeur')->findOrFail($id);
            return view('objet-essais.show', ['objetessai' => $objetessai, 'molecule' => $molecule]);
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

    public function demande()
    {
        dd('hello world');
    }
}
