<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\FaPc;
use Illuminate\Http\Request;

class FaPcController extends Controller
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
        $model = str_slug('fapc','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $fapc = FaPc::where('designation', 'LIKE', "%$keyword%")
                ->orWhere('faisabilite_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $fapc = FaPc::paginate($perPage);
            }

            return view('fa-pc.index', compact('fapc'));
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
        $model = str_slug('fapc','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('fa-pc.create');
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
        $model = str_slug('fapc','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'designation' => 'required',
			'faisabilite_id' => 'required'
		]);
            $requestData = $request->all();
            
            FaPc::create($requestData);
            return redirect('fa-pc/fa-pc')->with('flash_message', 'FaPc added!');
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
        $model = str_slug('fapc','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $fapc = FaPc::findOrFail($id);
            return view('fa-pc.show', compact('fapc'));
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
        $model = str_slug('fapc','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $fapc = FaPc::findOrFail($id);
            return view('fa-pc.edit', compact('fapc'));
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
        $model = str_slug('fapc','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'designation' => 'required',
			'faisabilite_id' => 'required'
		]);
            $requestData = $request->all();
            
            $fapc = FaPc::findOrFail($id);
             $fapc->update($requestData);

             return redirect('fa-pc/fa-pc')->with('flash_message', 'FaPc updated!');
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
        $model = str_slug('fapc','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            FaPc::destroy($id);

            return redirect('fa-pc/fa-pc')->with('flash_message', 'FaPc deleted!');
        }
        return response(view('403'), 403);

    }
}
