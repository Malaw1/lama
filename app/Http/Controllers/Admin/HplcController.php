<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Hplc;
use Illuminate\Http\Request;
use App\ReactifUsed;
use App\Chromato;
use App\Diluant;
use App\SolutionStandardHplc;
use App\PhaseMobile;
use App\EssaiHplc;
use App\ResultatHplc;
use App\Conclusion;
use App\Analyse;
use App\Reactif;

class HplcController extends Controller
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
        $model = str_slug('hplc','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $hplc = Hplc::where('equipement', 'LIKE', "%$keyword%")
                ->orWhere('balance', 'LIKE', "%$keyword%")
                ->orWhere('pHmetre', 'LIKE', "%$keyword%")
                ->orWhere('analyse_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $hplc = Hplc::paginate($perPage);
            }

            return view('hplc.index', compact('hplc'));
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
        $model = str_slug('hplc','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('hplc.create');
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

        $addHplc = Hplc::create([
            'equipement_id' => $request->input('equipement_id'),
            'balance' => $request->input('balance'),
            'pHmetre' => $request->input('pHmetre'),
            'analyse_id' => $ana
        ]);


        $params = $request->input('reactif');
        $quants = $request->input('qsed');

        for($i = 0; $i < count($params) -1 ; $i++){
        ReactifUsed::create([
            'reactif_id' => $params[$i],
            'quantite' => $quants[$i],
            'analyse_id' => $ana
        ]);
        }
        

        
        /*
        for($i = 0; $i < count($params) -1 ; $i++){
        $reactifUpdate = Reactif::where('id', $params[$i])->update([
            'quantite' => $request->input('')
        ]);
        }
        */
       $chromato = Chromato::create([
            'volume_injection' => $request->input('volume_injection'),
            'debit' => $request->input('debit'),
            'longueur_onde' => $request->input('longueur_onde'),
            'detection' => $request->input('detection'),
            'temperature' => $request->input('temperature'),
            'colonne' => $request->input('colonne'),
            'analyse_id' => $ana
        ]);


        $diluants = $request->input('diluant');
        $qt = $request->input('qt');
        //dd($diluants);
        for($i = 0; $i < count($diluants) -1 ; $i++){

            Diluant::create([
                'substance_id' => $diluants[$i],
                'quantite' => $qt[$i],
                'analyse_id' => $ana
            ]);
         }

         $phaseMobile = PhaseMobile::create([
            'substance' => $request->input('substance'),
            'pH' => $request->input('pH'),
            'ajustage' => $request->input('ajustage'),
            'analyse_id' => $ana
        ]);

        $solution = SolutionStandardHplc::create([
            'substance_id' => $request->input('substance_id'),
            'titre' => $request->input('titre'),
            'pesr1' => $request->input('pesr1'),
            'pesr2' => $request->input('pesr2'),
            'essai1' => $request->input('essai1'),
            'essai2' => $request->input('essai2'),
            'essai3' => $request->input('essai3'),
            'analyse_id' => $ana
        ]);

        $essais = $request->input('resultat');
       // dd($essais);
        $normes = $request->input('norme');
      //  dd($norme);

      for($i = 0; $i < count($essais) -1 ; $i++){
            EssaiHplc::create([
                'resultat' => $essais[$i],
                'norme' => $normes[$i],
                'analyse_id' => $ana
            ]);
        }

        $resultat = ResultatHplc::create([
            'moyenne' => $request->input('moyenne'),
            'ecart_type' => $request->input('ecart_type'),
            'cv' => $request->input('cv'),
            'analyse_id' => $ana

        ]);


        $conclusion = Conclusion::create([
            'conclusion' => $request->input('conclusion'),
            'analyse_id' => $ana
        ]);

        $analyseUpdate = Analyse::where('id', $ana)->update([
            'etat' => 'analysing'
        ]);

        dd($analyseUpdate);

        if($analyseUpdate){
            return redirect()->route('analyses.edit', ['analyse'=>$ana]);
        }


        dd($conclusion);
        /*
        *
        dd($request);
        $model = str_slug('hplc','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'equipement' => 'required',
			'pHmetre' => 'required',
			'analyse_id' => 'required'
		]);
            $requestData = $request->all();
            
            Hplc::create($requestData);
            return redirect('hplc/hplc')->with('flash_message', 'Hplc added!');
        }
        return response(view('403'), 403);

        *******/

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
        $model = str_slug('hplc','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $hplc = Hplc::findOrFail($id);
            return view('hplc.show', compact('hplc'));
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
        $model = str_slug('hplc','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $hplc = Hplc::findOrFail($id);
            return view('hplc.edit', compact('hplc'));
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
        $model = str_slug('hplc','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'equipement' => 'required',
			'pHmetre' => 'required',
			'analyse_id' => 'required'
		]);
            $requestData = $request->all();
            
            $hplc = Hplc::findOrFail($id);
             $hplc->update($requestData);

             return redirect('hplc/hplc')->with('flash_message', 'Hplc updated!');
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
        $model = str_slug('hplc','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Hplc::destroy($id);

            return redirect('hplc/hplc')->with('flash_message', 'Hplc deleted!');
        }
        return response(view('403'), 403);

    }
}
