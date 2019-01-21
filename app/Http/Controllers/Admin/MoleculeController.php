<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Molecule;
use Illuminate\Http\Request;

class MoleculeController extends Controller
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
        $model = str_slug('molecule','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $molecule = Molecule::where('molecule', 'LIKE', "%$keyword%")
                ->orWhere('objet_essai', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $molecule = Molecule::paginate($perPage);
            }

            return view('molecule.index', compact('molecule'));
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
        $model = str_slug('molecule','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('molecule.create');
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
        $model = str_slug('molecule','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'molecule' => 'required',
			'objet_essai' => 'required'
		]);
            $requestData = $request->all();
            
            Molecule::create($requestData);
            return redirect('molecule/molecule')->with('flash_message', 'Molecule added!');
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
        $model = str_slug('molecule','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $molecule = Molecule::findOrFail($id);
            return view('molecule.show', compact('molecule'));
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
        $model = str_slug('molecule','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $molecule = Molecule::findOrFail($id);
            return view('molecule.edit', compact('molecule'));
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
        $model = str_slug('molecule','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'molecule' => 'required',
			'objet_essai' => 'required'
		]);
            $requestData = $request->all();
            
            $molecule = Molecule::findOrFail($id);
             $molecule->update($requestData);

             return redirect('molecule/molecule')->with('flash_message', 'Molecule updated!');
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
        $model = str_slug('molecule','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Molecule::destroy($id);

            return redirect('molecule/molecule')->with('flash_message', 'Molecule deleted!');
        }
        return response(view('403'), 403);

    }
}
