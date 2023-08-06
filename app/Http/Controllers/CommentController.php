<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Auth;

class CommentController extends Controller
{
    public function store(Post $post ,Request $request)
    {
        $request->validate([
           'comme' => 'required',]);

        $comment = new Comment();
        $user = Auth::user();
        $comment->coment = $request->input('comme');
        // $comment->coment = 'asdas';
        $comment->post_id = $post->id;
        $comment->user_id = $user->id;
        $comment->save();
        return redirect()->back();
        // return $comment;
    }
}
