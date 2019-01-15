<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ProduitChimique;
use App\Catalog;
use Illuminate\Http\Request;

class ProduitChimiqueController extends Controller
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
        $model = str_slug('produitchimique','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $produitchimique = ProduitChimique::where('designation', 'LIKE', "%$keyword%")
                ->orWhere('date_recep', 'LIKE', "%$keyword%")
                ->orWhere('depositaire', 'LIKE', "%$keyword%")
                ->orWhere('unite_recu', 'LIKE', "%$keyword%")
                ->orWhere('quantite', 'LIKE', "%$keyword%")
                ->orWhere('fabricant', 'LIKE', "%$keyword%")
                ->orWhere('lot', 'LIKE', "%$keyword%")
                ->orWhere('date_fab', 'LIKE', "%$keyword%")
                ->orWhere('date_exp', 'LIKE', "%$keyword%")
                ->orWhere('catalog', 'LIKE', "%$keyword%")
                ->orWhere('cas', 'LIKE', "%$keyword%")
                ->orWhere('prix', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $produitchimique = ProduitChimique::paginate($perPage);
            }

            return view('produit-chimique.index', compact('produitchimique'));
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

        $model = str_slug('produitchimique','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
          $catalog = Catalog::all();
        //  dd($catalog);
            return view('produit-chimique.create', ['catalog' => $catalog] );
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
        $model = str_slug('produitchimique','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'designation' => 'required',
			'date_recep' => 'required',
			'depositaire' => 'required',
			'unite_recu' => 'required',
			'quantite' => 'required',
			'fabricant' => 'required',
			'lot' => 'required',
			'date_fab' => 'required',
			'date_exp' => 'required',
			'prix' => 'required',
			'type' => 'required',
      'user_id' => 'required'
		]);
            $requestData = $request->all();

            ProduitChimique::create($requestData);
            return redirect('produitsChimique/produit-chimique')->with('flash_message', 'Produit Chimique ajouté avec succés!');
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
        $model = str_slug('produitchimique','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $produitchimique = ProduitChimique::findOrFail($id);
            return view('produit-chimique.show', compact('produitchimique'));
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
        $model = str_slug('produitchimique','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $produitchimique = ProduitChimique::findOrFail($id);
            return view('produit-chimique.edit', compact('produitchimique'));
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
        $model = str_slug('produitchimique','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'designation' => 'required',
			'date_recep' => 'required',
			'depositaire' => 'required',
			'unite_recu' => 'required',
			'quantite' => 'required',
			'fabricant' => 'required',
			'lot' => 'required',
			'date_fab' => 'required',
			'date_exp' => 'required',
			'prix' => 'required',
			'type' => 'required'
		]);
            $requestData = $request->all();

            $produitchimique = ProduitChimique::findOrFail($id);
             $produitchimique->update($requestData);

             return redirect('produitsChimique/produit-chimique')->with('flash_message', 'ProduitChimique updated!');
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
        $model = str_slug('produitchimique','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            ProduitChimique::destroy($id);

            return redirect('produitsChimique/produit-chimique')->with('flash_message', 'ProduitChimique deleted!');
        }
        return response(view('403'), 403);

    }
}
