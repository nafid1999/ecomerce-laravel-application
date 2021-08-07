<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title="users";
        $users=User::where("is_admin",0)->get();

        return view('admin.users.users')->with(['users'=>$users,'title'=>$title]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $title="users";
        return view('admin.users.edit',['user'=>$user,"title"=>$title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
            $this->validate($request,[
                "name"=>'required|min:3',
                "phone"=>'nullable|digits:10',
                //"image"=>"nullable|image|mimes:jpg,png,jpeg|max:2048",
                'city'=>"nullable",
                'country'=>"nullable",
                'email'=>'required|email',
                'zip_code'=>'required|numeric|digits:5',
            ]);

            // retrieve the product 
           
            // $image=$user->avatar;
            // $old_path=public_path($image);
            // //check file field
            // if($request->hasFile('image')){
                    
            //         if(File::exists($old_path))
            //         {
            //             File::delete($old_path);
            //         }

            //         $file=$request->image;
            //         $old_path="images/products/".time()."_".$file->getClientOriginalName();
            //         $file->move(public_path("images/products"),$old_path);
            //        // update data
            //         $user->update([
            //             "title"=>$request->title,
            //             "description"=>$request->description,
            //             "category_id"=>$request->category_id,
            //             "image"=>$old_path,
            //             "price"=>$request->price,
            //             "solds"=>$request->qty,
            //             "best_offers"=>$request->qty,
            //         ]);
            
            
            //     return redirect()->back()->withDanger("The product updated successfully !");
            // }
             //update 

            $user->update([
                "name"=>$request->name,
                "email"=>$request->email,
                "tel"=>$request->phone,
                "zip_code"=>$request->zip_code,
                "city"=>$request->city,
                "country"=>$request->country,
            ]);
    
    
        return redirect()->back()->withSuccess("user's profile updated successfully !"); 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();

        return redirect()->back()->withSuccess("the user has been removed successfuly !");
    }
}
