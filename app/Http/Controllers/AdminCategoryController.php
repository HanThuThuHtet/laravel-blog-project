<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminCategoryController extends Controller
{
    public function index()
    {
        return view('admin.blogs.all-category',[
            'categories' => Category::latest()->paginate(6)
        ]);
    }

    public function create()
    {
        return view('admin.blogs.create-category',[
            'categories' => Category::all()
        ]);
    }
    public function store()
    {
        $formData = request()->validate([
            'name' => "required",
            'slug' => "required|unique:blogs,slug",
        ]);
        Category::create($formData);

        return redirect('/');

    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }

    public function edit(Category $category)
    {
        return view('admin.blogs.edit-category',[
            'category' => $category,
        ]);
    }

    public function update(Category $category)
    {
        //$path = request()->file('thumbnail')->store('thumbnails');

        $formData = request()->validate([
            'name' => "required",
            'slug' => ["required", Rule::unique('categories','slug')->ignore($category->id)],
        ]);

        $category->update($formData);
        return redirect('/');
    }

}
