<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Equipement;
use Illuminate\Http\Request;

class EquipementController extends Controller
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
        $model = str_slug('equipement','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $equipement = Equipement::where('code', 'LIKE', "%$keyword%")
                ->orWhere('appareil', 'LIKE', "%$keyword%")
                ->orWhere('fabricant', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('serie', 'LIKE', "%$keyword%")
                ->orWhere('date_installation', 'LIKE', "%$keyword%")
                ->orWhere('salle', 'LIKE', "%$keyword%")
                ->orWhere('etat', 'LIKE', "%$keyword%")
                ->orWhere('document_technique', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $equipement = Equipement::paginate($perPage);
            }

            return view('equipement.index', compact('equipement'));
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
        $model = str_slug('equipement','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('equipement.create');
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
        $model = str_slug('equipement','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'code' => 'required',
			'appareil' => 'required',
			'fabricant' => 'required',
			'type' => 'required',
			'serie' => 'required',
			'date_installation' => 'required',
			'salle' => 'required',
			'etat' => 'required',
			'document_technique' => 'required'
		]);
            $requestData = $request->all();
            
            Equipement::create($requestData);
            return redirect('equipement/equipement')->with('flash_message', 'Equipement added!');
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
        $model = str_slug('equipement','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $equipement = Equipement::findOrFail($id);
            return view('equipement.show', compact('equipement'));
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
        $model = str_slug('equipement','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $equipement = Equipement::findOrFail($id);
            return view('equipement.edit', compact('equipement'));
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
        $model = str_slug('equipement','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'code' => 'required',
			'appareil' => 'required',
			'fabricant' => 'required',
			'type' => 'required',
			'serie' => 'required',
			'date_installation' => 'required',
			'salle' => 'required',
			'etat' => 'required',
			'document_technique' => 'required'
		]);
            $requestData = $request->all();
            
            $equipement = Equipement::findOrFail($id);
             $equipement->update($requestData);

             return redirect('equipement/equipement')->with('flash_message', 'Equipement updated!');
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
        $model = str_slug('equipement','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Equipement::destroy($id);

            return redirect('equipement/equipement')->with('flash_message', 'Equipement deleted!');
        }
        return response(view('403'), 403);

    }
}
