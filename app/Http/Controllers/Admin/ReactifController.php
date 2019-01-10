<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Reactif;
use Illuminate\Http\Request;

class ReactifController extends Controller
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
        $model = str_slug('reactif','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $reactif = Reactif::where('designation', 'LIKE', "%$keyword%")
                ->orWhere('depositaire', 'LIKE', "%$keyword%")
                ->orWhere('quantite', 'LIKE', "%$keyword%")
                ->orWhere('fabricant', 'LIKE', "%$keyword%")
                ->orWhere('lot', 'LIKE', "%$keyword%")
                ->orWhere('conditionnement', 'LIKE', "%$keyword%")
                ->orWhere('catalog', 'LIKE', "%$keyword%")
                ->orWhere('cas', 'LIKE', "%$keyword%")
                ->orWhere('date_fab', 'LIKE', "%$keyword%")
                ->orWhere('date_exp', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $reactif = Reactif::paginate($perPage);
            }

            return view('reactif.index', compact('reactif'));
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
        $model = str_slug('reactif','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('reactif.create');
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
        $model = str_slug('reactif','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'designation' => 'required',
			'depositaire' => 'required',
			'quantite' => 'required',
			'fabricant' => 'required',
			'lot' => 'required',
			'conditionnement' => 'required',
			'catalog' => 'required',
			'cas' => 'required',
			'date_fab' => 'required',
			'date_exp' => 'required'
		]);
            $requestData = $request->all();
            
            Reactif::create($requestData);
            return redirect('reactif/reactif')->with('flash_message', 'Reactif added!');
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
        $model = str_slug('reactif','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $reactif = Reactif::findOrFail($id);
            return view('reactif.show', compact('reactif'));
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
        $model = str_slug('reactif','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $reactif = Reactif::findOrFail($id);
            return view('reactif.edit', compact('reactif'));
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
        $model = str_slug('reactif','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'designation' => 'required',
			'depositaire' => 'required',
			'quantite' => 'required',
			'fabricant' => 'required',
			'lot' => 'required',
			'conditionnement' => 'required',
			'catalog' => 'required',
			'cas' => 'required',
			'date_fab' => 'required',
			'date_exp' => 'required'
		]);
            $requestData = $request->all();
            
            $reactif = Reactif::findOrFail($id);
             $reactif->update($requestData);

             return redirect('reactif/reactif')->with('flash_message', 'Reactif updated!');
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
        $model = str_slug('reactif','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Reactif::destroy($id);

            return redirect('reactif/reactif')->with('flash_message', 'Reactif deleted!');
        }
        return response(view('403'), 403);

    }
}
