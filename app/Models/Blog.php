<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $fillable = ["title","intro","body"];
    protected $with = ['category','author'];

    public function scopeFilter($query,$filter) //$query = Blog::latest()   $filter = request(['search','category','username']
    {
        //search
        $query->when($filter['search'] ?? false ,function($query,$search){ //$search = $filter['search']
                $query->where(function($query) use ($search)
                {
                    $query->where("title","LIKE",'%'.$search.'%')
                    ->orWhere("body","LIKE",'%'.$search.'%');
                });
        });

        //category
        $query->when($filter['category'] ?? false,function($query,$slug){
            $query->whereHas('category',function($query) use ($slug){
                $query->where('slug',$slug);
            });
        });

        //author
        $query->when($filter['username'] ?? false,function($query,$username){
            $query->whereHas('author',function($query) use ($username){
                $query->where('username',$username);
            });
        });

    }

    public function category(){
        //hasOne hasMany belongsTo belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function subscribers()
    {
        return $this->belongsToMany(User::class,'blog_user');
    }

    public function subscribe(){
       return $this->subscribers()->attach(auth()->id());
    }

    public function unSubscribe(){
        return $this->subscribers()->detach(auth()->id()); //belongstomany
    }

}

//logical groupinng
//( name = 'mg mg' || name = 'aung aung') && age > 20
