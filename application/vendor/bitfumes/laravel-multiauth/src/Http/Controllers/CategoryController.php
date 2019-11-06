<?php

namespace Bitfumes\Multiauth\Http\Controllers;

use Bitfumes\Multiauth\Model\Admin;
use Bitfumes\Multiauth\Model\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;


use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $categories = Category::latest()->get();
        return view('multiauth::pages.category.index')->with('categories', $categories);
    }

    public function create()
    {

    }

    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::latest()->get();
        return view('multiauth::pages.category.index')->with('category', $category)->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required', 'string', 'max:255',
            'image' => 'required|unique:categories'
        ]);

        if ($validator->fails()) {
            return redirect('admin/category')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $imageName = uniqid().$request->file('image')->getClientOriginalName();
            $category= new Category;

            $category->name = $request->name;
            $category->image = $imageName;
            $request->file('image')->move(public_path(), $imageName);
            $category->save();
           

            return redirect('admin/category')->with('success', 'Category Created Successfully');
        }

    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required', 'string', 'max:255',
        ]);

        if ($validator->fails()) {
            return redirect('admin/category')
                        ->withErrors($validator)
                        ->withInput();
        }else{
     
            $category= Category::find($id);

            $category->name = $request->name;
            if($request->hasFile('image')){
                $file_pointer = public_path($category->image);
                unlink($file_pointer);
                $imageName = uniqid().$request->file('image')->getClientOriginalName();
                $category->image = $imageName;
                $request->file('image')->move(public_path(), $imageName);
            }
            $category->save();
           

            return redirect('admin/category')->with('success', 'Category updated successfully');
        }
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $file_pointer = public_path($category->image);
        if(unlink($file_pointer)){
            $category->delete();
            return redirect('admin/category')->with('success', 'Category deleted successfully');
        }

    }
}
