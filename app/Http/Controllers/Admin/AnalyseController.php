<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Analyse;
use App\ObjetEssai;
use App\User;
use App\Molecule;
use App\Faisabilite;
use Illuminate\Http\Request;

class AnalyseController extends Controller
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
        $model = str_slug('analyse','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $analyse = Analyse::where('objet_essai', 'LIKE', "%$keyword%")
                ->orWhere('reference', 'LIKE', "%$keyword%")
                ->orWhere('dci', 'LIKE', "%$keyword%")
                ->orWhere('dosage', 'LIKE', "%$keyword%")
                ->orWhere('etat', 'LIKE', "%$keyword%")
                ->orWhere('responable', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $analyse = Analyse::paginate($perPage);
            }

            return view('analyse.index', compact('analyse'));
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
        $model = str_slug('analyse','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
           $objet = ObjetEssai::All()->where('code', $_GET['code'])->first();
           $user = User::All();
         //  dd($objet);
           $molecule = Molecule::where('demande', $objet->demandeur)->get();
           $fais = Faisabilite::where('objet_essais', $objet->id)->first();
          // dd($user);
            return view('analyse.create', ['objet' => $objet, 'user' => $user, 'molecule' => $molecule, 'fais' => $fais]);
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
      // dd($request->input('responsable')
      // , $request->input('reference')
      // , $request->input('dci')
      // , $request->input('objet') );
        $model = str_slug('analyse','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
      			'objet' => 'required',
      			'reference' => 'required',
      			'dci' => 'required',
      			'etat' => 'required',
      			'responsable' => 'required',
            'user_id' => 'required'
      		]);
            $requestData = $request->all();
            Analyse::create($requestData);
            return redirect('analyse/analyse')->with('flash_message', 'Analyse added!');
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
        $model = str_slug('analyse','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $analyse = Analyse::findOrFail($id);
            return view('analyse.show', compact('analyse'));
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
        $model = str_slug('analyse','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $analyse = Analyse::findOrFail($id);
            return view('analyse.edit', compact('analyse'));
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
        $model = str_slug('analyse','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'objet_essai' => 'required',
			'reference' => 'required',
			'dci' => 'required',
			'dosage' => 'required',
			'etat' => 'required',
			'responable' => 'required'
		]);
            $requestData = $request->all();

            $analyse = Analyse::findOrFail($id);
             $analyse->update($requestData);

             return redirect('analyse/analyse')->with('flash_message', 'Analyse updated!');
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
        $model = str_slug('analyse','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Analyse::destroy($id);

            return redirect('analyse/analyse')->with('flash_message', 'Analyse deleted!');
        }
        return response(view('403'), 403);

    }
}
