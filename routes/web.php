<?php

use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[BlogController::class,'index']);

//find blog with slug not with id  => {blog:slug}
Route::get('/blogs/{blog:slug}',[BlogController::class,'show'])->where('blog','[A-z\d\-_]+'); //slug pattern

//Registration
Route::get('/register',[AuthController::class,'create'])->middleware('guest');
Route::post('/register',[AuthController::class,'store'])->middleware('guest');

//logout
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth');
//login
Route::get('/login',[AuthController::class,'login'])->middleware('guest'); //show login view
Route::post('/login',[AuthController::class,'check'])->middleware('guest'); //check

//comment
Route::post('/blogs/{blog:slug}/comments',[CommentController::class,'store']);

//subscription
Route::post('/blogs/{blog:slug}/subscription',[BlogController::class,'subscriptionHandler']);


Route::middleware('can:admin')->group(function(){
    //Admin Managment
    //create blog
    Route::get('/admin/blogs/create',[AdminBlogController::class,'create']);
    Route::post('/admin/blogs/store',[AdminBlogController::class,'store']);

    //delete blog
    Route::delete('/admin/blogs/{blog:slug}/delete',[AdminBlogController::class,'destroy']);

    //edit blog
    Route::get('/admin/blogs/{blog:slug}/edit',[AdminBlogController::class,'edit']);

    //update blog
    Route::patch('/admin/blogs/{blog:slug}/update',[AdminBlogController::class,'update']);

    //dashboard
    Route::get('/admin/blogs',[AdminBlogController::class,'index']);
});








// Route::get('/blogs/{blog}',function($id){
//     return view('blog',[
//         'blog' => Blog::findOrFail($id)
//     ]);
// })->where('blog','[A-z\d\-_]+'); //slug pattern

//catgory
// Route::get('/categories/{category:slug}',function(Category $category){
//     return view('blogs',[
//         // 'blogs' => $category->blogs->load('category','author')
//         'blogs' => $category->blogs,
//         'categories' => Category::all(),
//         'currentCategory' => $category
//     ]);
// });

//author
// Route::get('/users/{user:username}',function(User $user){
//     return view('blogs',[
//         // 'blogs' => $user->blogs->load('category','author')
//         'blogs' => $user->blogs,
//         // 'categories' => Category::all()
//     ]);
// });
