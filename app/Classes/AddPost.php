<?php

namespace App\Classes;

use Illuminate\Http\Request;
use App\Interface\Iblog;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Auth;



class AddPost implements Iblog
{

    public function addPost(Request $request)
    {
         $post = new Post();
       if (Post::latest()->first() !== null) {
           $postId = Post::latest()->first()->id + 1;
       }else {
           $postId = 1;
       }
       $post->title = $request->input('title');
       $post->slug = Str::slug($request->input('title') , '-'). '-'. $postId ;
       $post->user_id = Auth::user()->id;
       $post->category_id = $request->input('category_id');

       $post->body = $request->input('body');
       $post->imagePath = 'storage/'. $request->file('image')->store('PostImages','public');
       $post->save();


    }
    public function updatePost(Request $request, Post $post){
//
    }
    public function deletePost(Post $post){
// 
    }
    public function search(Request $request){
        // 
    }
    public function showRelated(Post $post){
        //
    }

}
