<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormProductController extends Controller
{
    //
    public function index()
    {
        return view('admin.product.form.formProduct');
    }
}
