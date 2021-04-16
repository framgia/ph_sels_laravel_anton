<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index', [
            "categories" => Category::all(),
        ]);
    }

    public function store()
    {
        $category = new Category($this->categoryValidation());
        $category->save();

        return $this->index();
    }

    public function create()
    {
        return view('category.create');
    }

    public function show(Category $category)
    {
        return view('category.edit', ["category" => Category::findOrFail($category->id)]);
    }

    public function update(Category $category)
    {
        $category->update($this->categoryValidation());

        return $this->index();
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back();
    }

    public function categoryValidation()
    {
        return request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
    }
}
