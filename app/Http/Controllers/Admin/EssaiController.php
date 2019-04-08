<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Essai;
use App\Pesage;
use App\Poid;
use App\Analyse;
use App\ObjetEssai;
use Illuminate\Http\Request;

class EssaiController extends Controller
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
        $model = str_slug('essai','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $essai = Essai::where('parametre', 'LIKE', "%$keyword%")
                ->orWhere('methode', 'LIKE', "%$keyword%")
                ->orWhere('analyse_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $essai = Essai::paginate($perPage);
            }

            return view('essai.index', compact('essai'));
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
        $model = str_slug('essai','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
          $analyse = Analyse::join('objet_essais', 'objet_essais.code', '=', 'analyses.objet')
                              ->where('analyses.id', $_GET['id'])
                              ->first();
                              // dd($analyse);
            return view('essai.create');
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
      // dd($request->input('poids'));
      $model = str_slug('pesage','-');
      if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
          $this->validate($request, [
            'poids_total' => 'required',
            'poids_moyen' => 'required',
            'tolerance' => 'required',
            'ecart_type' => 'required',
            'uniformite_masse' => 'required',
            'variation' => 'required',
            'analyse_id' => 'required',
            'appareil' => 'required',
            'user_id' => 'required'
          ]);

          $requestData = $request->all();
          Pesage::create($requestData);
          $pesage = Pesage::All()->last();
          $user = $request->input('user_id');
          $poids = $request->input('poids');
          foreach ($poids as $poids) {
          Poid::create([
              'poids' => $poids,
              'pesage_id' => $pesage->id,
              'user_id' => $user
              ]);
          }


        // $poids = Poid:: All();


        // dd($poids);
        //
        // $model = str_slug('essai','-');
        // if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
        //     $this->validate($request, [
        //     		'parametre' => 'required',
        //     		'methode' => 'required',
        //     		'analyse_id' => 'required'
        //     	]);
        //     $requestData = $request->all();
        //
        //     Essai::create($requestData);
            return redirect('essai/essai')->with('flash_message', 'Essai added!');
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
        $model = str_slug('essai','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $objet = ObjetEssai::join('analyses', 'analyses.objet', '=', 'objet_essais.code')
                                  ->where('analyses.objet', $id)
                                  ->select('*', 'analyses.id')
                                  ->first();
                                  // dd($objet);
            $essai = Essai::join('analyses', 'essais.analyse_id', '=', 'analyses.id')
            ->where('analyse_id', $objet->id)->get();
            // dd($essai);
            return view('essai.temp', ['essai' => $essai, 'objet' => $objet]);
        }
        return response(view('403'), 403);
    }

    public function temp()
    {

            return view('essai.show', compact('essai'));

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
        $model = str_slug('essai','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $essai = Essai::findOrFail($id);
            return view('essai.edit', compact('essai'));
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
        $model = str_slug('essai','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'parametre' => 'required',
			'methode' => 'required',
			'analyse_id' => 'required'
		]);
            $requestData = $request->all();

            $essai = Essai::findOrFail($id);
             $essai->update($requestData);

             return redirect('essai/essai')->with('flash_message', 'Essai updated!');
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
        $model = str_slug('essai','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Essai::destroy($id);

            return redirect('essai/essai')->with('flash_message', 'Essai deleted!');
        }
        return response(view('403'), 403);

    }
}
