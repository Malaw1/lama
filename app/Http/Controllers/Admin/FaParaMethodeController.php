<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\FaParaMethode;
use Illuminate\Http\Request;

class FaParaMethodeController extends Controller
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
        $model = str_slug('faparamethode','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $faparamethode = FaParaMethode::where('parametre', 'LIKE', "%$keyword%")
                ->orWhere('methode', 'LIKE', "%$keyword%")
                ->orWhere('faisabilite_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $faparamethode = FaParaMethode::paginate($perPage);
            }

            return view('fa-para-methode.index', compact('faparamethode'));
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
        $model = str_slug('faparamethode','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('fa-para-methode.create');
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
        $model = str_slug('faparamethode','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'parametre' => 'required',
			'methode' => 'required',
			'faisabilite_id' => 'required'
		]);
            $requestData = $request->all();
            
            FaParaMethode::create($requestData);
            return redirect('fa-para-methode/fa-para-methode')->with('flash_message', 'FaParaMethode added!');
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
        $model = str_slug('faparamethode','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $faparamethode = FaParaMethode::findOrFail($id);
            return view('fa-para-methode.show', compact('faparamethode'));
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
        $model = str_slug('faparamethode','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $faparamethode = FaParaMethode::findOrFail($id);
            return view('fa-para-methode.edit', compact('faparamethode'));
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
        $model = str_slug('faparamethode','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'parametre' => 'required',
			'methode' => 'required',
			'faisabilite_id' => 'required'
		]);
            $requestData = $request->all();
            
            $faparamethode = FaParaMethode::findOrFail($id);
             $faparamethode->update($requestData);

             return redirect('fa-para-methode/fa-para-methode')->with('flash_message', 'FaParaMethode updated!');
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
        $model = str_slug('faparamethode','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            FaParaMethode::destroy($id);

            return redirect('fa-para-methode/fa-para-methode')->with('flash_message', 'FaParaMethode deleted!');
        }
        return response(view('403'), 403);

    }
}
