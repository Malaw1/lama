<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ParaDemande;
use Illuminate\Http\Request;

class ParaDemandeController extends Controller
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
        $model = str_slug('parademande','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $parademande = ParaDemande::where('parametre', 'LIKE', "%$keyword%")
                ->orWhere('demande', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $parademande = ParaDemande::paginate($perPage);
            }

            return view('para-demande.index', compact('parademande'));
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
        $model = str_slug('parademande','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('para-demande.create');
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
        $model = str_slug('parademande','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'parametre' => 'required',
			'demande' => 'required'
		]);
            $requestData = $request->all();
            
            ParaDemande::create($requestData);
            return redirect('para-demande/para-demande')->with('flash_message', 'ParaDemande added!');
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
        $model = str_slug('parademande','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $parademande = ParaDemande::findOrFail($id);
            return view('para-demande.show', compact('parademande'));
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
        $model = str_slug('parademande','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $parademande = ParaDemande::findOrFail($id);
            return view('para-demande.edit', compact('parademande'));
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
        $model = str_slug('parademande','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'parametre' => 'required',
			'demande' => 'required'
		]);
            $requestData = $request->all();
            
            $parademande = ParaDemande::findOrFail($id);
             $parademande->update($requestData);

             return redirect('para-demande/para-demande')->with('flash_message', 'ParaDemande updated!');
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
        $model = str_slug('parademande','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            ParaDemande::destroy($id);

            return redirect('para-demande/para-demande')->with('flash_message', 'ParaDemande deleted!');
        }
        return response(view('403'), 403);

    }
}
