<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BlogController extends Controller
{
    public function index() {



        // DB::listen(function($query){
        //     //Log::info("")
        //     logger($query->sql);
        // });

        //return ["key" => "han"]; //assc array to json
        // dd(request('search'));

        return view('blogs.index',[
            'blogs' => Blog::latest()
                    ->filter(request(['search','category','username']))
                    ->paginate(6)
                    ->withQueryString(),
            // 'blogs' => Blog::latest()->filter(request(['search','category','username']))->get(),
            // 'categories' => Category::all()
            // 'currentCategory' => request(['category'])

            // 'blogs' => Blog::all()

            //to solve N+1 Problem => with() eager / lazy loading
            //eager load relationship query before forEach loop
            //'category' and 'author'  => relationship method in Blog model
            // 'blogs' => Blog::with('category','author')->get()
            // 'blogs' => Blog::all()


        ]);
    }

    // protected function getBlogs(){

    //     return Blog::latest()->filter()->get();
    //     //oop
    //     // $query = Blog::latest();
    //     // $query->when(request('search'),function($query,$search){
    //     //     $query->where("title","LIKE",'%'.$search.'%')
    //     //           ->orWhere("body","LIKE",'%'.$search.'%');
    //     // });
    //     // return $query->get();

    //     // if(request('search')){
    //     //     $blogs = $blogs->where("title","LIKE",'%'.request('search').'%')
    //     //                    ->orWhere("body","LIKE",'%'.request('search').'%');
    //     // }


    // }




    public function show(Blog $blog){
        return view('blogs.show',[
            'blog' => $blog,
            'randomBlogs' => Blog::inRandomOrder()->take(3)->get()
        ]);
    }

    public function subscriptionHandler(Blog $blog)
    {
        //if auth()->user()->isSubsribed()
        // if(auth()->user()->User::isSubscribed($blog)){
        //if(User::find(auth()->id())->isSubscribed($blog))
        if(User::find(auth()->id())->isSubscribed($blog)){
            $blog->unSubscribe();
        }else{
            $blog->subscribe();
        }
        return redirect()->back();
    }



}







