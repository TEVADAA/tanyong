<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show()
    {
        $cat = Categories::orderBy('cat_id')->get();
        return view('admin.categories.show',compact('cat'));
    }

    public function store(Request $request){
        $request->validate(['cat_name' => 'required']);

        $cat = new Categories();

        $cat->cat_name = $request->cat_name;

        $cat->save();

        return redirect()->route('categories.show')->with('success','Categories added seccessfully!');
    }

    public function edit($cat_id){
        $cat = Categories::where('cat_id', $cat_id)->first();

        if(!$cat){
            return redirect()->route('categories.show')->with('error','Categories not found!');
        }
        return view('admin.categories.edit',compact('cat'));
    }

    public function update($cat_id, Request $request){
        // Validate the request data
        $request->validate([
            'cat_name' => 'required'
        ]);

        // Find the category by cat_id
        $cat = Categories::where('cat_id', $cat_id)->first();

        // Check if the category exists
        if (!$cat) {
            return redirect()->route('categories.show')->with('error', 'Category not found!');
        }

        // Update the category name
        $cat->cat_name = $request->cat_name;

        // Save the changes to the database
        $cat->save();

        // Redirect back with a success message
        return redirect()->route('categories.show')->with('success', 'Category updated successfully!');
    }

    public function delete($cat_id){
        $cat = Categories::where('cat_id',$cat_id)->first();
        $cat->delete();
        return redirect()->route('categories.show');
    }

}
