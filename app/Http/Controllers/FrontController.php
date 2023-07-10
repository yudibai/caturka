<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FrontController extends Controller
{
    public function home() {
        $data['sliders'] = DB::table('sliders')->get();
        $data['katalogs'] = DB::table('katalogs')->get();
        $data['clients'] = DB::table('clients')->get();
        return view('client.home', $data);
    }

    public function about() {
        return view('client.about');
    }

    public function product() {
        $data['products'] = DB::table('products')->get();
        return view('client.product', $data);
    }

    public function detailProduct($slug) {
        $product = DB::table('products')
                ->where('slug', $slug)
                ->first();

        if (!$product)
        {
            return redirect('/data-not-found');
        }

        $data['product'] = $product;
        
        return view('client.detail-product', $data);
    }

    public function equipment() {
        return view('client.equipment');
    }

    public function contact() {
        return view('client.contact');
    }
}
