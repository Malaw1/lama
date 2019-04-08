<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
      $client = Client::join('demandes', 'client.id', '=', 'demandes.client')
                        ->count()
                        ->all();
      // all();
      dd($client);
      // $parametre = Parametre::all();
        return view('admin.dashboard');
    }
}
