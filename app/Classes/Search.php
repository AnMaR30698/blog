<?php

namespace App\Classes;

use App\Interface\Iblog;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class Search implements Iblog
{

    public function addPost(Request $request)
    {
//
    }
    public function updatePost(Request $request, Post $post)
    {
        //
    }
    public function deletePost(Post $post)
    {
//
    }
    public function search(Request $request)
    {
        $categories = Category::latest()->paginate(4);
        if ($request->search) {
            $posts = Post::where('title', 'like', '%' . $request->search . '%')
                ->orWhere('body', 'like', '%' . $request->search . '%')->latest()->paginate(4);
        } elseif ($request->category) {
            $posts = Category::where('name', $request->category)->firstOrFail()->posts()->paginate(3)->withQueryString();
        } else {
            $posts = Post::latest()->paginate(4);
        }
        return array('categories' => $categories ,'posts' => $posts);

    }
    public function showRelated(Post $post){
        //
    }

}
