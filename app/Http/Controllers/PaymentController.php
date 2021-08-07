<?php

namespace App\Http\Controllers;

use DateTime;
use Stripe\Charge;

use Stripe\Stripe;
use App\Models\Order;
use App\Models\Product;
use Stripe\PaymentIntent;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Cart::total() > 0) {
            return view('checkout');
        } else {
            return  Redirect::route('home');
        }
    }
    public function makePayment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $paymentinfo =  Charge::create([
            "amount" => round(Cart::total()),
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Make payment and chill."
        ]);


        foreach (Cart::content() as $product_order) {
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->product_id = $product_order->id;
            $order->qntty = $product_order->qty;
            $order->order_date  = (new DateTime())->setTimestamp($paymentinfo['created'])->format('Y-m-d');
            $order->save();
        }
        foreach (Cart::content() as $product_order) {
            $product  = Product::find($product_order->id);
            $product->quantity =  $product->quantity - $product_order->qty;
            $product->save();
        }

        Session::flash('success', 'Payment successfully made.');

        /*--Mon code --- */
        Cart::destroy();

        return  Redirect::route('home');
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
        //
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
    }
}