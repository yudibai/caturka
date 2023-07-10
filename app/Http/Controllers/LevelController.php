<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class LevelController extends Controller
{
    
    public function getAll()
    {
        return DB::table('levels')->get();
    }

    public function index(Request $request)
    {
        $this->validate($request, [
            'limit' => 'integer',
        ]);

        $data['levels'] = DB::table('levels')->orderBy('name','ASC')->when($request->key, function ($query) use ($request) {

            $q = $request->q;
            $key = $request->key;
            
            if ($key == 'name' && $q) {
                $query->where('name', 'LIKE', "%{$q}%");
            }

        })->paginate(10);
        $data['levels']->appends($request->only(['key','q']));

        $data['title'] = 'Levels';
        
        return view('admin.level.index', $data);
    }

    public function create(Request $request)
    {
        if ($request->getMethod() == 'POST')
        {
            $request->validate([
                'name' =>  'required',
            ]);

            DB::table('levels')->insert([
                'name' =>  $request->name,
                'created_at' =>  Carbon::now()->toDateTimeString(),
            ]);

            return redirect('admin/levels')->with('success','Data successfully added');
        }

        $data['title'] = "Create Level";

        return view('admin.level.form', $data);
    }

    public function update(Request $request, $id)
    {
        $level = DB::table('levels')
                ->where('id', $id)
                ->first();
                
        if (!$level)
        {
            return redirect('admin/levels')->with('info', 'Data not found');
        }

        if ($request->getMethod() == 'POST')
        {
            $request->validate([
                'name' => 'required',
            ]);
            
            DB::table('levels')
                ->where('id', $id)
                ->update([
                    'name' =>  $request->name,
                    'updated_at' => Carbon::now()->toDateTimeString(),
                ]);

            return redirect('admin/levels')->with('success','Data successfully added');
        }
        
        $data['title'] = "Update Level";
        $data['level'] = $level;

        return view('admin.level.form', $data);
    }

    public function delete($id)
    {
        DB::table('levels')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Data has been deleted.');
    }
}
