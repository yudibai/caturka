<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request, [
            'limit' => 'integer',
        ]);

        $data['products'] = DB::table('products')->orderBy('name','DESC')->when($request->key, function ($query) use ($request) {

            $q = $request->q;
            $key = $request->key;
            
            if ($key == 'name' && $q) {
                $query->where('name', 'LIKE', "%{$q}%");
            }

        })->paginate(10);
        $data['products']->appends($request->only(['key','q']));

        $data['title'] = 'Products';
        
        return view('backend.portfolio.index', $data);
    }

    public function create(Request $request)
    {
        $slug = str_replace(' ','-', strtolower($request->name));
        $directorySpecial = 'products/'.$slug;

        if ($request->getMethod() == 'POST')
        {
            $request->validate([
                'name' =>  'required',
                'description' =>  'required',
            ]);

            $directorySpecial = 'products/'.$slug;
            
            // Image Upload
            $imageFileName = Utilities::imageUpload($request->imageFileName, $request->name, '', $request->file('imageFileName'), $directorySpecial);

            DB::table('products')->insert([
                'name' =>  $request->name,
                'slug' =>  $slug,
                'description' =>  $request->description,
                // 'image' => 
                'created_at' =>  date('Y-m-d H:i:s'),
            ]);

            $getLastId = DB::getPDO()->lastInsertId();

            if ($request->hasFile('imageFileNames'))
            {
                // insert
                foreach($request->file('imageFileNames') as $document)
                {
                    $nameFile = 'additional-'. str_random(5);
                    $imageFileName = Utilities::imageUpload('', $nameFile, '', $document, $directorySpecial);

                    DB::table('portfolio_documents')
                        ->insert([
                            'portfolioId' => $getLastId,
                            'imageFileName' => $imageFileName,
                            'created_at' =>  date('Y-m-d H:i:s'),
                        ]);
                }
            }

            return redirect('admin/products')->with('success','Data successfully added');

        }

        $data['directorySpecial'] = $directorySpecial;
        $data['title'] = "Create Portfolio";

        return view('backend.portfolio.form', $data);
    }

    public function update(Request $request, $id)
    {
        $portfolio = DB::table('products')
                ->where('id', $id)
                ->first();
                
        if (!$portfolio)
        {
            return redirect('admin/products')->with('info', 'Data not found');
        }

        $portfolioDocuments = DB::table('portfolio_documents')
                    ->where('portfolioId', $portfolio->id)
                    ->get();
        
        $directorySpecial = 'products/'.str_replace(' ','-', strtolower($portfolio->name));

        if ($request->getMethod() == 'POST')
        {
            if ($request->websiteType == '0') 
            {
                $request->validate([
                    'website' => 'url'
                ]);
            }

            $request->validate([
                'name' => 'required',
                'client' => 'required',
                'category' => 'required',
                'description' => 'required',
            ]);
            

            $directorySpecial = 'products/'.str_replace(' ','-', strtolower($request->name));
            
            // Image Upload
            $imageFileName = Utilities::imageUpload($request->imageFileName, $request->name, $portfolio->imageFileName, $request->file('imageFileName'), $directorySpecial);
            
            DB::table('products')
                ->where('id', $id)
                ->update([
                    'name' =>  $request->name,
                    'client' =>  $request->client,
                    'category' =>  $request->category,
                    'website' =>  $request->website,
                    'websiteType' =>  $request->websiteType,
                    'slug' =>  str_replace(' ','-', strtolower($request->name)),
                    'description' =>  $request->description,
                    'deadline' =>  $request->deadline,
                    'imageFileName' => $imageFileName,
                    'updated_at'   =>  date('Y-m-d H:i:s'),
                ]);

            // insert or update image additional
            if ($request->hasFile('imageFileNames'))
            {
                foreach($request->file('imageFileNames') as $document)
                {
                    $nameFile = 'additional-'. str_random(5);
                    $imageFileName = Utilities::imageUpload('', $nameFile, '', $document, $directorySpecial);

                    DB::table('portfolio_documents')
                        ->insert([
                            'portfolioId' => $portfolio->id,
                            'imageFileName' => $imageFileName,
                            'created_at' =>  date('Y-m-d H:i:s'),
                        ]);
                }
            }
            
            return redirect('admin/products')->with('success','Data successfully added');
        }
        
        $data['title'] = "Update Portfolio";
        $data['portfolio'] = $portfolio;
        $data['directorySpecial'] = $directorySpecial;
        $data['portfolioDocuments'] = $portfolioDocuments;

        return view('backend.portfolio.form', $data);
    }

    public function delete($id)
    {
        $portfolio = DB::table('products')
                ->where('id', $id)
                ->first();

        $directorySpecial = 'products/'.str_replace(' ','-', strtolower($portfolio->name));

        // delete folder beserta isinya
        File::deleteDirectory(public_path('/assets/images/' .$directorySpecial));

        // delete data in database
        DB::table('products')->where('id', $id)->delete();
        DB::table('portfolio_documents')->where('portfolioId', $id)->delete();

        return redirect()->back()->with('success', 'Data has been deleted.');
    }
}
