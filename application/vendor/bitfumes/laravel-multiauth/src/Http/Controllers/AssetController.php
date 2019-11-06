<?php

namespace Bitfumes\Multiauth\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


use App\Asset;
use App\Category;
use App\Option;

class AssetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $assets = Asset::latest()->get();
        $categories = Category::all();
        return view('multiauth::pages.asset.index')->with('assets', $assets)->with('categories', $categories);
    }

    public function create()
    {   
        $categories = Category::all();
        $options = Option::all();
        return view('multiauth::pages.asset.add')->with('categories', $categories)->with('options', $options);
    }

    public function edit($id)
    {
        $asset = Asset::find($id);
        $categories = Category::all();
        $options = Option::all();
        return view('multiauth::pages.asset.edit')->with('categories', $categories)->with('options', $options)->with('asset', $asset);
    }

    public function store(Request $request)
    {
      
        $validator = Validator::make($request->all(), [
            'name' => 'required', 'string', 'max:255',
            'category_id' => 'required',
            'price' => 'required',
            'option_id' => 'required',
            'image' => 'required',
            'status' => 'required',
            'value' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/asset/create')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $imageName = uniqid().$request->file('image')->getClientOriginalName();
            $asset= new Asset;

            $asset->name = $request->name;
            $asset->image = $imageName;
            $asset->price = $request->price;
            $asset->category_id = $request->category_id;
            $asset->description = $request->description;
            $asset->status = $request->status;
            $request->file('image')->move(public_path(), $imageName);
            $asset->save();    
            for($i=0; count($request->option_id)>$i; $i++){
                $data = [
                    'asset_id' => $asset->id,
                    'option_id' => $request->option_id[$i],
                    'value' => $request->value[$i]           
                ];
                DB::table('asset_option')->insert($data);
            }
            return  redirect('admin/asset')->with('success', 'Asset created successfully');
        }

    }

    public function update($id, Request $request)
    {
      
        $validator = Validator::make($request->all(), [
            'name' => 'required', 'string', 'max:255',
            'category_id' => 'required',
            'price' => 'required',
            'option_id' => 'required',
            'status' => 'required',
            'value' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/asset/create')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $asset= Asset::find($id);
            $asset->name = $request->name;
            $asset->price = $request->price;
            $asset->category_id = $request->category_id;
            $asset->description = $request->description;
            $asset->status = $request->status;
            if($request->hasFile('image')){
                $file_pointer = public_path($asset->image);
                unlink($file_pointer);
                $imageName = uniqid().$request->file('image')->getClientOriginalName();
                $asset->image = $imageName;
                $request->file('image')->move(public_path(), $imageName);
            }

            // dd($request->option_id);
            for($i=0; count($request->option_id)>$i; $i++){
               if(!empty($request->row_id[$i])){
                    $data = [
                        'asset_id' => $asset->id,
                        'option_id' => $request->option_id[$i],
                        'value' => $request->value[$i]           
                    ];
                    DB::table('asset_option')->where('id',$request->row_id[$i] )->update($data);
               }else{
                    $data = [
                        'asset_id' => $asset->id,
                        'option_id' => $request->option_id[$i],
                        'value' => $request->value[$i]           
                    ];
                    DB::table('asset_option')->insert($data);
               }
               
                
            }

            $asset->save();    
           
            return  redirect('admin/asset')->with('success', 'Asset created successfully');
        }
    }

    public function destroy($id)
    {
        $asset = Asset::find($id);
        $file_pointer = public_path($asset->image);
       
        if(unlink($file_pointer)){
            $asset->delete();
            return redirect('admin/asset')->with('success', 'Asset deleted successfully');
        }

    }

    public function deleteOption(Request $request)
    {
        DB::table('asset_option')->where('id',$request->input('id'))->delete();
        echo "success";
    }
}
