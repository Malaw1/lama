<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\FaConsommable;
use Illuminate\Http\Request;

class FaConsommableController extends Controller
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
        $model = str_slug('faconsommable','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $faconsommable = FaConsommable::where('consommable', 'LIKE', "%$keyword%")
                ->orWhere('faisabilite_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $faconsommable = FaConsommable::paginate($perPage);
            }

            return view('fa-consommable.index', compact('faconsommable'));
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
        $model = str_slug('faconsommable','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('fa-consommable.create');
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
        $model = str_slug('faconsommable','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'consommable' => 'required',
			'faisabilite_id' => 'required'
		]);
            $requestData = $request->all();
            
            FaConsommable::create($requestData);
            return redirect('fa-consommable/fa-consommable')->with('flash_message', 'FaConsommable added!');
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
        $model = str_slug('faconsommable','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $faconsommable = FaConsommable::findOrFail($id);
            return view('fa-consommable.show', compact('faconsommable'));
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
        $model = str_slug('faconsommable','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $faconsommable = FaConsommable::findOrFail($id);
            return view('fa-consommable.edit', compact('faconsommable'));
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
        $model = str_slug('faconsommable','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'consommable' => 'required',
			'faisabilite_id' => 'required'
		]);
            $requestData = $request->all();
            
            $faconsommable = FaConsommable::findOrFail($id);
             $faconsommable->update($requestData);

             return redirect('fa-consommable/fa-consommable')->with('flash_message', 'FaConsommable updated!');
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
        $model = str_slug('faconsommable','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            FaConsommable::destroy($id);

            return redirect('fa-consommable/fa-consommable')->with('flash_message', 'FaConsommable deleted!');
        }
        return response(view('403'), 403);

    }
}
