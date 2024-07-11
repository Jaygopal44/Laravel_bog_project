<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CommentController as AdminCommentController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentreplyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\CommentController as UserCommentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\View;
// use phpDocumentor\Reflection\DocBlock\Tag;
use App\Models\Tag;
use App\Models\Tags;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/posts', [App\Http\Controllers\HomeController::class, 'posts'])->name('posts');
Route::get('/categories', [App\Http\Controllers\HomeController::class, 'categories'])->name('categories');
Route::get('/post/{slug}', [App\Http\Controllers\HomeController::class, 'single_post'])->name('single_post');
Route::get('/category/{slug}', [App\Http\Controllers\HomeController::class, 'category_post'])->name('category_post');
Route::get('/category', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
Route::get('/tag/{name}', [App\Http\Controllers\HomeController::class, 'tag_posts'])->name('tag_posts');


//view composer
View::composer('layouts.frontend.partition.sidebar', function($view){
    $categories = Category::take(10)->get();
    $latest_post = Post::latest()->take(3)->get();
    $recent_tag = Tags::all();
    return $view->with('categories' , $categories)->with('latest_post' , $latest_post)->with('recent_tag' , $recent_tag);
});




// Route::get('/', function () {
//     return view('welcome');
// });

//Dashboard Controller
Route::get('/Admin/Dashboard', [DashboardController::class, 'index']);
Route::get('/Admin/Profile', [DashboardController::class, 'show_profile']);
Route::put('admin/profile/update',[DashboardController::class, 'update_profile']);
Route::put('admin/profile/changePassword',[DashboardController::class, 'change_password']);
// $user = User::findOrFail(Auth::user()->id);

//User Controller
Route::get('Admin/Users',[UserController::class, 'index']);
Route::put('admin/user/update/{id}',[UserController::class, 'update']);
Route::delete('admin/user/delete/{id}',[UserController::class, 'delete']);

//Category Controller
Route::get('Admin/Category',[CategoryController::class, 'index']);
Route::post('category_insert',[CategoryController::class,'category_insert']);
Route::get('Admin/Category',[CategoryController::class,'display']);
Route::put('admin/category/update/{id}',[CategoryController::class, 'update']);
Route::delete('admin/category/delete/{id}',[CategoryController::class, 'delete']);

//Post Controller
Route::get('Admin/Post',[PostController::class, 'index']);
Route::get('Admin/Post/Create',[PostController::class, 'create']);
Route::post('post_insert',[PostController::class,'post_insert']);
// Route::get('Admin/Post',[PostController::class,'display']);
Route::put('admin/post/update/{id}',[PostController::class, 'update']);
Route::delete('admin/post/delete/{id}',[PostController::class, 'delete']);


//user dashboard controller
Route::get('user/dashboard', [UserDashboardController::class , 'index'] );
Route::get('user/comments', [UserDashboardController::class , 'comment'] );
Route::get('user/reply_comments', [UserDashboardController::class , 'comment'] );


//Auth//Home controller
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Comment Controller
Route::post('comment/{post}' , [CommentController::class , 'store']);
// Route::get('Admin/Comment' , [CommentController::class, ''])
// Route::post('/post/{slug}' , [HomeController::class , 'view']);

//Admin comment controller
Route::get('Admin/Comment' , [AdminCommentController::class , 'index']);

//User comment controller
Route::get('User/Comment' , [UserCommentController::class , 'index']);


//Comment reply controller

Route::post('comment_reply/{comment}', [CommentreplyController::class , 'store_reply']);
