<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormUserController extends Controller
{
    //
    public function index()
    {
        return view('admin.user.form');
    }
}
