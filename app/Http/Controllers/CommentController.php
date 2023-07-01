<?php

namespace App\Http\Controllers;

use App\Mail\SubscriberMail;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    //
    public function store(Blog $blog)
    {
        request()->validate([
            'body' => 'required|min:1'
        ]);

        //store cmt
        $blog->comments()->create([
            'body' => request('body'),
            'user_id' => auth()->id(),
        ]);

        //mail
        //dd($blog->subscribers->filter(fn ($subscriber) => $subscriber->id != auth()->id() )); //subscribers except auth()
        $subscribers = $blog->subscribers->filter(fn($subscriber) => $subscriber->id != auth()->id() );
        $subscribers->each(function($subscriber) use ($blog){
            Mail::to($subscriber->email)->queue(new SubscriberMail($blog));
        });


        return redirect('/blogs/'.$blog->slug);

    }
}
