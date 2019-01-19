<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Demande;
use Illuminate\Http\Request;

class DemandeController extends Controller
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
        $model = str_slug('demande','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $demande = Demande::where('molecule', 'LIKE', "%$keyword%")
                ->orWhere('client', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('date_recue', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $demande = Demande::paginate($perPage);
            }

            return view('demande.index', compact('demande'));
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
        $model = str_slug('demande','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('demande.create');
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
        $model = str_slug('demande','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'molecule' => 'required',
			'client' => 'required',
			'description' => 'required',
			'date_recue' => 'required',
			'user_id' => 'required'
		]);
            $requestData = $request->all();
            
            Demande::create($requestData);
            return redirect('demande/demande')->with('flash_message', 'Demande added!');
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
        $model = str_slug('demande','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $demande = Demande::findOrFail($id);
            return view('demande.show', compact('demande'));
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
        $model = str_slug('demande','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $demande = Demande::findOrFail($id);
            return view('demande.edit', compact('demande'));
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
        $model = str_slug('demande','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'molecule' => 'required',
			'client' => 'required',
			'description' => 'required',
			'date_recue' => 'required',
			'user_id' => 'required'
		]);
            $requestData = $request->all();
            
            $demande = Demande::findOrFail($id);
             $demande->update($requestData);

             return redirect('demande/demande')->with('flash_message', 'Demande updated!');
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
        $model = str_slug('demande','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Demande::destroy($id);

            return redirect('demande/demande')->with('flash_message', 'Demande deleted!');
        }
        return response(view('403'), 403);

    }
}
