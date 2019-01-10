<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\FaEquipement;
use Illuminate\Http\Request;

class FaEquipementController extends Controller
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
        $model = str_slug('faequipement','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $faequipement = FaEquipement::where('faisabilite_id', 'LIKE', "%$keyword%")
                ->orWhere('equipement', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $faequipement = FaEquipement::paginate($perPage);
            }

            return view('fa-equipement.index', compact('faequipement'));
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
        $model = str_slug('faequipement','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('fa-equipement.create');
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
        $model = str_slug('faequipement','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'faisabilite_id' => 'required',
			'equipement' => 'required'
		]);
            $requestData = $request->all();
            
            FaEquipement::create($requestData);
            return redirect('fa-equipement/fa-equipement')->with('flash_message', 'FaEquipement added!');
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
        $model = str_slug('faequipement','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $faequipement = FaEquipement::findOrFail($id);
            return view('fa-equipement.show', compact('faequipement'));
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
        $model = str_slug('faequipement','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $faequipement = FaEquipement::findOrFail($id);
            return view('fa-equipement.edit', compact('faequipement'));
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
        $model = str_slug('faequipement','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'faisabilite_id' => 'required',
			'equipement' => 'required'
		]);
            $requestData = $request->all();
            
            $faequipement = FaEquipement::findOrFail($id);
             $faequipement->update($requestData);

             return redirect('fa-equipement/fa-equipement')->with('flash_message', 'FaEquipement updated!');
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
        $model = str_slug('faequipement','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            FaEquipement::destroy($id);

            return redirect('fa-equipement/fa-equipement')->with('flash_message', 'FaEquipement deleted!');
        }
        return response(view('403'), 403);

    }
}
