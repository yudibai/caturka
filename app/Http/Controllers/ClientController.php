<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Classes\Utilities;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request, [
            'limit' => 'integer',
        ]);

        $data['clients'] = DB::table('clients')->orderBy('name','ASC')->when($request->key, function ($query) use ($request) {

            $q = $request->q;
            $key = $request->key;
            
            if ($key == 'name' && $q) {
                $query->where('name', 'LIKE', "%{$q}%");
            }

        })->paginate(10);
        $data['clients']->appends($request->only(['key','q']));
        $data['title'] = 'Clients';
        
        return view('admin.client.index', $data);
        
    }
    public function create(Request $request)
    {
        $slug = str_replace(' ','-', strtolower($request->name));
        $directorySpecial = 'clients';

        if ($request->getMethod() == 'POST')
        {
            $request->validate([
                'name' =>  'required',
                'imageFileName' =>  'required',
            ]);

            $directorySpecial = 'clients';
            
            // Image Upload
            $imageFileName = Utilities::imageUpload($request->imageFileName, $request->name, '', $request->file('imageFileName'), $directorySpecial);

            DB::table('clients')->insert([
                'name' =>  $request->name,
                'image' =>  $imageFileName,
                'created_at' =>  Carbon::now()->toDateTimeString(),
            ]);

            return redirect('admin/clients')->with('success','Data successfully added');

        }
        $data['title'] = "Create Client";
        $data['directorySpecial'] = $directorySpecial;

        return view('admin.client.form', $data);

    }

    public function update(Request $request, $id)
    {
        $client = DB::table('clients')
                ->where('id', $id)
                ->first();
                
        if (!$client)
        {
            return redirect('admin/clients')->with('info', 'Data not found');
        }
        
        $directorySpecial = 'clients';

        if ($request->getMethod() == 'POST')
        {
            $request->validate([
                'name' => 'required',
            ]);
            

            $directorySpecial = 'clients';
            
            // Image Upload
            $imageFileName = Utilities::imageUpload($request->imageFileName, $request->name, $client->image, $request->file('imageFileName'), $directorySpecial);
            
            DB::table('clients')
                ->where('id', $id)
                ->update([
                    'name' =>  $request->name,
                    'image' => $imageFileName,
                    'updated_at'   =>  Carbon::now()->toDateTimeString(),
                ]);
            
            return redirect('admin/clients')->with('success','Data successfully added');
        }
        
        $data['title'] = "Update Client";
        $data['client'] = $client;
        $data['directorySpecial'] = $directorySpecial;

        return view('admin.client.form', $data);
    }

    public function delete($id)
    {
        $client = DB::table('clients')
                ->where('id', $id)
                ->first();
        $directorySpecial = 'clients/'. $client->image;

        // delete folder beserta isinya
        File::deleteDirectory(public_path('/assets/images/' .$directorySpecial));

        // delete data in database
        DB::table('clients')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Data has been deleted.');
    }
}
