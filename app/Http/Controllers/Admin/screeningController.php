<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\screening;
use App\ObjetEssai;
use App\Molecule;
use App\Demande;
use App\PrincipeActif;
use App\RapportFrontal;
use Illuminate\Http\Request;

class screeningController extends Controller
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
        $model = str_slug('screening','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $screening = screening::where('designation', 'LIKE', "%$keyword%")
                ->orWhere('code', 'LIKE', "%$keyword%")
                ->orWhere('dci', 'LIKE', "%$keyword%")
                ->orWhere('date_exp', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $screening = screening::paginate($perPage);
            }

            return view('screening.index', compact('screening'));
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
        $model = str_slug('screening','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
          $objet = ObjetEssai::join('demandes', 'demandes.id', '=', 'objet_essais.demandeur')->where('objet_essais.code', $_GET['code'])->first();
          // dd($objet);
          $molecule = Molecule::where('demande', $objet->demandeur)->get();
          // $demande = Demande::where()
          // dd($molecule);
            return view('screening.create', ['objet' => $objet, 'molecule' => $molecule]);
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
        $model = str_slug('screening','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'designation' => 'required',
			'code' => 'required',
			'dci' => 'required',
      'delitement' => 'required',
			'date_exp' => 'required',
      'conclusion' => 'required'
		]);


            $requestData = $request->all();
 // dd($requestData);
          $screen = screening::create($requestData);
          // dd($screen->id);
            $pa = PrincipeActif::create([
              'molecule' => $request->input('molecule'),
              'etat' => $request->input('etat'),
               'screening' => $screen->id
            ]);

            $molecule = $request->input('molecule');
            $rf_inf_5 = $request->input('rf_inf_5');
            $rf_inf_10 = $request->input('rf_inf_10');
            $rf_sup_10 = $request->input('rf_sup_10');

            dd($molecule);
            foreach($molecule as $param){
                RapportFrontal::create([

                ]);
            }

            dd($pa);
            return redirect('screening/screening')->with('flash_message', 'screening added!');
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
        $model = str_slug('screening','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $screening = screening::findOrFail($id);
            return view('screening.show', compact('screening'));
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
        $model = str_slug('screening','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $screening = screening::findOrFail($id);
            return view('screening.edit', compact('screening'));
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
        $model = str_slug('screening','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'designation' => 'required',
			'code' => 'required',
			'dci' => 'required',
			'date_exp' => 'required'
		]);
            $requestData = $request->all();

            $screening = screening::findOrFail($id);
             $screening->update($requestData);

             return redirect('screening/screening')->with('flash_message', 'screening updated!');
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
        $model = str_slug('screening','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            screening::destroy($id);

            return redirect('screening/screening')->with('flash_message', 'screening deleted!');
        }
        return response(view('403'), 403);

    }
}
