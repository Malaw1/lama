<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parametre;

class DynamicController extends Controller
{
    public function index(){
        $parametre = Parametre::all();
        return view('dynamic', ['parametre' => $parametre]);
    }

    public function fetch(Request $request){
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = Parametre::where($select, $value)
        >groupBy($dependent)
        ->get();

        $output = '<option value="">select'.ucfirst($dependent).'</option>';

        foreach ($data as $row) {
            $output .= '<option value="'.$row->dependent.'">'.$row->dependent.'</option>';
        }

        echo $output;

    }
}
