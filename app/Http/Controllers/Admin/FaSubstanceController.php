<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\FaSubstance;
use Illuminate\Http\Request;

class FaSubstanceController extends Controller
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
        $model = str_slug('fasubstance','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $fasubstance = FaSubstance::where('substance', 'LIKE', "%$keyword%")
                ->orWhere('faisabilite_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $fasubstance = FaSubstance::paginate($perPage);
            }

            return view('fa-substance.index', compact('fasubstance'));
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
        $model = str_slug('fasubstance','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('fa-substance.create');
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
        $model = str_slug('fasubstance','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'substance' => 'required',
			'faisabilite_id' => 'required'
		]);
            $requestData = $request->all();
            
            FaSubstance::create($requestData);
            return redirect('fa-substance/fa-substance')->with('flash_message', 'FaSubstance added!');
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
        $model = str_slug('fasubstance','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $fasubstance = FaSubstance::findOrFail($id);
            return view('fa-substance.show', compact('fasubstance'));
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
        $model = str_slug('fasubstance','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $fasubstance = FaSubstance::findOrFail($id);
            return view('fa-substance.edit', compact('fasubstance'));
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
        $model = str_slug('fasubstance','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'substance' => 'required',
			'faisabilite_id' => 'required'
		]);
            $requestData = $request->all();
            
            $fasubstance = FaSubstance::findOrFail($id);
             $fasubstance->update($requestData);

             return redirect('fa-substance/fa-substance')->with('flash_message', 'FaSubstance updated!');
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
        $model = str_slug('fasubstance','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            FaSubstance::destroy($id);

            return redirect('fa-substance/fa-substance')->with('flash_message', 'FaSubstance deleted!');
        }
        return response(view('403'), 403);

    }
}
