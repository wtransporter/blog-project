<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Artisan;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
            'categoriesAll' => Category::paginate(10)
        ]);
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
        } 
        catch (\Illuminate\Database\QueryException $e) {
            //23000 is sql code for integrity constraint violation
            if($e->getCode() == "23000"){
                throw \Illuminate\Validation\ValidationException::withMessages(['errors' => 'Cannot delete category. There are assigned posts.']);
            }
        }

        Artisan::call("cache:clear");

        return redirect()->back()->with('success', 'Category deleted.');
    }
}
