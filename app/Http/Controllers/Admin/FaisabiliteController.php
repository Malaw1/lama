<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Faisabilite;
use Illuminate\Http\Request;

class FaisabiliteController extends Controller
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
        $model = str_slug('faisabilite','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $faisabilite = Faisabilite::where('reference', 'LIKE', "%$keyword%")
                ->orWhere('objet_essais', 'LIKE', "%$keyword%")
                ->orWhere('molecule', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $faisabilite = Faisabilite::paginate($perPage);
            }

            return view('faisabilite.index', compact('faisabilite'));
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
        $model = str_slug('faisabilite','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('faisabilite.create');
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
        $model = str_slug('faisabilite','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'reference' => 'required',
			'objet_essais' => 'required',
			'molecule' => 'required',
			'user_id' => 'required'
		]);
            $requestData = $request->all();
            
            Faisabilite::create($requestData);
            return redirect('faisabilite/faisabilite')->with('flash_message', 'Faisabilite added!');
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
        $model = str_slug('faisabilite','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $faisabilite = Faisabilite::findOrFail($id);
            return view('faisabilite.show', compact('faisabilite'));
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
        $model = str_slug('faisabilite','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $faisabilite = Faisabilite::findOrFail($id);
            return view('faisabilite.edit', compact('faisabilite'));
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
        $model = str_slug('faisabilite','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'reference' => 'required',
			'objet_essais' => 'required',
			'molecule' => 'required',
			'user_id' => 'required'
		]);
            $requestData = $request->all();
            
            $faisabilite = Faisabilite::findOrFail($id);
             $faisabilite->update($requestData);

             return redirect('faisabilite/faisabilite')->with('flash_message', 'Faisabilite updated!');
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
        $model = str_slug('faisabilite','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Faisabilite::destroy($id);

            return redirect('faisabilite/faisabilite')->with('flash_message', 'Faisabilite deleted!');
        }
        return response(view('403'), 403);

    }
}
