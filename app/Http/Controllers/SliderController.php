<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Classes\Utilities;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request, [
            'limit' => 'integer',
        ]);

        $data['sliders'] = DB::table('sliders')->orderBy('title','ASC')->when($request->key, function ($query) use ($request) {

            $q = $request->q;
            $key = $request->key;
            
            if ($key == 'title' && $q) {
                $query->where('title', 'LIKE', "%{$q}%");
            }

        })->paginate(10);
        $data['sliders']->appends($request->only(['key','q']));
        $data['title'] = 'Sliders';
        
        return view('admin.slider.index', $data);
        
    }
    public function create(Request $request)
    {
        $slug = str_replace(' ','-', strtolower($request->title));
        $directorySpecial = 'sliders/'.$slug;

        if ($request->getMethod() == 'POST')
        {
            $request->validate([
                'imageFileName' =>  'required',
            ]);

            $directorySpecial = 'sliders/'.$slug;
            
            // Image Upload
            $imageFileName = Utilities::imageUpload($request->imageFileName, $request->title, '', $request->file('imageFileName'), $directorySpecial);

            DB::table('sliders')->insert([
                'title' =>  $request->title,
                'sub_title' =>  $request->sub_title,
                'image' =>  $imageFileName,
                'created_at' =>  Carbon::now()->toDateTimeString(),
            ]);

            return redirect('admin/sliders')->with('success','Data successfully added');

        }
        $data['title'] = "Create Slider";
        $data['directorySpecial'] = $directorySpecial;

        return view('admin.slider.form', $data);

    }

    public function update(Request $request, $id)
    {
        $slider = DB::table('sliders')
                ->where('id', $id)
                ->first();
                
        if (!$slider)
        {
            return redirect('admin/sliders')->with('info', 'Data not found');
        }
        
        $directorySpecial = 'sliders/'.str_replace(' ','-', strtolower($slider->title));

        if ($request->getMethod() == 'POST')
        {
            $request->validate([
                'imageFileName' => 'required',
            ]);
            

            $directorySpecial = 'sliders/'.str_replace(' ','-', strtolower($request->title));
            
            // Image Upload
            $imageFileName = Utilities::imageUpload($request->imageFileName, $request->title, $slider->image, $request->file('imageFileName'), $directorySpecial);
            
            DB::table('sliders')
                ->where('id', $id)
                ->update([
                    'title' =>  $request->title,
                    'sub_title' =>  $request->sub_title,
                    'image' => $imageFileName,
                    'updated_at'   =>  Carbon::now()->toDateTimeString(),
                ]);
            
            return redirect('admin/sliders')->with('success','Data successfully added');
        }
        
        $data['title'] = "Update Slider";
        $data['slider'] = $slider;
        $data['directorySpecial'] = $directorySpecial;

        return view('admin.slider.form', $data);
    }

    public function delete($id)
    {
        $slider = DB::table('sliders')
                ->where('id', $id)
                ->first();
        $directorySpecial = 'sliders/'.str_replace(' ','-', strtolower($slider->title));

        // delete folder beserta isinya
        File::deleteDirectory(public_path('/assets/images/' .$directorySpecial));

        // delete data in database
        DB::table('sliders')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Data has been deleted.');
    }
}
