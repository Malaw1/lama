<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ObjetEssai;
use Illuminate\Http\Request;
use App\Fabricant;
use App\Demande;

class ObjetEssaiController extends Controller
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
        $model = str_slug('objetessai','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $objetessai = ObjetEssai::where('code', 'LIKE', "%$keyword%")
                ->orWhere('designation', 'LIKE', "%$keyword%")
                ->orWhere('forme_galenique', 'LIKE', "%$keyword%")
                ->orWhere('date_recue', 'LIKE', "%$keyword%")
                ->orWhere('quantite_recue', 'LIKE', "%$keyword%")
                ->orWhere('lot', 'LIKE', "%$keyword%")
                ->orWhere('date_fab', 'LIKE', "%$keyword%")
                ->orWhere('date_exp', 'LIKE', "%$keyword%")
                ->orWhere('provenance', 'LIKE', "%$keyword%")
                ->orWhere('fabricant_id', 'LIKE', "%$keyword%")
                ->orWhere('demande_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $objetessai = ObjetEssai::paginate($perPage);
            }

            return view('objet-essai.index', compact('objetessai'));
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
        $model = str_slug('objetessai','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('objet-essai.create', ['fabricant' => $fabricant, 'demande' => $demande]);
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
            $id = 1;
        }
        else{
            $id = $objet->id + 1;
        }



        $code = $form.''.$day.''.$month.''.$year.''.$id;

       // dd($code);

       

        $model = str_slug('objetessai','-');
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
			'fabricant_id' => $request->input('fabricant_id'),
			'demande_id' => $request->input('demande_id'),
		]);
            
            return redirect('objetEssai/objet-essai')->with('flash_message', 'ObjetEssai added!');
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
        $model = str_slug('objetessai','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $objetessai = ObjetEssai::findOrFail($id);
            return view('objet-essai.show', compact('objetessai'));
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
        $model = str_slug('objetessai','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $objetessai = ObjetEssai::findOrFail($id);
            return view('objet-essai.edit', compact('objetessai'));
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
        $model = str_slug('objetessai','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'code' => 'required',
			'designation' => 'required',
			'forme_galenique' => 'required',
			'date_recue' => 'required',
			'quantite_recue' => 'required',
			'lot' => 'required',
			'date_fab' => 'required',
			'date_exp' => 'required',
			'provenance' => 'required',
			'fabricant_id' => 'required',
			'demande_id' => 'required'
		]);
            $requestData = $request->all();
            
            $objetessai = ObjetEssai::findOrFail($id);
             $objetessai->update($requestData);

             return redirect('objetEssai/objet-essai')->with('flash_message', 'ObjetEssai updated!');
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
        $model = str_slug('objetessai','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            ObjetEssai::destroy($id);

            return redirect('objetEssai/objet-essai')->with('flash_message', 'ObjetEssai deleted!');
        }
        return response(view('403'), 403);

    }
}
