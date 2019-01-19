<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Substance;
use Illuminate\Http\Request;

class SubstanceController extends Controller
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
        $model = str_slug('substance','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $substance = Substance::where('designation', 'LIKE', "%$keyword%")
                ->orWhere('date_recue', 'LIKE', "%$keyword%")
                ->orWhere('depositaire', 'LIKE', "%$keyword%")
                ->orWhere('unite_recue', 'LIKE', "%$keyword%")
                ->orWhere('quantite', 'LIKE', "%$keyword%")
                ->orWhere('fabricant', 'LIKE', "%$keyword%")
                ->orWhere('lot', 'LIKE', "%$keyword%")
                ->orWhere('date_fab', 'LIKE', "%$keyword%")
                ->orWhere('date_exp', 'LIKE', "%$keyword%")
                ->orWhere('catalog', 'LIKE', "%$keyword%")
                ->orWhere('cas', 'LIKE', "%$keyword%")
                ->orWhere('prix', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $substance = Substance::paginate($perPage);
            }

            return view('substance.index', compact('substance'));
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
        $model = str_slug('substance','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('substance.create');
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
        $model = str_slug('substance','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'designation' => 'required',
			'date_recue' => 'required',
			'depositaire' => 'required',
			'unite_recue' => 'required',
			'quantite' => 'required',
			'fabricant' => 'required',
			'lot' => 'required',
			'date_fab' => 'required',
			'date_exp' => 'required',
			'user_id' => 'required'
		]);
            $requestData = $request->all();
            
            Substance::create($requestData);
            return redirect('substance/substance')->with('flash_message', 'Substance added!');
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
        $model = str_slug('substance','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $substance = Substance::findOrFail($id);
            return view('substance.show', compact('substance'));
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
        $model = str_slug('substance','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $substance = Substance::findOrFail($id);
            return view('substance.edit', compact('substance'));
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
        $model = str_slug('substance','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'designation' => 'required',
			'date_recue' => 'required',
			'depositaire' => 'required',
			'unite_recue' => 'required',
			'quantite' => 'required',
			'fabricant' => 'required',
			'lot' => 'required',
			'date_fab' => 'required',
			'date_exp' => 'required',
			'user_id' => 'required'
		]);
            $requestData = $request->all();
            
            $substance = Substance::findOrFail($id);
             $substance->update($requestData);

             return redirect('substance/substance')->with('flash_message', 'Substance updated!');
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
        $model = str_slug('substance','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Substance::destroy($id);

            return redirect('substance/substance')->with('flash_message', 'Substance deleted!');
        }
        return response(view('403'), 403);

    }
}
