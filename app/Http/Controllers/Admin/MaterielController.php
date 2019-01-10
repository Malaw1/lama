<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Materiel;
use Illuminate\Http\Request;

class MaterielController extends Controller
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
        $model = str_slug('materiel','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $materiel = Materiel::where('designation', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('fabricant', 'LIKE', "%$keyword%")
                ->orWhere('date_recue', 'LIKE', "%$keyword%")
                ->orWhere('quantite_recue', 'LIKE', "%$keyword%")
                ->orWhere('lot', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $materiel = Materiel::paginate($perPage);
            }

            return view('materiel.index', compact('materiel'));
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
        $model = str_slug('materiel','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('materiel.create');
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
        $model = str_slug('materiel','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'designation' => 'required',
			'type' => 'required',
			'fabricant' => 'required',
			'date_recue' => 'required',
			'quantite_recue' => 'required',
			'lot' => 'required'
		]);
            $requestData = $request->all();
            
            Materiel::create($requestData);
            return redirect('materiel/materiel')->with('flash_message', 'Materiel added!');
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
        $model = str_slug('materiel','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $materiel = Materiel::findOrFail($id);
            return view('materiel.show', compact('materiel'));
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
        $model = str_slug('materiel','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $materiel = Materiel::findOrFail($id);
            return view('materiel.edit', compact('materiel'));
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
        $model = str_slug('materiel','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'designation' => 'required',
			'type' => 'required',
			'fabricant' => 'required',
			'date_recue' => 'required',
			'quantite_recue' => 'required',
			'lot' => 'required'
		]);
            $requestData = $request->all();
            
            $materiel = Materiel::findOrFail($id);
             $materiel->update($requestData);

             return redirect('materiel/materiel')->with('flash_message', 'Materiel updated!');
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
        $model = str_slug('materiel','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Materiel::destroy($id);

            return redirect('materiel/materiel')->with('flash_message', 'Materiel deleted!');
        }
        return response(view('403'), 403);

    }
}
