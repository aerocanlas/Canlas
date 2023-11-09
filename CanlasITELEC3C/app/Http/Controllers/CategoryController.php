<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Categories::all();
        return view('admin.category.category', compact('categories'));
    }

    public function create(Request $request) {
        $category = new Categories;
        $category->category_name = $request->category_name;
        $category->user_id = $request->user_id;

        $category->save();

        return redirect()->back();
    }

}