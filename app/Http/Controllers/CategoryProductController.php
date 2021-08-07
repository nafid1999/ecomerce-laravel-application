<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\ElseIf_;

class CategoryProductController extends Controller
{
    public function index()
    {
        if (request()->show_numbers) {
            $limitt = request()->show_numbers;
        } else {
            $limitt = 12;
        }
        if (isset(request()->sort_by)) {
            switch (request()->sort_by) {
                case "new":
                    $sort_by = "created_at";
                    $acs_desc = "desc";
                    $slc = 1;
                    break;
                case "cheap":
                    $sort_by = "price";
                    $acs_desc = "asc";
                    $slc = 2;
                    break;
                case "expensive":
                    $sort_by = "price";
                    $acs_desc = "desc";
                    $slc = 3;
                    break;
            }
        } else {
            $sort_by = "created_at";
            $acs_desc = "desc";
            $slc = 1;
        }
        if (request()->id_cat) {
            $category = Category::where('id', request()->id_cat)->get();
            $products =  Product::where('category_id', request()->id_cat)->orderBy($sort_by, $acs_desc)->paginate($limitt);
            return view("items_cats")->with('products', $products)->with('cat', $category)->with('slc', $slc);
        } elseif (request()->search) {
            $search = request()->search;
            $products  = Product::query()
                ->where('title', 'LIKE', "%{$search}%")->orderBy($sort_by, $acs_desc)
                ->paginate($limitt);
            return view("items_cats")->with('products', $products)->with('slc', $slc);
        } elseif (request()->best_offers) {
            $products =   Product::where('best_offers', 1)->orderBy($sort_by, $acs_desc)
                ->paginate($limitt);
            return view("items_cats")->with('products', $products)->with('slc', $slc);
        } else {
            $products =  Product::take($limitt)->orderBy($sort_by, $acs_desc)->paginate($limitt);
            return view("items_cats")->with('products', $products)->with('slc', $slc);
        }
    }
}