<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Classes\AddPost;
use App\Classes\UpdatePost;
use App\Classes\DeletePost;
use App\Classes\Search;
use App\Classes\ShowRelated;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Auth;

class BlogController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth')->except(['index','showPost']);
    }
////////////////////////////////////////////////////////////////
    public function index(Request $request)
    {
        
        $search = new Search();
        $data = $search->search($request);

        return view('blog.blog')->with('posts' ,$data['posts'])->with('categories' ,$data['categories']);
    }
////////////////////////////////////////////////////////////////
    public function create()
    {
        $categories = Category::all();
        return view('blog.blog-post-create')->with('categories' , $categories);
    }
////////////////////////////////////////////////////////////////
    public function store(Request $request)
    {
       $request->validate([
           'title' => 'required',
           'image' => 'required | image',
           'body' => "required",
           'category_id' => "required"
       ]);

        $add = new AddPost();
        $add->addPost($request);

       return redirect()->back();
    }
////////////////////////////////////////////////////////////////
    // public function show($slug)
    // {
    //     $post = Post::where('slug', $slug)->first();
    //     return view('blog.single-post')->with('post',$post);
    // }
////////////////////////////////////////////////////////////////
    //using route model binding
    public function showPost(Post $post )
    {
        // $category = $post->category;
        // $relatedPosts = $category->posts()->where('id','!=',$post->id)->latest()->take(3)->get();
        // $comments= Comment::where('post_id',$post->id)->get();
        $show = new ShowRelated();
        $data =$show->showRelated($post);
        return view('blog.single-post')->with('post',$data['post'])->with('comments',$data['comments'])->with('relatedPosts',$data['relatedPosts']);
    }
////////////////////////////////////////////////////////////////
    public function showEditePost(Post $post)
    {
        $categories = Category::all();

               if (auth()->user()->id !== $post->user->id) {
                   abort(403);
               }
        return view('blog.edite-post')->with('post',$post)->with('categories' , $categories);
    }
////////////////////////////////////////////////////////////////
    public function update(Post $post ,Request $request)
    {
         if (auth()->user()->id !== $post->user->id) {
                   abort(403);
               }

        $request->validate([
           'title' => 'required',
           'image' => 'required | image',
           'body' => 'required',
           'category_id' => 'required'
       ]);

        $update = new UpdatePost();
        $update->updatePost($request ,$post);

       return redirect()->route('index.blog');
    }
////////////////////////////////////////////////////////////////
    public function destroy(Post $post)
    {
       
        $delete = new DeletePost();
        $delete->deletePost($post);
         return redirect()->back();
    }
////////////////////////////////////////////////////////////////

}
