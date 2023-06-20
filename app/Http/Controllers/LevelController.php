<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LevelController extends Controller
{
    public function getAll()
    {
        return DB::table('levels')->get();
    }
}
