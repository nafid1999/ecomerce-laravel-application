<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $title='Products';
        $products=Product::all();
        return view('admin.products.products')->with(['products'=>$products,'title'=>$title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.products.create")->with(["categories"=>Category::all(),]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Product $product)
    {
        //
        $this->validate($request,[
            "title"=>'required|min:3',
            "description"=>'required|min:5',
            "image"=>"required|image|mimes:jpg,png,jpeg|max:2048",
            'qty'=>"required|numeric|min:1",
            'price'=>"required|numeric|min:1",
            'category_id'=>'required|numeric',
        ]);


        if($request->has("image"))
        {   
            $file=$request->image;
            $imageName="images/products/".time()."_".$file->getClientOriginalName();
            $file->move(public_path("images/products"),$imageName);

             Product::create([
                "title"=>$request->title,
                "description"=>$request->description,
                "category_id"=>$request->category_id,
                "image"=>$imageName,
                "price"=>$request->price,
                "solds"=>$request->qty,
                "quantity"=>$request->qty,

                "best_offers"=>0,
            ]);
            return redirect()->back()->withSuccess("The producs added successfully !");
        }
        return redirect()->back()->withDanger("There was a porblem !");


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $title="Edit Product";
        $product=Product::find($id);
        $categories=Category::all();
        return view('admin.products.edit')->with(['product'=>$product,
                                             'categories'=>$categories,
                                              "title"=>$title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate fields
        
            $this->validate($request,[
                "title"=>'required|min:3',
                "description"=>'required|min:5',
                "image"=>"nullable|image|mimes:jpg,png,jpeg|max:2048",
                'qty'=>"required|numeric|min:1",
                'price'=>"required|numeric|min:1",
                'category_id'=>'required|numeric',
            ]);

            // retrieve the product 
            $pro=Product::find($id);
            $image=$pro->image;
            $old_path=public_path($image);
            //check file field
            if($request->hasFile('image')){
                    
                    if(File::exists($old_path))
                    {
                        File::delete($old_path);
                    }

                    $file=$request->image;
                    $old_path="images/products/".time()."_".$file->getClientOriginalName();
                    $file->move(public_path("images/products"),$old_path);
                   // update data
                    $pro->update([
                        "title"=>$request->title,
                        "description"=>$request->description,
                        "category_id"=>$request->category_id,
                        "image"=>$old_path,
                        "price"=>$request->price,
                        "solds"=>$request->qty,
                        "quantity"=>$request->qty,
                        "best_offers"=>$request->qty,
                    ]);
            
            
                return redirect()->back()->withSuccess("The product updated successfully !");
            }
             //update 
            $pro->update([
                "title"=>$request->title,
                "description"=>$request->description,
                "category_id"=>$request->category_id,
                "image"=>$image,
                "price"=>$request->price,
                "solds"=>$request->qty,
                "quantity"=>$request->qty,
                "best_offers"=>$request->qty,
            ]);
    
    
        return redirect()->back()->withSuccess("The product updated successfully !"); 
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product=Product::find($id);
        $product->delete();

        return redirect()->back()->withSuccess("the product has been removed successfuly !");
    }
}
