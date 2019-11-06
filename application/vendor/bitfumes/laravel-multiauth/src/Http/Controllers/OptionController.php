<?php

namespace Bitfumes\Multiauth\Http\Controllers;

use Bitfumes\Multiauth\Model\Admin;
use Bitfumes\Multiauth\Model\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;


use App\Option;

class OptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $options = Option::latest()->get();
        return view('multiauth::pages.option.index')->with('options', $options);
    }

    public function create()
    {

    }

    public function edit($id)
    {
        $option = option::find($id);
        $options = option::latest()->get();
        return view('multiauth::pages.option.index')->with('option', $option)->with('options', $options);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required', 'string', 'max:255',
            'image' => 'required|unique:options'
        ]);

        if ($validator->fails()) {
            return redirect('admin/option')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $imageName = uniqid().$request->file('image')->getClientOriginalName();
            $option= new Option;

            $option->name = $request->name;
            $option->image = $imageName;
            $request->file('image')->move(public_path(), $imageName);
            $option->save();
           

            return redirect('admin/option')->with('success', 'Option created successfully');
        }

    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required', 'string', 'max:255',
        ]);

        if ($validator->fails()) {
            return redirect('admin/option')
                        ->withErrors($validator)
                        ->withInput();
        }else{
     
            $option= Option::find($id);

            $option->name = $request->name;
            if($request->hasFile('image')){
                $file_pointer = public_path($option->image);
                unlink($file_pointer);
                $imageName = uniqid().$request->file('image')->getClientOriginalName();
                $option->image = $imageName;
                $request->file('image')->move(public_path(), $imageName);
            }
            $option->save();
           

            return redirect('admin/option')->with('success', 'Option updated successfully');
        }
    }

    public function destroy($id)
    {
        $option = Option::find($id);
        $file_pointer = public_path($option->image);
       
        if(unlink($file_pointer)){
            $option->delete();
            return redirect('admin/option')->with('success', 'Option deleted successfully');
        }

    }
}
