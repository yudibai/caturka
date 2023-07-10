<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Http\Controllers\LevelController;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request, [
            'limit' => 'integer',
        ]);

        $data['users'] = DB::table('users')->orderBy('name','ASC')->when($request->key, function ($query) use ($request) {

            $q = $request->q;
            $key = $request->key;
            
            if ($key == 'name' && $q) {
                $query->where('name', 'LIKE', "%{$q}%");
            }

        })->paginate(10);
        $data['users']->appends($request->only(['key','q']));

        $data['title'] = 'Users';
        
        return view('admin.user.index', $data);
    }

    public function create(Request $request)
    {
        if ($request->getMethod() == 'POST')
        {
            $request->validate([
                'name' =>  'required',
                'username' => 'required|min:4|unique:users,username',
                'email'    => 'email|unique:users,email',
                'level' =>  'required',
            ]);

            // validate password confirm
            if ($request->password != $request->passwordConfirm) {
                
                $this->validate($request, [
                    'password' =>  'min:8',
                ],[
                    'password.min' => 'Password minimum 8 character',
                ]);

                return back()->withInput($request->except('password', 'passwordConfirm'))->with('danger', 'Password or password confirmation is not the same');
            }

            DB::table('users')->insert([
                'name' =>  $request->name,
                'username' =>  $request->username,
                'email' =>  $request->email,
                'password' =>  $request->password ? Hash::make($request->password) : $user->password,
                'level' =>  $request->level,
                'created_at' =>  Carbon::now()->toDateTimeString(),
            ]);

            return redirect('admin/users')->with('success','Data successfully added');
        }

        $data['levels'] = (new LevelController)->getAll();
        $data['title'] = "Create user";

        return view('admin.user.form', $data);
    }

    public function update(Request $request, $id)
    {
        $user = DB::table('users')
                ->where('id', $id)
                ->first();
                
        if (!$user)
        {
            return redirect('admin/users')->with('info', 'Data not found');
        }

        if ($request->getMethod() == 'POST')
        {
            $request->validate([
                'name' => 'required',
                // 'username' => 'required|min:4|unique:users,username',
                'level' =>  'required',
            ]);
            
            DB::table('users')
                ->where('id', $id)
                ->update([
                    'name' =>  $request->name,
                    // 'username' =>  $request->username,
                    'email' =>  $request->email,
                    'password' =>  $request->password ? Hash::make($request->password) : $user->password,
                    'level' =>  $request->level,
                    'updated_at' => Carbon::now()->toDateTimeString(),
                ]);

            return redirect('admin/users')->with('success','Data successfully added');
        }
        
        $data['title'] = "Update user";
        $data['user'] = $user;
        $data['levels'] = (new LevelController)->getAll();
        $data['toReadOnly'] = true;

        return view('admin.user.form', $data);
    }

    public function delete($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Data has been deleted.');
    }
}
