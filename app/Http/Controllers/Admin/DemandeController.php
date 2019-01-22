<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Demande;
use App\Client;
use App\Parametre;
use App\ParaDemande;
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
                $demande = Demande::join('clients', 'clients.id','=','demandes.client')
                ->where('molecule', 'LIKE', "%$keyword%")
                ->orWhere('client', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('date_recue', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);

            } else {
                $demande = Demande::join('clients', 'clients.id','=','demandes.client')->paginate($perPage);
              //  dd($demande);
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
      $client = Client::all();
      $parametre = Parametre::all();
      $model = str_slug('demande','-');
      if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
          return view('demande.create', ['client' => $client, 'parametre' => $parametre]);
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
      $date = $request->input('date_recue');
        $dat = explode('-', $date, 3);
        $year = substr($dat[0], -2);
        $month = $dat[1];
        $day = $dat[2];

        $objet = Demande::All()->last();
      //  dd($objet);
        if($objet == null){
            $f = '0001';
          //  dd($id);
        }
        else{
          if ($objet->id < 10) {
            $id =$objet->id + 1;
            $f = '000'.$id;
          }elseif ($objet->id < 100) {
            $id =$objet->id + 1;
            $f = '00'.$id;
          }elseif ($objet->id < 1000) {
            $id =$objet->id + 1;
            $f = '0'.$id;
          }
        //  dd($f);
        }

        $code ='DEM'.$day.''.$month.''.$year.''.$f;

        // dd($code);
        $model = str_slug('demande','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
          $demande=   Demande::create([
            'code' => $code,
            'molecule' => $request->input('molecule'),
            'client' => $request->input('client'),
            'description' => $request->input('description'),
            'date_recue' => $request->input('date_recue'),
            'user_id' => $request->input('user_id')
            ]);

            $dem_id = $demande->id;

            $param = $request->input('parametre');
            foreach ($param as $param) {
            ParaDemande::create([
                'parametre' => $param,
                'demande' => $dem_id
                ]);
            }
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
            $param = ParaDemande::where('demande', $id)->get();
            return view('demande.show', ['demande' => $demande, 'param' => $param]);
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
