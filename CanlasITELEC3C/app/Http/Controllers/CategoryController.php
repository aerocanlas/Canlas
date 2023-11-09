<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function index() {
        $categories = Categories::latest()->paginate('5');
        return view('admin.category.category', compact('categories'));
    }

    public function create(Request $request) {

        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);

        Categories::create([

            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);


        return redirect()->back()->with('success','Category Inserted Successfully');
    }
public function Edit($id){

    $categories = Categories::find($id);
    return view('admin.category.edit', compact('categories'));

}

public function Update(Request $request, $id) {

    $update = Categories::find($id)->update([
        'category_name'=> $request->category_name,
        'user_id' => Auth::user()->id
    ]);

    return Redirect()->route('category')->with('success', 'Updated Successfully');
}

public function Delete($id){

    $category = Categories::find($id);
        $category->delete();

        return Redirect()->back();

}
}