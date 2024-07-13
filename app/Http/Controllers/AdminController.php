<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category()
    {
        $categories= Category::all();
        return view("admin.category", compact("categories"));
    }
    public function add_category(Request $request)
    {
        $data= new Category();
        $data->category_name= $request->name;
        $data->save();

        return redirect()->back()->with("message","Category added");
    }

    public function delete_category($id)
    {
        $category= Category::find($id);
        $category->delete();
        return redirect()->back();
    }
    public function view_product()
    {
        $categories= Category::all();
        return view('admin.product', compact('categories'));
    }
    public function add_product( Request $request)
    {
        $data= new Product();
        $data->title= $request->title;
        $data->description= $request->description;
        $image= $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('productimage', $imagename);
        $data->image= $imagename;
        $data->category= $request->category;
        $data->quantity= $request->quantity;
        $data->price= $request->price;
        $data->discount_price= $request->discount_price;
        $data->save();
        return redirect()->back()->with('message','Product Added');
    }
    public function edit_product($id, Request $request)
    {
        $data= Product::find($id);
        $data->title= $request->title;
        $data->description= $request->description;
        $image= $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('productimage', $imagename);
        $data->image= $imagename;
        $data->category= $request->category;
        $data->quantity= $request->quantity;
        $data->price= $request->price;
        $data->discount_price= $request->discount_price;
        $data->save();
        return redirect()->back()->with('message','Product updated');
    }
    public function update_product(Request $request)
    {
        $product= Product::find($request->id);
        $categories= Category::all();

        return view('admin.update_product', compact('product','categories'));

    }

    public function show_product()
    {
        $products= Product::all();
        return view('admin.show_product', compact('products'));
    }
    public function delete_product($id)
    {
        $product= Product::find($id);
        $product->delete();
        return redirect()->back();
    }
}

