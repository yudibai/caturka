<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function getData()
    {
        $sliders = DB::table('sliders')->get();
        $katalogs = DB::table('katalogs')->get();
        $clients = DB::table('clients')->get();
        return view('/', [
            'sliders' => $sliders,
            'katalogs' => $katalogs,
            'clients' => $clients,
        ]);
    }
}
