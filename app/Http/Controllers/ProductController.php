<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Classes\Utilities;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request, [
            'limit' => 'integer',
        ]);

        $data['products'] = DB::table('products')->orderBy('name','ASC')->when($request->key, function ($query) use ($request) {

            $q = $request->q;
            $key = $request->key;
            
            if ($key == 'name' && $q) {
                $query->where('name', 'LIKE', "%{$q}%");
            }

        })->paginate(10);
        $data['products']->appends($request->only(['key','q']));
        $data['title'] = 'Products';
        
        return view('admin.product.index', $data);
        
    }
    public function create(Request $request)
    {
        $slug = str_replace(' ','-', strtolower($request->name));
        $directorySpecial = 'products';

        if ($request->getMethod() == 'POST')
        {
            $request->validate([
                'name' =>  'required',
                'description' =>  'required',
                'imageFileName' =>  'required',
            ]);

            $directorySpecial = 'products';
            
            // Image Upload
            $imageFileName = Utilities::imageUpload($request->imageFileName, $request->name, '', $request->file('imageFileName'), $directorySpecial);

            DB::table('products')->insert([
                'name' =>  $request->name,
                'sub_name' =>  $request->sub_name,
                'slug' =>  $slug,
                'description' =>  $request->description,
                'image' =>  $imageFileName,
                'created_at' =>  Carbon::now()->toDateTimeString(),
            ]);

            return redirect('admin/products')->with('success','Data successfully added');

        }
        $data['title'] = "Create Product";
        $data['directorySpecial'] = $directorySpecial;

        return view('admin.product.form', $data);

    }

    public function update(Request $request, $id)
    {
        $product = DB::table('products')
                ->where('id', $id)
                ->first();
                
        if (!$product)
        {
            return redirect('admin/products')->with('info', 'Data not found');
        }
        
        $directorySpecial = 'products';

        if ($request->getMethod() == 'POST')
        {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
            ]);
            

            $directorySpecial = 'products';
            
            // Image Upload
            $imageFileName = Utilities::imageUpload($request->imageFileName, $request->name, $product->image, $request->file('imageFileName'), $directorySpecial);
            
            DB::table('products')
                ->where('id', $id)
                ->update([
                    'name' =>  $request->name,
                    'sub_name' =>  $request->sub_name,
                    'slug' =>  str_replace(' ','-', strtolower($request->name)),
                    'description' =>  $request->description,
                    'image' => $imageFileName,
                    'updated_at'   =>  Carbon::now()->toDateTimeString(),
                ]);
            
            return redirect('admin/products')->with('success','Data successfully added');
        }
        
        $data['title'] = "Update Product";
        $data['product'] = $product;
        $data['directorySpecial'] = $directorySpecial;

        return view('admin.product.form', $data);
    }

    public function delete($id)
    {
        $product = DB::table('products')
                ->where('id', $id)
                ->first();
        $directorySpecial = 'products/'. $product->image;

        // delete folder beserta isinya
        File::delete(public_path('/assets/images/' .$directorySpecial));

        // delete data in database
        DB::table('products')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Data has been deleted.');
    }
}
