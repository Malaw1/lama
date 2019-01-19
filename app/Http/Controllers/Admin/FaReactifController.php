<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\FaReactif;
use Illuminate\Http\Request;

class FaReactifController extends Controller
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
        $model = str_slug('fareactif','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $fareactif = FaReactif::where('reactif', 'LIKE', "%$keyword%")
                ->orWhere('faisabilite_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $fareactif = FaReactif::paginate($perPage);
            }

            return view('fa-reactif.index', compact('fareactif'));
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
        $model = str_slug('fareactif','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('fa-reactif.create');
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
        $model = str_slug('fareactif','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'reactif' => 'required',
			'faisabilite_id' => 'required'
		]);
            $requestData = $request->all();
            
            FaReactif::create($requestData);
            return redirect('fa-reactif/fa-reactif')->with('flash_message', 'FaReactif added!');
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
        $model = str_slug('fareactif','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $fareactif = FaReactif::findOrFail($id);
            return view('fa-reactif.show', compact('fareactif'));
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
        $model = str_slug('fareactif','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $fareactif = FaReactif::findOrFail($id);
            return view('fa-reactif.edit', compact('fareactif'));
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
        $model = str_slug('fareactif','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'reactif' => 'required',
			'faisabilite_id' => 'required'
		]);
            $requestData = $request->all();
            
            $fareactif = FaReactif::findOrFail($id);
             $fareactif->update($requestData);

             return redirect('fa-reactif/fa-reactif')->with('flash_message', 'FaReactif updated!');
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
        $model = str_slug('fareactif','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            FaReactif::destroy($id);

            return redirect('fa-reactif/fa-reactif')->with('flash_message', 'FaReactif deleted!');
        }
        return response(view('403'), 403);

    }
}
