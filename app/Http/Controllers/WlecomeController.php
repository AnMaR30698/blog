<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class WlecomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(4)->get();
        return view('main.index')->with('posts',$posts);
    }
}
