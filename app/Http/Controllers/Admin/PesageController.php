<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pesage;
use Illuminate\Http\Request;

class PesageController extends Controller
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
        $model = str_slug('pesage','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $pesage = Pesage::where('poids_total', 'LIKE', "%$keyword%")
                ->orWhere('poids_moyen', 'LIKE', "%$keyword%")
                ->orWhere('tolerance', 'LIKE', "%$keyword%")
                ->orWhere('ecart_type', 'LIKE', "%$keyword%")
                ->orWhere('uniformite_masse', 'LIKE', "%$keyword%")
                ->orWhere('variation', 'LIKE', "%$keyword%")
                ->orWhere('analyse_id', 'LIKE', "%$keyword%")
                ->orWhere('appareil', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $pesage = Pesage::paginate($perPage);
            }

            return view('pesage.index', compact('pesage'));
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
        $model = str_slug('pesage','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('pesage.create');
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
        $model = str_slug('pesage','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'poids_total' => 'required',
			'poids_moyen' => 'required',
			'tolerance' => 'required',
			'ecart_type' => 'required',
			'uniformite_masse' => 'required',
			'variation' => 'required',
			'analyse_id' => 'required',
			'appareil' => 'required',
			'user_id' => 'required'
		]);
            $requestData = $request->all();
            
            Pesage::create($requestData);
            return redirect('pesage/pesage')->with('flash_message', 'Pesage added!');
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
        $model = str_slug('pesage','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $pesage = Pesage::findOrFail($id);
            return view('pesage.show', compact('pesage'));
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
        $model = str_slug('pesage','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $pesage = Pesage::findOrFail($id);
            return view('pesage.edit', compact('pesage'));
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
        $model = str_slug('pesage','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'poids_total' => 'required',
			'poids_moyen' => 'required',
			'tolerance' => 'required',
			'ecart_type' => 'required',
			'uniformite_masse' => 'required',
			'variation' => 'required',
			'analyse_id' => 'required',
			'appareil' => 'required',
			'user_id' => 'required'
		]);
            $requestData = $request->all();
            
            $pesage = Pesage::findOrFail($id);
             $pesage->update($requestData);

             return redirect('pesage/pesage')->with('flash_message', 'Pesage updated!');
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
        $model = str_slug('pesage','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Pesage::destroy($id);

            return redirect('pesage/pesage')->with('flash_message', 'Pesage deleted!');
        }
        return response(view('403'), 403);

    }
}
