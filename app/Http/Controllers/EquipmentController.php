<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    //
    public function index()
    {
        return view('client.layout.equipment');
    }
}
