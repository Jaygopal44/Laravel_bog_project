<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tags;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     *
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::latest()->take(6)->get();
        return view('index',compact('posts'));
    }

    public function posts(){
        $posts = Post::where('status', 1)->latest()->paginate(2);
        $categories =Category::take(10)->get();
        $latest_post = Post::latest()->get();
        return view('posts',compact('posts','categories','latest_post'));
    }

    public function categories(){
        $posts = Post::latest()->take(6)->get();
        $categories = Category::latest()->get();
        return view('categories',compact('categories','posts'));
    }

    public function single_post($slug){
        // echo $id;
        // $post = Post::find($slug);
        // $data = User::all();
        // $comment = Comment::where('slug',$slug)->first();
        $categories = Category::take(10)->get();
        $latest_post = Post::latest()->take(3)->get();
        $posts = Post::latest()->take(6)->get();
        $post = Post::where('slug',$slug)->first();
        return view('single_post',compact('post','latest_post','categories','posts'));
    }

    public function category_post($slug){
        $cat = Category::where('slug', $slug)->first();

        $posts = $cat->posts()->get();
        $categories = Category::take(10)->get();
        // echo "<pre>";
        // print_r($posts);
        // die;
        return view('category_post',compact('posts','categories'));
    }

    public function search(Request $a){
        $this->validate($a, ['search' => 'required|max:255']);
        $search = $a->search;
        $posts = Post::where('title', 'like', "%$search%")->paginate(10);
        $posts->appends(['search' => $search]);

        // echo "<pre>";
        // print_r($posts);
        // die;
        $categories = Category::all();
        return view('search',compact('categories','posts','search'));
    }

    public function tag_posts($name){
        $query = $name;
        $tags = Tags::where('name', 'like', "%$name%")->paginate(10);


        // $categories = Category::all();
        return view('tag_posts',compact('tags','query'));
    }

    // public function view($slug){
    //         $comment = Comment::all();
    //         $post = Post::where('slug',$slug)->first();
    //         return view('single_post',compact('comment','post'));
    //     }
}
