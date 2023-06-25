<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\LevelController;

class LoginController extends Controller
{
    public function index() 
    {
        $levels = (new LevelController)->getAll();
        if ($user = Auth::user()) {
            foreach ($levels as $key => $value) {
                if ($user->level == $value->name) {
                    return redirect()->intended('admin/dashboard');
                }
            }
        }
        return view('auth.login');
    }

    public function loginProcess(Request $request) {
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]);

        $kredensil = $request->only('username','password');
        $levels = (new LevelController)->getAll();
        if (Auth::attempt($kredensil)) {
            $user = Auth::user();
            foreach ($levels as $key => $value) {
                if ($user->level == $value->name) {
                    return redirect()->intended('admin/dashboard');
                }
            }
            return redirect()->intended('/');
        }
        return Redirect('admin/login')->withInput()->withErrors(['login_gagal' => 'These credentials do not match our records.']);
    }

    public function logout(Request $request)
    {
       $request->session()->flush();
       Auth::logout();
       return Redirect('admin/login');
    }
}
