<?php

namespace Bitfumes\Multiauth\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


use App\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $posts = Post::latest()->get();
        return view('multiauth::pages.post.index')->with('posts', $posts);
    }

    public function create()
    {   
    
        return view('multiauth::pages.post.add');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('multiauth::pages.post.edit')->with('post', $post);
    }

    public function store(Request $request)
    {
      
        $validator = Validator::make($request->all(), [
            'title' => 'required', 'string', 'max:255',
            'description' => 'required','string',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('admin/post/create')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $imageName = uniqid().$request->file('image')->getClientOriginalName();
            $post= new Post;

            $post->title = $request->title;
            $post->description = $request->description;
            $post->image = $imageName;
            $post->author = Auth::user()->name;
            $request->file('image')->move(public_path(), $imageName);
            $post->save();    
            
            return  redirect('admin/post')->with('success', 'Post created successfully');
        }

    }

    public function update($id, Request $request)
    {
      
        $validator = Validator::make($request->all(), [
            'title' => 'required', 'string', 'max:255',
            'description' => 'required','string',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('admin/post/create')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $post= Post::find($id);
            $post->title = $request->title;
            $post->description = $request->description;
            $post->author = Auth::user()->name;
            if($request->hasFile('image')){
                $file_pointer = public_path($post->image);
                unlink($file_pointer);
                $imageName = uniqid().$request->file('image')->getClientOriginalName();
                $post->image = $imageName;
                $request->file('image')->move(public_path(), $imageName);
            }

            $post->save();    
           
            return  redirect('admin/post')->with('success', 'post created successfully');
        }
    }

    public function destroy($id)
    {
        $post = post::find($id);
        $file_pointer = public_path($post->image);

        try {
            if(unlink($file_pointer)){
                $post->delete();
                return redirect('admin/post')->with('success', 'Post deleted successfully');
            }
        } catch (\Throwable $th) {
            return redirect('admin/post');
        }
       
       

    }

    public function deleteOption(Request $request)
    {
        DB::table('post_option')->where('id',$request->input('id'))->delete();
        echo "success";
    }
}
