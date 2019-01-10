<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\FaMateriel;
use Illuminate\Http\Request;

class FaMaterielController extends Controller
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
        $model = str_slug('famateriel','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $famateriel = FaMateriel::where('faisabilite_id', 'LIKE', "%$keyword%")
                ->orWhere('materiel', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $famateriel = FaMateriel::paginate($perPage);
            }

            return view('fa-materiel.index', compact('famateriel'));
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
        $model = str_slug('famateriel','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('fa-materiel.create');
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
        $model = str_slug('famateriel','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'faisabilite_id' => 'required',
			'materiel' => 'required'
		]);
            $requestData = $request->all();
            
            FaMateriel::create($requestData);
            return redirect('fa-materiel/fa-materiel')->with('flash_message', 'FaMateriel added!');
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
        $model = str_slug('famateriel','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $famateriel = FaMateriel::findOrFail($id);
            return view('fa-materiel.show', compact('famateriel'));
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
        $model = str_slug('famateriel','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $famateriel = FaMateriel::findOrFail($id);
            return view('fa-materiel.edit', compact('famateriel'));
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
        $model = str_slug('famateriel','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'faisabilite_id' => 'required',
			'materiel' => 'required'
		]);
            $requestData = $request->all();
            
            $famateriel = FaMateriel::findOrFail($id);
             $famateriel->update($requestData);

             return redirect('fa-materiel/fa-materiel')->with('flash_message', 'FaMateriel updated!');
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
        $model = str_slug('famateriel','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            FaMateriel::destroy($id);

            return redirect('fa-materiel/fa-materiel')->with('flash_message', 'FaMateriel deleted!');
        }
        return response(view('403'), 403);

    }
}
