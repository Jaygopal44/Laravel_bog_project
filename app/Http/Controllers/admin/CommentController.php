<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(){
        // $user = User::find(Auth::user()->id);
        $comment = Comment::all();
        return view('admin.comments',compact('comment'));
    }
}
