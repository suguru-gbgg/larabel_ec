<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function shop()
    {
        $stocks = Stock::get();

        return view('shop', ['stocks' => $stocks]);
    }//

    public function cart(Request $request)
    {
       $cart = new Cart;
       $cart->stock_id = $request->stock_id;
       $cart->user_id = $request->user_id;
        $cart->save();

        return redirect()->route('view_cart');
    }

    public function view_cart()
    {
        $user_carts = Cart::where('user_id', '=', Auth::user()->id)->get();
        $user_items = array();
        foreach($user_carts as $user_cart){
            $user_item = Stock::where('id', '=', $user_cart->stock_id)->get();
            foreach($user_item as $user_single)
            {
                array_push($user_items,$user_single);
            }
            
        }
        return view('cart',compact('user_items'));
    }

    public function delete()
    {
        Cart::where('user_id', '=', Auth::user()->id)->delete();

        return view('delete');
    }
}   
