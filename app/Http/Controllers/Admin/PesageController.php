<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pesage;
use Illuminate\Http\Request;
use App\Poid;
use App\Analyse;

class PesageController extends Controller
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
        $model = str_slug('pesage','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $pesage = Pesage::where('ptotal', 'LIKE', "%$keyword%")
                ->orWhere('pm', 'LIKE', "%$keyword%")
                ->orWhere('tolerance', 'LIKE', "%$keyword%")
                ->orWhere('ecart_type', 'LIKE', "%$keyword%")
                ->orWhere('uniformite_masse', 'LIKE', "%$keyword%")
                ->orWhere('variation', 'LIKE', "%$keyword%")
                ->orWhere('equipement', 'LIKE', "%$keyword%")
                ->orWhere('analyse_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $pesage = Pesage::paginate($perPage);
            }

            return view('pesage.index', compact('pesage'));
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
        $model = str_slug('pesage','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('pesage.create');
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

        /*
        // dd($test);
        $model = str_slug('pesage','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {

            $addPoids = Pesage::create([
                'pm' => $request->input('pm'),
                'ptotal' => $request->input('ptotal'),
                'tolerance' => $request->input('tolerance'),
                'uniformite_masse' => $request->input('uniformite_masse'),
                'ecart_type' => $request->input('ecartType'),
                'variation' => $request->input('variation'),
                'equipement_id' => $request->input('equipement_id'),
                'analyse_id' => $ana
            ]);
            
            $pesage_id = $addPoids->id;

            $params = $request->input('poids');
            //dd($params);

            foreach($params as $param){

                $poid = Poid::create([
                    'poids' => $param,
                    'pesage_id' => $pesage_id
                ]);
            }

            $analyseUpdate = Analyse::where('id', $ana)->update([
                'etat' => 'analysing'
            ]);
    
            $requestData = $request->all();
            
            */

            
            //dd($request->uniformite_masse);
            $pesage = new Pesage();
            $pesage->ptotal = $request->ptotal;
            $pesage->tolerance = $request->tolerance;
            $pesage->uniformite_masse = $request->uniformite_masse;
            $pesage->ecart_type = $request->ecartType;
            $pesage->variation = $request->variation;
            $pesage->equipement_id = $request->equipement_id;
            $pesage->pm = $request->pm;
            $pesage->analyse_id = $ana;

            $pesage->save();
               //        dd($pesage);
            $pesage_id = $pesage->id;

            $params = $request->input('poids');
            //dd($params);

            foreach($params as $param){

                $poid = Poid::create([
                    'poids' => $param,
                    'pesage_id' => $pesage_id
                ]);
            }
            return redirect('pesage/pesage/'.$pesage_id)->with('status', 'Profile updated!');
           // return response()->json(['success'=>'Data is successfully added']);
            
          //  return redirect('pesage/pesage/'.$pesage_id)->with('flash_message', 'Pesage added!');
     //   }
      //  return response(view('403'), 403);
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
        $model = str_slug('pesage','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $pesage = Pesage::findOrFail($id);
            return view('pesage.show', compact('pesage'));
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
        $model = str_slug('pesage','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $pesage = Pesage::findOrFail($id);
            return view('pesage.edit', compact('pesage'));
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
        $model = str_slug('pesage','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'ptotal' => 'required',
			'pm' => 'required',
			'tolerance' => 'required',
			'ecart_type' => 'required',
			'uniformite_masse' => 'required',
			'variation' => 'required',
			'equipement' => 'required',
			'analyse_id' => 'required'
		]);
            $requestData = $request->all();
            
            $pesage = Pesage::findOrFail($id);
             $pesage->update($requestData);

             return redirect('pesage/pesage')->with('flash_message', 'Pesage updated!');
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
        $model = str_slug('pesage','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Pesage::destroy($id);

            return redirect('pesage/pesage')->with('flash_message', 'Pesage deleted!');
        }
        return response(view('403'), 403);

    }
}
