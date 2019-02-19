<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\RapportFrontal;
use Illuminate\Http\Request;

class RapportFrontalController extends Controller
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
        $model = str_slug('rapportfrontal','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $rapportfrontal = RapportFrontal::where('molecule', 'LIKE', "%$keyword%")
                ->orWhere('rf_inf_5', 'LIKE', "%$keyword%")
                ->orWhere('rf_inf_10', 'LIKE', "%$keyword%")
                ->orWhere('rf_sup_10', 'LIKE', "%$keyword%")
                ->orWhere('screening', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $rapportfrontal = RapportFrontal::paginate($perPage);
            }

            return view('rapport-frontal.index', compact('rapportfrontal'));
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
        $model = str_slug('rapportfrontal','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('rapport-frontal.create');
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
        $model = str_slug('rapportfrontal','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'molecule' => 'required',
			'rf_inf_5' => 'required',
			'rf_inf_10' => 'required',
			'rf_sup_10' => 'required',
			'screening' => 'required'
		]);
            $requestData = $request->all();
            
            RapportFrontal::create($requestData);
            return redirect('rapportFrontal/rapport-frontal')->with('flash_message', 'RapportFrontal added!');
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
        $model = str_slug('rapportfrontal','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $rapportfrontal = RapportFrontal::findOrFail($id);
            return view('rapport-frontal.show', compact('rapportfrontal'));
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
        $model = str_slug('rapportfrontal','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $rapportfrontal = RapportFrontal::findOrFail($id);
            return view('rapport-frontal.edit', compact('rapportfrontal'));
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
        $model = str_slug('rapportfrontal','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'molecule' => 'required',
			'rf_inf_5' => 'required',
			'rf_inf_10' => 'required',
			'rf_sup_10' => 'required',
			'screening' => 'required'
		]);
            $requestData = $request->all();
            
            $rapportfrontal = RapportFrontal::findOrFail($id);
             $rapportfrontal->update($requestData);

             return redirect('rapportFrontal/rapport-frontal')->with('flash_message', 'RapportFrontal updated!');
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
        $model = str_slug('rapportfrontal','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            RapportFrontal::destroy($id);

            return redirect('rapportFrontal/rapport-frontal')->with('flash_message', 'RapportFrontal deleted!');
        }
        return response(view('403'), 403);

    }
}
