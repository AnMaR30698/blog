<?php

namespace App\Interface;

use Illuminate\Http\Request;
use App\Models\Post;

Interface Iblog {

public function addPost(Request $request);
public function updatePost(Request $request, Post $post);
public function deletePost(Post $post);
public function search(Request $request);
public function showRelated(Post $post);


}
