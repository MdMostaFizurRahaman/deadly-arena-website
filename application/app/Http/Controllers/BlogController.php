<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index ()
    {
        $posts = Post::paginate(8);
        return view ('pages.blog.index')->with('posts', $posts);
    }

    public function showPost ($id)
    {
        $post = Post::find($id);
        return view('pages.blog.post')->with('post', $post);
    }
}
