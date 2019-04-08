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
            $perPage = 2500;

            // $screening = screening::join('rapport_frontals', 'screenings.id','=','rapport_frontals.screening')
            // ->join('principe_actifs', 'principe_actifs.screening','=', 'screenings.id')
            // ->join('objet_essais', 'objet_essais.code', '=', 'screenings.code')
            // ->join('demandes', 'objet_essais.demandeur', '=', 'demandes.id')
            // ->get();
            // dd($screening);

            if (!empty($keyword)) {
                $screening = screening::join('rapport_frontals', 'screenings.id','=','rapport_frontals.screening')
                ->join('principe_actifs', 'principe_actifs.screening','=', 'screenings.id')
                ->join('objet_essais', 'objet_essais.code', '=', 'screenings.code')
                ->join('demandes', 'objet_essais.demandeur', '=', 'demandes.id')
                ->where('designation', 'LIKE', "%$keyword%")
                ->orWhere('code', 'LIKE', "%$keyword%")
                ->orWhere('dci', 'LIKE', "%$keyword%")
                ->orWhere('date_exp', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
              $screening = screening::join('objet_essais', 'objet_essais.code', '=' ,'screenings.code')
              // ->join('rapport_frontals', 'screenings.id','=','rapport_frontals.screening')
              // ->join('objet_essais', 'objet_essais.code', '=' ,'screenings.code')
              ->join('demandes', 'objet_essais.demandeur', '=', 'demandes.id')
              // ->join('principe_actifs', 'principe_actifs.screening','=', 'screenings.id')
              ->select('*', 'objet_essais.code')
              // ->distinct('objet_essais.code')
              ->paginate($perPage);
              // dd($screening);
                // $screening = screening::paginate($perPage);
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
          // dd($objet)
          $molecule = Molecule::where('objet_essai', $objet->demandeur)->get();
          // $demande = Demande::where()
          // dd($objet);
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
              'conclusion' => 'required',
              'impurete' => 'required',
              'desc_physique' => 'required',
              'prospectus' => 'required',
              'identification' => 'required',
              'dosage' => 'required',
              'ipv' => 'required',
              'duree_delitement' => 'required',
              'user_id' => 'required'
          	]);



            $requestData = $request->all();
            // dd($requestData);
 // dd($requestData);
          $screen = screening::create($requestData);
          // dd($screen->id);
          $molecule = $request->input('molecule');
          // dd($molecule);
          $etat = $request->input('etat');
          // dd($etat);
          $teneur = $request->input('teneur');
          for($i = 0; $i < count($etat) ; $i++){
            $pa = PrincipeActif::create([
              'molecule' => $molecule[$i],
              'etat' => $etat[$i],
              'teneur' => $teneur[$i],
              'screening' => $screen->id
            ]);
          }

            $molecul = $request->input('molecule');
            $rf_temoin = $request->input('rf_temoin');
            $rf_echan = $request->input('rf_echan');



            // $rf_erreur =  $rf_temoin + $rf_echan;
            // (($rf_temoin - $rf_echan) / $rf_temoin)
            // $rf_erreur = $rf * 100;
            // dd($rf_temoin, $rf_echan);

         for($i = 0; $i < count($rf_echan) ; $i++){
      $rap = RapportFrontal::create([
            'molecule' => $molecule[$i],
            'rf_temoin' => $rf_temoin[$i],
            'rf_echan' => $rf_echan[$i],
            $hello[$i] = $rf_temoin[$i] - $rf_echan[$i],
            $world[$i] = $hello[$i] * 100,
            $rf_erreur[$i] = $world[$i] / $rf_temoin[$i],
            'rf_erreur' => $rf_erreur[$i],
            'screening' => $screen->id
          ]);
 }
    $screenn = Screening::All()->last();
    $sid = $screenn->id;
    $rapportfrontal = RapportFrontal::All()->where('screening', $sid);
    $pa = PrincipeActif::All()->where('screening', $sid);
    // dd($rap, $pa);
      $screening = screening::findOrFail($sid);
      // return view('screening.show', ['screening' => $screening, 'rapportfrontal' => $rapportfrontal, 'pa' => $pa]);

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
      // dd($id);
        $model = str_slug('screening','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {

          // // dd($rap, $pa);
            $screening = screening::All()->where('code', $id)->first();

            // $screening = screening::join('rapport_frontals', 'screenings.id','=','rapport_frontals.screening')
            // ->join('principe_actifs', 'principe_actifs.screening','=', 'screenings.id')
            // ->join('objet_essais', 'objet_essais.code', '=', 'screenings.code')
            // ->join('demandes', 'objet_essais.demandeur', '=', 'demandes.id')
            // ->where('screenings.code', $id)
            // ->get();

            // dd($screening->id);

            $rapportfrontal = RapportFrontal::All()->where('screening', $screening->id);
            $pa = PrincipeActif::All()->where('screening', $screening->id);

            // $identi = screening::join('rapport_frontals', 'screenings.id','=','rapport_frontals.screening')
            // ->join('principe_actifs', 'principe_actifs.screening','=', 'screenings.id')
            // ->join('objet_essais', 'objet_essais.code', '=', 'screenings.code')
            // ->join('demandes', 'objet_essais.demandeur', '=', 'demandes.id')
            // ->where('screeningS.id', $id)
            // ->get();
            // dd($screening);
            return view('screening.show', ['screening' => $screening, 'rapportfrontal' => $rapportfrontal, 'pa' => $pa]);
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
