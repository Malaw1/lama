<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\EqQualif;
use Illuminate\Http\Request;

class EqQualifController extends Controller
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
        $model = str_slug('eqqualif','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $eqqualif = EqQualif::where('equipement', 'LIKE', "%$keyword%")
                ->orWhere('date_calib', 'LIKE', "%$keyword%")
                ->orWhere('next_calib', 'LIKE', "%$keyword%")
                ->orWhere('auteur', 'LIKE', "%$keyword%")
                ->orWhere('details', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $eqqualif = EqQualif::paginate($perPage);
            }

            return view('eq-qualif.index', compact('eqqualif'));
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
        $model = str_slug('eqqualif','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('eq-qualif.create');
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
        $model = str_slug('eqqualif','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'equipement' => 'required',
			'date_calib' => 'required',
			'next_calib' => 'required',
			'auteur' => 'required',
			'details' => 'required',
			'user_id' => 'required'
		]);
            $requestData = $request->all();
            
            EqQualif::create($requestData);
            return redirect('eq-qualif/eq-qualif')->with('flash_message', 'EqQualif added!');
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
        $model = str_slug('eqqualif','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $eqqualif = EqQualif::findOrFail($id);
            return view('eq-qualif.show', compact('eqqualif'));
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
        $model = str_slug('eqqualif','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $eqqualif = EqQualif::findOrFail($id);
            return view('eq-qualif.edit', compact('eqqualif'));
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
        $model = str_slug('eqqualif','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'equipement' => 'required',
			'date_calib' => 'required',
			'next_calib' => 'required',
			'auteur' => 'required',
			'details' => 'required',
			'user_id' => 'required'
		]);
            $requestData = $request->all();
            
            $eqqualif = EqQualif::findOrFail($id);
             $eqqualif->update($requestData);

             return redirect('eq-qualif/eq-qualif')->with('flash_message', 'EqQualif updated!');
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
        $model = str_slug('eqqualif','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            EqQualif::destroy($id);

            return redirect('eq-qualif/eq-qualif')->with('flash_message', 'EqQualif deleted!');
        }
        return response(view('403'), 403);

    }
}
