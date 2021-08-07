<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    protected $redirectTo = 'admin/';


    public function dashboard()
    {
        return view('admin.admin_dashboard')->with([
            "users"=>User::where("is_admin",0)->orderBy("created_at","DESC")->limit(5)->get(),
            "orders"=>Order::orderBy("status","DESC")->limit(8)->get(),
            "products"=>Product::all(),
            "categories"=>Category::all(),

        ]);
    }

    public function delivered($id)
    {
       $order=Order::find($id);
       $order->update([
           "status"=>1,
       ]);
       return redirect()->back();
    }

    public function login(Request $request)
    {  
        if(Auth::check() and Auth::user()->is_admin==1)
        {
            return redirect()->route('admin.dashboard');
        }
        
        if($request->isMethod('post'))
        {  
            $data=$request->all();
            $request->validate([
                'email'=>'required|email',
                'password'=>'required|min:6',
            
            ]);

            // if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']]))
            // return redirect()->route('admin.dashboard');

             if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']]))
                 return redirect()->route('admin.dashboard');
        } 
        return view('admin.admin_login');

    }

    public function logout()
    {   
        Auth::logout();
        return redirect()->route('admin.login');
      
    }

    // public function showCategories()
    // {  
        
    //     return view('admin.categories');
      
    // }
    // public function addEditCategorie($id=null)
    // {  
    //     if($id==null)
    //     $title='Add Category';

    //     else
    //     $title="Edit Category";
       
    //     return view('admin.add-edit-categorie')->with(compact('title'));
      
    // }

   
    
}
