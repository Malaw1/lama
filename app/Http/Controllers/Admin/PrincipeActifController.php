<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PrincipeActif;
use Illuminate\Http\Request;

class PrincipeActifController extends Controller
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
        $model = str_slug('principeactif','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $principeactif = PrincipeActif::where('molecule', 'LIKE', "%$keyword%")
                ->orWhere('etat', 'LIKE', "%$keyword%")
                ->orWhere('screening', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $principeactif = PrincipeActif::paginate($perPage);
            }

            return view('principe-actif.index', compact('principeactif'));
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
        $model = str_slug('principeactif','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('principe-actif.create');
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
        $model = str_slug('principeactif','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'molecule' => 'required',
			'etat' => 'required',
			'screening' => 'required'
		]);
            $requestData = $request->all();
            
            PrincipeActif::create($requestData);
            return redirect('principe-actif/principe-actif')->with('flash_message', 'PrincipeActif added!');
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
        $model = str_slug('principeactif','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $principeactif = PrincipeActif::findOrFail($id);
            return view('principe-actif.show', compact('principeactif'));
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
        $model = str_slug('principeactif','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $principeactif = PrincipeActif::findOrFail($id);
            return view('principe-actif.edit', compact('principeactif'));
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
        $model = str_slug('principeactif','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'molecule' => 'required',
			'etat' => 'required',
			'screening' => 'required'
		]);
            $requestData = $request->all();
            
            $principeactif = PrincipeActif::findOrFail($id);
             $principeactif->update($requestData);

             return redirect('principe-actif/principe-actif')->with('flash_message', 'PrincipeActif updated!');
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
        $model = str_slug('principeactif','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            PrincipeActif::destroy($id);

            return redirect('principe-actif/principe-actif')->with('flash_message', 'PrincipeActif deleted!');
        }
        return response(view('403'), 403);

    }
}
