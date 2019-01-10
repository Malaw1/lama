<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\FaParam;
use Illuminate\Http\Request;

class FaParamController extends Controller
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
        $model = str_slug('faparam','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $faparam = FaParam::where('faisabilite_id', 'LIKE', "%$keyword%")
                ->orWhere('parametre', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $faparam = FaParam::paginate($perPage);
            }

            return view('fa-param.index', compact('faparam'));
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
        $model = str_slug('faparam','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('fa-param.create');
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
        $model = str_slug('faparam','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'faisabilite_id' => 'required',
			'parametre' => 'required'
		]);
            $requestData = $request->all();
            
            FaParam::create($requestData);
            return redirect('fa-param/fa-param')->with('flash_message', 'FaParam added!');
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
        $model = str_slug('faparam','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $faparam = FaParam::findOrFail($id);
            return view('fa-param.show', compact('faparam'));
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
        $model = str_slug('faparam','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $faparam = FaParam::findOrFail($id);
            return view('fa-param.edit', compact('faparam'));
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
        $model = str_slug('faparam','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'faisabilite_id' => 'required',
			'parametre' => 'required'
		]);
            $requestData = $request->all();
            
            $faparam = FaParam::findOrFail($id);
             $faparam->update($requestData);

             return redirect('fa-param/fa-param')->with('flash_message', 'FaParam updated!');
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
        $model = str_slug('faparam','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            FaParam::destroy($id);

            return redirect('fa-param/fa-param')->with('flash_message', 'FaParam deleted!');
        }
        return response(view('403'), 403);

    }
}
