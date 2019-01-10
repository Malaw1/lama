<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Consommable;
use Illuminate\Http\Request;

class ConsommableController extends Controller
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
        $model = str_slug('consommable','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $consommable = Consommable::where('designation', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('fabricant', 'LIKE', "%$keyword%")
                ->orWhere('date_recue', 'LIKE', "%$keyword%")
                ->orWhere('quantite_recue', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $consommable = Consommable::paginate($perPage);
            }

            return view('consommable.index', compact('consommable'));
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
        $model = str_slug('consommable','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('consommable.create');
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
        $model = str_slug('consommable','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'designation' => 'required',
			'type' => 'required',
			'fabricant' => 'required',
			'date_recue' => 'required',
			'quantite_recue' => 'required'
		]);
            $requestData = $request->all();
            
            Consommable::create($requestData);
            return redirect('consommable/consommable')->with('flash_message', 'Consommable added!');
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
        $model = str_slug('consommable','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $consommable = Consommable::findOrFail($id);
            return view('consommable.show', compact('consommable'));
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
        $model = str_slug('consommable','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $consommable = Consommable::findOrFail($id);
            return view('consommable.edit', compact('consommable'));
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
        $model = str_slug('consommable','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'designation' => 'required',
			'type' => 'required',
			'fabricant' => 'required',
			'date_recue' => 'required',
			'quantite_recue' => 'required'
		]);
            $requestData = $request->all();
            
            $consommable = Consommable::findOrFail($id);
             $consommable->update($requestData);

             return redirect('consommable/consommable')->with('flash_message', 'Consommable updated!');
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
        $model = str_slug('consommable','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Consommable::destroy($id);

            return redirect('consommable/consommable')->with('flash_message', 'Consommable deleted!');
        }
        return response(view('403'), 403);

    }
}
