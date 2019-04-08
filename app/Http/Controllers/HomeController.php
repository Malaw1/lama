<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ObjetEssai;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $objet_1 = ObjetEssai::join('analyses', 'analyses.objet', '=', 'objet_essais.code')
                          ->where('etat', 'processing')
                          ->get();

    $archive = count(ObjetEssai::join('analyses', 'analyses.objet', '=', 'objet_essais.code')
                        ->where('etat', 'done')
                        ->get());
      $objet_2 = count(ObjetEssai::All());
       // dd(count($objet), $objet);
       $process = count($objet_1);
        return view('dashboard.index', ['process' => $process, 'objet' => $objet_2, 'archive' => $archive ]);
    }
}
