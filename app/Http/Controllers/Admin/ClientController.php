<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
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
        $model = str_slug('client','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $client = Client::where('company_name', 'LIKE', "%$keyword%")
                ->orWhere('adresse', 'LIKE', "%$keyword%")
                ->orWhere('telephone', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $client = Client::paginate($perPage);
            }

            return view('client.index', compact('client'));
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
        $model = str_slug('client','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('client.create');
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
        $model = str_slug('client','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            Client::create($requestData);
            return redirect('client/client')->with('flash_message', 'Client added!');
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
        $model = str_slug('client','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $client = Client::findOrFail($id);
            return view('client.show', compact('client'));
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
        $model = str_slug('client','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $client = Client::findOrFail($id);
            return view('client.edit', compact('client'));
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
        $model = str_slug('client','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $client = Client::findOrFail($id);
             $client->update($requestData);

             return redirect('client/client')->with('flash_message', 'Client updated!');
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
        $model = str_slug('client','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Client::destroy($id);

            return redirect('client/client')->with('flash_message', 'Client deleted!');
        }
        return response(view('403'), 403);

    }
}
