<?php

namespace App\Classes;

use App\Interface\Iblog;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DeletePost implements Iblog
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
        $post->delete();
    }
    public function search(Request $request){
        // 
    }
    public function showRelated(Post $post){
        //
    }

}
