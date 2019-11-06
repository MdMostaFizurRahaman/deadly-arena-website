<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Category;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index ()
    {
        $categories = Category::all();
        $assets = Asset::paginate(12);
        return view ('pages.store')->with('assets', $assets)->with('categories', $categories);
    }

    public function showByCategory ($id)
    {
        $categories = Category::all();
        $assets = Asset::where('category_id', $id)->paginate(12);
        return view('pages.category')->with('assets', $assets)->with('categories', $categories);
    }

    public function showAsset($id)
    {
        $asset = Asset::find($id);
        return view('pages.asset')->with('asset', $asset);
    }
}
