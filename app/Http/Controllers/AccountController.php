<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AccountController extends Controller
{

    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->latest()->get();
        $last_orders = Order::where('user_id', Auth::user()->id)->latest()->take(5)->get();
        return view('myaccount')->with('orders', $orders)->with('last_orders', $last_orders);
    }

    public function showOrders()
    {
        if (request()->show_numbers) {
            $limitt = request()->show_numbers;
        } else {
            $limitt = 5;
        }
        $orders = Order::where('user_id', Auth::user()->id)->latest()->take($limitt)->get();
        return view('orders')->with('orders', $orders);
    }

    public function store(Request $request)
    {
        $user = User::find(Auth::id());
        //  where('id',)->get();
        $user->name = ($request->name)  == !Null ? $request->name :  $user->name;
        $user->email = ($request->email) == !Null ? $request->email :  $user->email;
        $user->tel = $request->phone;
        $user->password =  ($request->password)  == !Null ? Hash::make($request->password) : $user->password;
        $user->country = $request->country;
        $user->lines = $request->adresse;
        $user->zip_code = $request->zipcode;
        $user->city = $request->city;
        $user->save();
        return redirect()->route('profile-edit');
    }
}