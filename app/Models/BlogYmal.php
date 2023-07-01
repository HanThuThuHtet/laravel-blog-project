<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Blog{
    public $title,$slug,$intro,$body,$date;
    public function __construct($title,$slug,$intro,$body,$date)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->intro = $intro;
        $this->body = $body;
        $this->date = $date;
    }
    public static function all()
    {
        //$files = File::files(resource_path("/blogs"));
        return collect(File::files(resource_path("/blogs")))
        ->map(function($file){
            $obj = YamlFrontMatter::parseFile($file);
            $blog = new Blog($obj->title,$obj->slug,$obj->intro,$obj->body(),$obj->date);
            return $blog;
        })
        ->sortByDesc("date");
        }
    public static function find($slug)
    {
        $blogs = static::all();
        return $blogs->firstWhere('slug',$slug);
    }
    public static function findOrFail($slug)
    {
        // $blogs=static::all();
        // $blog = $blogs->firstWhere('slug',$slug);
        //$blog = static::all()->firstWhere('slug',$slug);
        $blog = static::find($slug);
        if(!$blog){
            throw new ModelNotFoundException(); //same as abort(404);
        }
        return $blog;
    }
}

?>
