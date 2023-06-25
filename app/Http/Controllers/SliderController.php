<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = DB::table('sliders')->get();
        return view('admin.slider.index', $sliders);
    }

    public function create()
    {
        
    }
}
