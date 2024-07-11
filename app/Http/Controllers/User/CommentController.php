<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(){
        $comments = Comment::where('user_id', Auth::id())->latest()->get();
        return view('User.comments.index',compact('comments'));
    }
}
