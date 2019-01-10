<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Methode;
use Illuminate\Http\Request;

class MethodeController extends Controller
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
        $model = str_slug('methode','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $methode = Methode::where('methode', 'LIKE', "%$keyword%")
                ->orWhere('parametre_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $methode = Methode::paginate($perPage);
            }

            return view('methode.index', compact('methode'));
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
        $model = str_slug('methode','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('methode.create');
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
        $model = str_slug('methode','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'methode' => 'required',
			'parametre_id' => 'required'
		]);
            $requestData = $request->all();
            
            Methode::create($requestData);
            return redirect('methode/methode')->with('flash_message', 'Methode added!');
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
        $model = str_slug('methode','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $methode = Methode::findOrFail($id);
            return view('methode.show', compact('methode'));
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
        $model = str_slug('methode','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $methode = Methode::findOrFail($id);
            return view('methode.edit', compact('methode'));
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
        $model = str_slug('methode','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'methode' => 'required',
			'parametre_id' => 'required'
		]);
            $requestData = $request->all();
            
            $methode = Methode::findOrFail($id);
             $methode->update($requestData);

             return redirect('methode/methode')->with('flash_message', 'Methode updated!');
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
        $model = str_slug('methode','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Methode::destroy($id);

            return redirect('methode/methode')->with('flash_message', 'Methode deleted!');
        }
        return response(view('403'), 403);

    }
}
