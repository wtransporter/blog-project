<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
            'categoriesAll' => Category::paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(UpdateCategoryRequest $request)
    {
        $attributes = $request->validated();

        Category::create($attributes);

        return redirect()->route('categories.create')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $attributes = $request->validated();

        $category->update($attributes);

        cache()->forget('categories');

        return redirect()->route('categories.edit', $category)->with('success', 'Category updated');
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
        } 
        catch (\Illuminate\Database\QueryException $e) {
            if($e->getCode() == "23000"){
                throw \Illuminate\Validation\ValidationException::withMessages(['errors' => 'Cannot delete category. There are assigned posts.']);
            }
        }

        cache()->forget('categories');

        return redirect()->back()->with('success', 'Category deleted.');
    }
}
