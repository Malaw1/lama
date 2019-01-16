<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pharmacopee;
use Illuminate\Http\Request;

class PharmacopeeController extends Controller
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
        $model = str_slug('pharmacopee','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $pharmacopee = Pharmacopee::where('pharmacopee', 'LIKE', "%$keyword%")
                ->orWhere('lien', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $pharmacopee = Pharmacopee::paginate($perPage);
            }

            return view('pharmacopee.index', compact('pharmacopee'));
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
        $model = str_slug('pharmacopee','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('pharmacopee.create');
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
        $model = str_slug('pharmacopee','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'pharmacopee' => 'required',
			'lien' => 'required'
		]);
            $requestData = $request->all();
            
            Pharmacopee::create($requestData);
            return redirect('pharmacopee/pharmacopee')->with('flash_message', 'Pharmacopee added!');
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
        $model = str_slug('pharmacopee','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $pharmacopee = Pharmacopee::findOrFail($id);
            return view('pharmacopee.show', compact('pharmacopee'));
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
        $model = str_slug('pharmacopee','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $pharmacopee = Pharmacopee::findOrFail($id);
            return view('pharmacopee.edit', compact('pharmacopee'));
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
        $model = str_slug('pharmacopee','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'pharmacopee' => 'required',
			'lien' => 'required'
		]);
            $requestData = $request->all();
            
            $pharmacopee = Pharmacopee::findOrFail($id);
             $pharmacopee->update($requestData);

             return redirect('pharmacopee/pharmacopee')->with('flash_message', 'Pharmacopee updated!');
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
        $model = str_slug('pharmacopee','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Pharmacopee::destroy($id);

            return redirect('pharmacopee/pharmacopee')->with('flash_message', 'Pharmacopee deleted!');
        }
        return response(view('403'), 403);

    }
}
