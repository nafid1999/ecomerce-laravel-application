<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::inRandomOrder()->take(12)->get();
        $cats = Category::get();
        $best_offers = Product::where('best_offers', 1)->inRandomOrder()
            ->take(4)
            ->get();
        $last_added = Product::orderby('created_at')->take(10)->get();

        //  dd($products);
        return view("home")->with('products', $products)
            ->with('cats', $cats)
            ->with('best_offers', $best_offers)
            ->with('last_added', $last_added);
    }

    public function show($prd_id)
    {
        $product = Product::where('id', $prd_id)->first();
        $also_viewd = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->inRandomOrder()->take(12)->get();

        return view('product')->with('product', $product)->with('also_viewd', $also_viewd);
    }
}