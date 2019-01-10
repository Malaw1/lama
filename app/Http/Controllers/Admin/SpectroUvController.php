<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\SpectroUv;
use Illuminate\Http\Request;
use App\ReactifUsed;
use App\SolutionStandardUv;
use App\EssaiUv;
use App\ResultatUv;
use App\Conclusion;
use App\MoyCsUv;
use App\MoyWsUv;

class SpectroUvController extends Controller
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
        $model = str_slug('spectrouv','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $spectrouv = SpectroUv::where('equipement', 'LIKE', "%$keyword%")
                ->orWhere('longueure_onde', 'LIKE', "%$keyword%")
                ->orWhere('blanc', 'LIKE', "%$keyword%")
                ->orWhere('balance', 'LIKE', "%$keyword%")
                ->orWhere('ph', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $spectrouv = SpectroUv::paginate($perPage);
            }

            return view('spectro-uv.index', compact('spectrouv'));
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
        $model = str_slug('spectrouv','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('spectro-uv.create');
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
        $ana = $request->input('analyse_id');
        $adduv = SpectroUv::create([
            'equipement' => $request->input('equipement_id'),
            'longueure_onde' => $request->input('onde'),
            'balance' => $request->input('balance'),
            'ph' => $request->input('ph'),
            'blanc' => $request->input('blanc'),
            'analyse_id' => $ana
        ]);

        

        $params = $request->input('reactif');
        $quants = $request->input('qse');
        for($i = 0; $i < count($quants) -1 ; $i++){
        ReactifUsed::create([
            'reactif_id' => $params[$i],
            'quantite' => $quants[$i],
            'analyse_id' => $ana
            ]);
        }

     //   dd($request);

        $solution = SolutionStandardUv::create([
            'substance_id' => $request->input('substance_id'),
            'titre' => $request->input('titre'),
            'pesr1' => $request->input('pesr1'),
            'pesr2' => $request->input('pesr2'),
            'essai1' => $request->input('essai1'),
            'essai2' => $request->input('essai2'),
            'essai3' => $request->input('essai3'),
            'analyse_id' => $ana
        ]);
            
        $do = $request->input('densite_optique');
        $resultat = $request->input('resultat');
        $norme = $request->input('norme');

       // dd($do, $resultat, $norme);

       MoyCsUv::create([
           'densite_optique' => $request->input('do_cs'),
           'resultat'       =>$request->input('result_cs'),
           'norme'          =>$request->input('norm_cs'),
           'analyse_id'     =>$ana
        ]);

        MoyWsUv::create([
            'densite_optique' => $request->input('do_ws'),
            'resultat'       =>$request->input('result_ws'),
            'norme'          =>$request->input('norm_ws'),
            'analyse_id'     =>$ana
         ]);

        for($i = 0; $i < count($norme) ; $i++){
        $essai = EssaiUv::create([
            'densite_optique' => $do[$i],
            'resultat'       => $resultat[$i],
            'norme'          => $norme[$i],
            'analyse_id' => $ana
            ]);

        }

        $res = ResultatUv::create([
            'moy_dosage' => $request->input('moy_dosage'),
            'ecart_type' => $request->input('ecart_type'),
            'cv'        => $request->input('cv'),
            'analyse_id' => $ana
            ]);

        Conclusion::create(['conclusion' => $request->input('conclusion'), 'analyse_id' => $ana]);

        
        return view('analyse.fiche');

        

        /*

        $model = str_slug('spectrouv','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'equipement' => 'required',
			'longueure_onde' => 'required',
			'blanc' => 'required',
			'balance' => 'required',
			'ph' => 'required'
		]);
            $requestData = $request->all();
            
            SpectroUv::create($requestData);
            return redirect('spectro-uv/spectro-uv')->with('flash_message', 'SpectroUv added!');
        }
        return response(view('403'), 403);

        */
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
        $model = str_slug('spectrouv','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $spectrouv = SpectroUv::findOrFail($id);
            return view('spectro-uv.show', compact('spectrouv'));
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
        $model = str_slug('spectrouv','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $spectrouv = SpectroUv::findOrFail($id);
            return view('spectro-uv.edit', compact('spectrouv'));
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
        $model = str_slug('spectrouv','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'equipement' => 'required',
			'longueure_onde' => 'required',
			'blanc' => 'required',
			'balance' => 'required',
			'ph' => 'required'
		]);
            $requestData = $request->all();
            
            $spectrouv = SpectroUv::findOrFail($id);
             $spectrouv->update($requestData);

             return redirect('spectro-uv/spectro-uv')->with('flash_message', 'SpectroUv updated!');
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
        $model = str_slug('spectrouv','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            SpectroUv::destroy($id);

            return redirect('spectro-uv/spectro-uv')->with('flash_message', 'SpectroUv deleted!');
        }
        return response(view('403'), 403);

    }
}
