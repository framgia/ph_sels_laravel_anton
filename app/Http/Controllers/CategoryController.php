<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index', ["categories" => Categories::all()]);
    }

    public function store()
    {
        $category = new Categories($this->categoryValidation());
        $category->save();

        return $this->index();
    }

    public function create()
    {
        return view('category.create');
    }

    public function show(Categories $category)
    {
        return view('category.edit', ["category" => Categories::findOrFail($category->id)]);
    }

    public function update(Categories $category)
    {
        $category->update($this->categoryValidation());

        return $this->index();
    }

    public function destroy(Categories $category)
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
