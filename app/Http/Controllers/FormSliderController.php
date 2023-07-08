<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormSliderController extends Controller
{
    //
    public function index()
    {
        return view('admin.slider.form');
    }
}
