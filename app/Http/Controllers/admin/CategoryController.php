<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title='Categories';
        return view('admin.categories.categories',[
            'categories'=>Category::all(),
        
        ])->with('title',$title);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title="Add Categoies";

        return view('admin.categories.add-categorie',['title'=>$title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        $request->validate([
            'title'=>'required|min:2',  
            'image'=>'nullable|image|mimes:png,jpeg,jpg|max:2048',
        ]);
        $file=$request->image;
        if($file!=null){
            $imageName="images/categories/".time()."_".$file->getClientOriginalName();
            $file->move(public_path("images/categories"),$imageName);
            
        
            $category=new Category();
            $category->name=$request->input("title");
            $category->image=$imageName;
            $category->number_products=10;
            $category->save();

            return redirect()->back()->withSuccess('The category added succesfully !');

        }       
      
        $category=new Category();
        $category->name=$request->input("title");
        $category->number_products=10;
        $category->save();

        return redirect()->back()->withSuccess('The category added succesfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category=Category::find($id);

        return view('admin.categories.add-edit-categorie',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $request->validate([
            'title'=>'required|min:2',
            'image'=>'nullable|image|mimes:png,jpeg,jpg|max:2048',
        ]);
       

           $cat=category::find($id);
            $image=$cat->image;
            $old_path=public_path($image);

            if($request->hasFile('image')){
                    if(File::exists($old_path))
                    {
                        File::delete($old_path);
                    }

                    $file=$request->image;
                    $old_path="images/categories/".time()."_".$file->getClientOriginalName();
                    $file->move(public_path("images/categories"),$old_path);

                    $cat->update([
                        "name"=>$request->title,
                        "image"=>$old_path,
                        "number_products"=>10,
                        
                    ]);

                    return redirect()->back()->withSuccess('Updated Succesfully');

            }

            $cat->update([
                "name"=>$request->title,
                "number_products"=>10,
                
            ]);

        return redirect()->back()->withSuccess('Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category=Category::find($id);
        $category->delete();

        return redirect()->back()->withSuccess("the category has been removed successfuly !");

    }
}

