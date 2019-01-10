<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Fabricant;
use Illuminate\Http\Request;

class FabricantController extends Controller
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
        $model = str_slug('fabricant','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $fabricant = Fabricant::where('company_name', 'LIKE', "%$keyword%")
                ->orWhere('adresse', 'LIKE', "%$keyword%")
                ->orWhere('telephone', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $fabricant = Fabricant::paginate($perPage);
            }

            return view('fabricant.index', compact('fabricant'));
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
        $model = str_slug('fabricant','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('fabricant.create');
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
        $model = str_slug('fabricant','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'company_name' => 'required',
			'adresse' => 'required',
			'telephone' => 'required',
			'email' => 'required'
		]);
            $requestData = $request->all();
            
            Fabricant::create($requestData);
            return redirect('fabricant/fabricant')->with('flash_message', 'Fabricant added!');
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
        $model = str_slug('fabricant','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $fabricant = Fabricant::findOrFail($id);
            return view('fabricant.show', compact('fabricant'));
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
        $model = str_slug('fabricant','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $fabricant = Fabricant::findOrFail($id);
            return view('fabricant.edit', compact('fabricant'));
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
        $model = str_slug('fabricant','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'company_name' => 'required',
			'adresse' => 'required',
			'telephone' => 'required',
			'email' => 'required'
		]);
            $requestData = $request->all();
            
            $fabricant = Fabricant::findOrFail($id);
             $fabricant->update($requestData);

             return redirect('fabricant/fabricant')->with('flash_message', 'Fabricant updated!');
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
        $model = str_slug('fabricant','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Fabricant::destroy($id);

            return redirect('fabricant/fabricant')->with('flash_message', 'Fabricant deleted!');
        }
        return response(view('403'), 403);

    }
}
