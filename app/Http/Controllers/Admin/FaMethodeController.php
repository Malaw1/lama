<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\FaMethode;
use Illuminate\Http\Request;

class FaMethodeController extends Controller
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
        $model = str_slug('famethode','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $famethode = FaMethode::where('faisabilite_id', 'LIKE', "%$keyword%")
                ->orWhere('methode', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $famethode = FaMethode::paginate($perPage);
            }

            return view('fa-methode.index', compact('famethode'));
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
        $model = str_slug('famethode','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('fa-methode.create');
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
        $model = str_slug('famethode','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'faisabilite_id' => 'required',
			'methode' => 'required'
		]);
            $requestData = $request->all();
            
            FaMethode::create($requestData);
            return redirect('fa-methode/fa-methode')->with('flash_message', 'FaMethode added!');
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
        $model = str_slug('famethode','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $famethode = FaMethode::findOrFail($id);
            return view('fa-methode.show', compact('famethode'));
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
        $model = str_slug('famethode','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $famethode = FaMethode::findOrFail($id);
            return view('fa-methode.edit', compact('famethode'));
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
        $model = str_slug('famethode','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'faisabilite_id' => 'required',
			'methode' => 'required'
		]);
            $requestData = $request->all();
            
            $famethode = FaMethode::findOrFail($id);
             $famethode->update($requestData);

             return redirect('fa-methode/fa-methode')->with('flash_message', 'FaMethode updated!');
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
        $model = str_slug('famethode','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            FaMethode::destroy($id);

            return redirect('fa-methode/fa-methode')->with('flash_message', 'FaMethode deleted!');
        }
        return response(view('403'), 403);

    }
}
