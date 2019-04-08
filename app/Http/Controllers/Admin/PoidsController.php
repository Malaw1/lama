<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Poid;
use Illuminate\Http\Request;

class PoidsController extends Controller
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
        $model = str_slug('poids','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $poids = Poid::where('poids', 'LIKE', "%$keyword%")
                ->orWhere('pesage_id', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $poids = Poid::paginate($perPage);
            }

            return view('poids.index', compact('poids'));
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
        $model = str_slug('poids','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('poids.create');
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
        $model = str_slug('poids','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'poids' => 'required',
			'pesage_id' => 'required',
			'user_id' => 'required'
		]);
            $requestData = $request->all();
            
            Poid::create($requestData);
            return redirect('poids/poids')->with('flash_message', 'Poid added!');
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
        $model = str_slug('poids','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $poid = Poid::findOrFail($id);
            return view('poids.show', compact('poid'));
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
        $model = str_slug('poids','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $poid = Poid::findOrFail($id);
            return view('poids.edit', compact('poid'));
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
        $model = str_slug('poids','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'poids' => 'required',
			'pesage_id' => 'required',
			'user_id' => 'required'
		]);
            $requestData = $request->all();
            
            $poid = Poid::findOrFail($id);
             $poid->update($requestData);

             return redirect('poids/poids')->with('flash_message', 'Poid updated!');
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
        $model = str_slug('poids','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Poid::destroy($id);

            return redirect('poids/poids')->with('flash_message', 'Poid deleted!');
        }
        return response(view('403'), 403);

    }
}
