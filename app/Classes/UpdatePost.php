<?php

namespace App\Classes;

use App\Interface\Iblog;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UpdatePost implements Iblog
{

    public function addPost(Request $request)
    {
//
    }
    public function updatePost(Request $request, Post $post)
    {
        $post->category_id = $request->input('category_id');

        $postId = $post->id;
        $post->title = $request->input('title');
        $post->slug = Str::slug($request->input('title')) . '-' . $postId;
        $post->body = $request->input('body');
        $post->category_id = $request->input('category_id');
        if ($request->hasFile('image')) {
            $path = 'storage/' . $request->file('image')->store('PostImages', 'public');
            $post->imagePath = $path;
        }
        $post->imagePath = 'storage/' . $request->file('image')->store('PostImages', 'public');

        $post->save();

    }
    public function deletePost(Post $post)
    {
//
    }
    public function search(Request $request)
    {
        //
    }
    public function showRelated(Post $post){
        //
    }

}
