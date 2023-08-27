<?php

namespace App\Http\Controllers;
use DB;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Classes\Utilities;

use Illuminate\Support\Facades\File;


class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request, [
            'limit' => 'integer',
        ]);


        $data['service'] = DB::table('service')->orderBy('name','ASC')->when($request->key, function ($query) use ($request) {

            $q = $request->q;
            $key = $request->key;
            
            if ($key == 'name' && $q) {
                $query->where('name', 'LIKE', "%{$q}%");
            }

        })->paginate(10);
        $data['service']->appends($request->only(['key','q']));
        $data['title'] = 'Services';
        
        return view('admin.service.index', $data);
        
    }
    public function create(Request $request)
    {
        $slug = str_replace(' ','-', strtolower($request->name));
        $directorySpecial = 'service/'.$slug;

        if ($request->getMethod() == 'POST')
        {
            $request->validate([
                'name' =>  'required',
                'description' =>  'required',
            ]);

            $directorySpecial = 'service/'.$slug;

            // Image Upload
            $imageFileName = Utilities::imageUpload($request->imageFileName, $request->name, '', $request->file('imageFileName'), $directorySpecial);
            
            DB::table('service')->insert([
                'name' =>  $request->name,
                'image' =>  $imageFileName,
                'description' =>  $request->description,
                'created_at' =>  Carbon::now()->toDateTimeString(),
            ]);

            return redirect('admin/service')->with('success','Data successfully added');

        }
        $data['title'] = "Create Service";
        $data['directorySpecial'] = $directorySpecial;

        return view('admin.service.form', $data);
    }
    public function update(Request $request, $id)
    {
        $service = DB::table('services')
                ->where('id', $id)
                ->first();
                
        if (!$service)
        {
            return redirect('admin/service')->with('info', 'Data not found');
        }
        
        $directorySpecial = 'service/'.str_replace(' ','-', strtolower($service->name));

        if ($request->getMethod() == 'POST')
        {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
            ]);
            

            $directorySpecial = 'service/'.str_replace(' ','-', strtolower($request->name));
            
            // Image Upload
            $imageFileName = Utilities::imageUpload($request->imageFileName, $request->name, $service->image, $request->file('imageFileName'), $directorySpecial);
            
            DB::table('service')
                ->where('id', $id)
                ->update([
                    'name' =>  $request->name,
                    'description' =>  $request->description,
                    'image' => $imageFileName,
                    'updated_at'   =>  Carbon::now()->toDateTimeString(),
                ]);
            
            return redirect('admin/service')->with('success','Data successfully added');
        }
        
        $data['title'] = "Update Product";
        $data['service'] = $service;
        $data['directorySpecial'] = $directorySpecial;

        return view('admin.service.form', $data);
    }
}
