<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function blog() //to foreginID = blog_id in cmt migration
    {
        return $this->belongsTo(Blog::class);
    }

    public function author() //author_id => user_id
    {
        return $this->belongsTo(User::class,'user_id'); //overwrite in second param
    }

}
