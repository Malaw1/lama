<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\FaMolecule;
use Illuminate\Http\Request;

class FaMoleculeController extends Controller
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
        $model = str_slug('famolecule','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $famolecule = FaMolecule::where('molecule', 'LIKE', "%$keyword%")
                ->orWhere('dosage', 'LIKE', "%$keyword%")
                ->orWhere('faisabilite_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $famolecule = FaMolecule::paginate($perPage);
            }

            return view('fa-molecule.index', compact('famolecule'));
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
        $model = str_slug('famolecule','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('fa-molecule.create');
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
        $model = str_slug('famolecule','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'molecule' => 'required',
			'dosage' => 'required',
			'faisabilite_id' => 'required'
		]);
            $requestData = $request->all();
            
            FaMolecule::create($requestData);
            return redirect('fa-molecule/fa-molecule')->with('flash_message', 'FaMolecule added!');
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
        $model = str_slug('famolecule','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $famolecule = FaMolecule::findOrFail($id);
            return view('fa-molecule.show', compact('famolecule'));
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
        $model = str_slug('famolecule','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $famolecule = FaMolecule::findOrFail($id);
            return view('fa-molecule.edit', compact('famolecule'));
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
        $model = str_slug('famolecule','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'molecule' => 'required',
			'dosage' => 'required',
			'faisabilite_id' => 'required'
		]);
            $requestData = $request->all();
            
            $famolecule = FaMolecule::findOrFail($id);
             $famolecule->update($requestData);

             return redirect('fa-molecule/fa-molecule')->with('flash_message', 'FaMolecule updated!');
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
        $model = str_slug('famolecule','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            FaMolecule::destroy($id);

            return redirect('fa-molecule/fa-molecule')->with('flash_message', 'FaMolecule deleted!');
        }
        return response(view('403'), 403);

    }
}
