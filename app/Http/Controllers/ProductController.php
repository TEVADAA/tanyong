<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show()
    {
        $pro = Product::with('categories')->get();
        return view("admin.product.show",compact('pro'));
    }
    public function create()
    {

        $cat = Categories::all();
        return view('admin.product.create', compact('cat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pro_name' => 'required|string',
            'price' => 'required|numeric',
            'pro_detail' => 'required|string',
            'pro_photo' => 'required|image|mimes:png,jpg,jpeg,gif|max:20480',
            'cat_id' => 'required|exists:categories,cat_id',
        ]);

        $pro = new Product();

        $pro->pro_name = $request->pro_name;
        $pro->price = $request->price;
        $pro->pro_detail = $request->pro_detail;

        if ($request->hasFile('pro_photo')) {
            $extension = $request->file('pro_photo')->extension();
            $filename = date('YmdHis') . '.' . $extension;
            $request->file('pro_photo')->move(public_path('uploads/product/'), $filename);

            // Save the filename in the database
            $pro->pro_photo = $filename;
        }

        $pro->cat_id = $request->cat_id;

        $pro->save();

        return redirect()->route('product.show')->with('success', 'Product added successfully!');
    }

    public function edit($id)
    {
        $pro = Product::where('id', $id)->first();

        if (!$pro) {
            return redirect()->route('product.show')->with('error', 'Product not found!');
        }

        return view('admin.product.edit', compact('pro'));
    }

    public function update($id, Request $request){
        // Validate the request
        $request->validate([
            'pro_name' => 'required|string',
            'price' => 'required|numeric',
            'pro_detail' => 'required|string',
            'pro_photo' => 'required|image|mimes:png,jpg,jpeg,gif|max:20480',
            'cat_id' => 'required|exists:categories,cat_id',
        ]);

        // Create a new slider instance
        $pro = Product::where('id',$id)->first();

        // Handle file upload

        $pro->pro_name = $request->pro_name;
        $pro->price = $request->price;
        $pro->pro_detail = $request->pro_detail;

        if ($request->hasFile('pro_photo')) {
            // Check if the old file exists and delete it
            $oldBackgroundPath = public_path('uploads/product/' . $pro->pro_photo);
            if (file_exists($oldBackgroundPath) && !empty($pro->pro_photo)) {
                unlink($oldBackgroundPath);
            }

            // Save the new file
            $extension = $request->file('pro_photo')->extension();
            $filename = date('YmdHis') . '.' . $extension;
            $request->file('pro_photo')->move(public_path('uploads/product/'), $filename);

            // Update the filename in the database
            $pro->pro_photo = $filename;
        }

        $pro->cat_id = $request->cat_id;

        // Save the slider instance to the database
        $pro->save();

        // Redirect to the slider listing page with a success message
        return redirect()->route('product.show')->with('update success', 'Product update successfully!');
    }
}
