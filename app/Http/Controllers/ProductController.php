<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;

class ProductController extends Controller
{
    public function index()
    {
        
        $products = Product::paginate(5);
        $categories = Category::all();
        return view('welcome',compact('products','categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
            'images' => 'required'
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category;
        $product->user_id = rand(1,10);
        $product->save();

        if($request->has('images')){
            foreach($request->file('images') as $image) {
                $imageName = $product->title.'-image-'.time().rand(1,1000).'.'.$image->extension();
                $image->move(public_path('product_image'), $imageName);

                Image::create([
                    'product_id' => $product->id,
                    'image' => $imageName
                ]);
            }
        }
        return  redirect()->back()->with('alert-success', 'Successfully added product');

        // return $request->session()->flash('alert-success', 'Show success alert');
    }

    public function productdetail($id)
    {
        $product = Product::find($id);
        return view('productdetail', compact('product'));
    }
}
